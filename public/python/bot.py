# bot.py

from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/api/bot', methods=['POST'])
def bot_endpoint():
    data = request.get_json()
    user_message = data['message']
    bot_response = "Hi, I am your Botman. You have asked : " + user_message
    return jsonify({'response': bot_response})

if __name__ == '__main__':
    app.run(debug=True, port=5000)
