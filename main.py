from langchain_ollama import OllamaLLM
from langchain_core.prompts import ChatPromptTemplate
from langchain_core.output_parsers import StrOutputParser
import time

def create_llm(model_name="phi"):
    """Initialize the Ollama LLM."""
    return Ollama(model=model_name)

def create_question_chain(llm, difficulty_level):
    """Create a chain for generating questions."""
    template = """You are an AI tutor assessing a user's skill in {topic}.
    Generate a question that is appropriate for difficulty level {difficulty}/10.
    The question should be clear, concise, and progressively harder than previous questions.
    Only output the question itself, without any additional text."""
    
    prompt = ChatPromptTemplate.from_template(template)
    output_parser = StrOutputParser()
    
    return prompt | llm | output_parser

def create_evaluation_chain(llm):
    """Create a chain for evaluating responses."""
    template = """A user has answered the following questions on {topic}:
    {responses}

    Evaluate their performance and provide:
    1. A skill level (Beginner, Intermediate, Advanced, or Expert)
    2. Their strengths
    3. Their weaknesses
    4. Specific suggestions for improvement

    Format your response exactly as follows:
    Skill Level: [level]
    
    Strengths:
    - [strength 1]
    - [strength 2]
    
    Weaknesses:
    - [weakness 1]
    - [weakness 2]
    
    Suggested Improvements:
    - [improvement 1]
    - [improvement 2]
    """
    
    prompt = ChatPromptTemplate.from_template(template)
    output_parser = StrOutputParser()
    
    return prompt | llm | output_parser

def format_responses(responses):
    """Format responses for the evaluation prompt."""
    formatted = []
    for i, qa in enumerate(responses, 1):
        formatted.append(f"Question {i}: {qa['question']}")
        formatted.append(f"Answer: {qa['answer']}\n")
    return "\n".join(formatted)

def main():
    try:
        # Initialize LLM
        llm = create_llm()
        
        print("Welcome to the Skill Assessment Tool!")
        topic = input("\nWhat topic would you like to be assessed on? ")
        
        # Store question-answer pairs
        responses = []
        
        # Generate and ask 10 questions
        for i in range(10):
            print(f"\n--- Question {i+1}/10 ---")
            
            # Create and invoke question chain
            question_chain = create_question_chain(llm, i+1)
            question = question_chain.invoke({
                "topic": topic,
                "difficulty": i+1
            })
            
            print(f"\n{question}")
            answer = input("\nYour answer: ")
            
            responses.append({
                "question": question,
                "answer": answer
            })
            
            # Small delay to prevent rate limiting
            time.sleep(1)
        
        print("\n--- Generating Assessment ---")
        
        # Create and invoke evaluation chain
        evaluation_chain = create_evaluation_chain(llm)
        evaluation = evaluation_chain.invoke({
            "topic": topic,
            "responses": format_responses(responses)
        })
        
        print("\n=== Skill Assessment Results ===\n")
        print(evaluation)
        
    except Exception as e:
        print(f"\nError: {str(e)}")
        print("\nPlease ensure Ollama is running and try again.")

if __name__ == "__main__":
    main()