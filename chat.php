<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="style.css">
  <style>
    .chat-container {
    max-width: 400px;
    margin: auto;
    background: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.chat-box {
    height: 300px;
    overflow-y: auto;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    padding: 10px;
    background: white;
    border-radius: 5px;
}

.input-area {
    display: flex;
}

input[type="text"] {
    flex-grow: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

  </style>
</head>
<body>
    <div class="chat-container">
        <h2>Chat de Mensagens</h2>
        <div id="messages" class="chat-box"></div>
        <div class="input-area">
            <input type="text" id="messageInput" placeholder="Digite uma mensagem..." />
            <button id="sendBtn">Enviar</button>
        </div>
    </div>

    <script>
      document.getElementById("sendBtn").addEventListener("click", function() {
    let messageInput = document.getElementById("messageInput");
    let message = messageInput.value;

    if (message.trim() !== "") {
        // Envia a mensagem para o backend
        fetch('sendMessage.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'message=' + encodeURIComponent(message)
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                displayMessage(data.message);
                messageInput.value = ""; // Limpa o campo de entrada
            }
        });
    }
});

// Função para exibir a mensagem no chat
function displayMessage(message) {
    let messagesDiv = document.getElementById("messages");
    let messageElement = document.createElement("div");
    messageElement.textContent = message;
    messagesDiv.appendChild(messageElement);
    messagesDiv.scrollTop = messagesDiv.scrollHeight; // Rola para a última mensagem
}

    </script>
</body>
</html>
