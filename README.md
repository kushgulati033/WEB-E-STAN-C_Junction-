# WEB-E-STAN-C_Junction

An intelligent skill assessment platform that uses AI to evaluate user knowledge and provide personalized feedback across various topics. The system generates progressively difficult questions and provides detailed performance analysis using the Phi-3 language model through Ollama.

## Features

- Dynamic question generation based on chosen topic
- Progressive difficulty scaling
- Comprehensive skill assessment
- Detailed feedback including:
  - Skill level classification (Beginner to Expert)
  - Strengths analysis
  - Weakness identification
  - Personalized improvement suggestions

## Prerequisites

- Python 3.x
- Node.js (for web interface)
- Ollama installed and running locally
- Phi-3 model configured in Ollama

## Dependencies

- langchain_ollama
- langchain_core
- Other Python standard libraries (re, time)

## Installation

1. Clone the repository:
```bash
git clone https://github.com/kushgulati033/WEB-E-STAN-C_Junction-.git
cd WEB-E-STAN-C_Junction-
```

2. Install the required Python packages:
```bash
pip install langchain-ollama langchain-core
```

3. Install Node.js dependencies:
```bash
npm install
```

4. Ensure Ollama is running with the Phi-3 model:
```bash
ollama run phi3
```

## Usage

You can use either the simplified version (INTERACTION.py) or the full version (main.py):

### Simple Version
```bash
python INTERACTION.py
```

### Full Version
```bash
python main.py
```

Follow the prompts to:
1. Enter your desired topic for assessment
2. Answer the generated questions
3. Receive a detailed skill evaluation

## Project Structure

- `main.py` - Primary application logic with advanced features
- `INTERACTION.py` - Simplified version of the assessment tool
- `Modelfile.md` - Ollama model configuration
- `index.html` - Web interface (in development)
- `index.js` - JavaScript functionality (in development)
- `Style.css` - Styling for web interface

## Features in Development

- Web interface for improved user interaction
- Extended question bank
- More detailed assessment metrics
- Progress tracking over time

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is private as specified in package.json.

## Note

Make sure Ollama is running before starting the application. The system requires a stable connection to the Ollama server for question generation and response evaluation.
