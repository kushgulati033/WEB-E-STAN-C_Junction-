from langchain_ollama import OllamaLLM
from langchain_core.prompts import ChatPromptTemplate
import re  
  
def assisment():      
  topic = input("What do you want to learn? ")
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

# Return the skill level
#print(f"\nUser Skill Level: {user_skill_level}")

print(assisment())
