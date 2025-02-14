from langchain_ollama import OllamaLLM
from langchain_core.prompts import ChatPromptTemplate
import re  
import subprocess

def stop_ollama():
    try:
        subprocess.run(["taskkill", "/F", "/IM", "ollama.exe"], stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL, shell=True)
        print("good bye")
    except Exception as e:
        print(f"Error stopping Ollama: {e}")


def assisment(topic):      
  llm = OllamaLLM(model="phi3")  # Ensure Ollama is running
  # Generate 10 questions in **one** LLM call
  question_prompt = ChatPromptTemplate.from_template("""
  You are an AI tutor assessing a user's skill in {topic}.
  Generate **5 questions** that increase in difficulty, from beginner to expert.
  Return them as a numbered list.
  """)

  questions_text = llm.invoke(question_prompt.format(topic=topic))
  questions = questions_text.strip().split("\n")  # Convert text into a list

  # Collect responses
  responses = []
  for i, question in enumerate(questions, 1):
      print(f"\nQuestion {i}: {question}")
      answer = input("Your answer: ")
      responses.append({"question": question, "answer": answer})
  # Define the evaluation prompt
  evaluation_prompt = f"""
  User has answered the following questions on {topic}:
  {responses}
  Evaluate their performance based on:
  - **Correctness, efficiency, and readability**
  - **Assign a skill level**: Beginner, Intermediate, Advanced, or Expert
  - **Provide feedback**: Strengths, weaknesses, and suggestions.
  Return output in this structured format:
  Skill Level: [Beginner | Intermediate | Advanced | Expert]
  Feedback:
  - Strengths: [...]
  - Weaknesses: [...]
  - Suggested Improvements: [...]
  """
  # Get evaluation in **one** LLM call
  evaluation = llm.invoke(evaluation_prompt)
  # Print the skill level and feedback
  print("\n--- Skill Assessment ---\n")
  print(evaluation)
  match = re.search(r"Skill Level:\s*(Beginner|Intermediate|Advanced|Expert)", evaluation)
  user_skill_level = match.group(1) if match else "Unknown"
  return user_skill_level

def resource(skill,user_skill_level):
    overview="""
        Act as a knowledgeable tutor in {skill}, starting with the {user_skill_level} and gradually progressing to more complex concepts. Explain each topic clearly, provide relevant examples, and ask me questions to check my understanding along the way.
    """
    llm = OllamaLLM(model="phi3")
    prompt = ChatPromptTemplate.from_template(overview)
    chain = prompt | llm
    result = chain.invoke({"skill":skill,"user_skill_level":user_skill_level})
    print(result)

skill = input("what do you want to learn: ")
level = assisment(skill)
print("\n--- resources for further study ---\n")
resource(skill,level) 
stop_ollama()