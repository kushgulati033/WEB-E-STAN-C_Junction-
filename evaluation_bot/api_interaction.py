from flask_cors import CORS
from flask import Flask, request, jsonify
from langchain_ollama import OllamaLLM
from langchain_core.prompts import ChatPromptTemplate
import subprocess
import re

app = Flask(__name__)
CORS(app)
def stop_ollama():
    try:
        subprocess.run(["taskkill", "/F", "/IM", "ollama.exe"], stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL, shell=True)
        print("Ollama stopped.")
    except Exception as e:
        print(f"Error stopping Ollama: {e}")

@app.route('/assess', methods=['POST'])
def assess():
    data = request.json
    topic = data.get('topic')
    if not topic:
        return jsonify({"error": "Topic is required"}), 400
    
    llm = OllamaLLM(model="phi3")
    question_prompt = ChatPromptTemplate.from_template(
        """
        You are an AI tutor assessing a user's skill in {topic}.
        Generate **5 questions** that increase in difficulty, from beginner to expert.
        Return them as a numbered list.
        """
    )
    questions_text = llm.invoke(question_prompt.format(topic=topic))
    questions = questions_text.strip().split("\n")
    return jsonify({"questions": questions})

@app.route('/evaluate', methods=['POST'])
def evaluate():
    data = request.json
    topic = data.get('topic')
    responses = data.get('responses')
    if not topic or not responses:
        return jsonify({"error": "Topic and responses are required"}), 400
    
    llm = OllamaLLM(model="phi3")
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
    evaluation = llm.invoke(evaluation_prompt)
    match = re.search(r"Skill Level:\s*(Beginner|Intermediate|Advanced|Expert)", evaluation)
    user_skill_level = match.group(1) if match else "Unknown"
    return jsonify({"evaluation": evaluation, "skill_level": user_skill_level})

@app.route('/resources', methods=['POST'])
def resources():
    data = request.json
    skill = data.get('skill')
    user_skill_level = data.get('skill_level')
    if not skill or not user_skill_level:
        return jsonify({"error": "Skill and skill level are required"}), 400
    
    llm = OllamaLLM(model="phi3")
    overview = """
        Act as a knowledgeable tutor in {skill}, starting with the {user_skill_level} and gradually progressing to more complex concepts. Explain each topic clearly, provide relevant examples, and ask me questions to check my understanding along the way.
    """
    prompt = ChatPromptTemplate.from_template(overview)
    chain = prompt | llm
    result = chain.invoke({"skill": skill, "user_skill_level": user_skill_level})
    return jsonify({"resources": result})

@app.route('/shutdown', methods=['POST'])
def shutdown():
    stop_ollama()
    return jsonify({"message": "Ollama stopped"})

if __name__ == '__main__':
    app.run(debug=True)
