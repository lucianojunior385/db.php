<?php
include 'db.php'; // Conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Criptografando a senha

    // Lida com o upload da imagem
    $target_dir = "uploads/"; // Diretório para armazenar fotos
    $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
    move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);

    // Insere os dados no banco de dados
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, profile_pic) VALUES (:name, :email, :password, :profile_pic)");
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'profile_pic' => $target_file
    ]);

    echo "Cadastro realizado com sucesso!";
} else {
    echo "Método inválido!";
}
?>
