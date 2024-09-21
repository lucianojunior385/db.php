<?php
// Credenciais do banco de dados
$host = 'sql300.infinityfree.com';  // Servidor MySQL
$dbname = 'if0_37266568_teste123083';  // Nome do banco de dados
$username = 'if0_37266568';  // Usuário do banco de dados
$password = '2wfNwl3NKMT';  // Senha do banco de dados

try {
    // Cria a conexão com o banco usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Define o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Se houver um erro, exibe uma mensagem
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
