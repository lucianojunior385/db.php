<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro</h2>
    <form action="register_process.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Nome" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Senha" required><br>
        <input type="file" name="profile_pic" accept="image/*" required><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
