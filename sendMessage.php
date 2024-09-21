<?php
include 'db.php'; // Conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    if (!empty($message)) {
        // Insere a mensagem no banco de dados
        $stmt = $pdo->prepare("INSERT INTO messages (username, message) VALUES (:username, :message)");
        $stmt->execute([
            'username' => 'User', // Pode ser dinâmico baseado na sessão do usuário
            'message' => $message
        ]);

        echo json_encode(['status' => 'success', 'message' => $message]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Mensagem vazia']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método inválido']);
}
?>
