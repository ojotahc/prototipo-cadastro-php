<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <a href="home.php">Voltar</a>
    <div>
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
        <input type="text" name="email" placeholder="Email"> <!--placeholder é o que fica dentro do input-->
        <br><br>
        <input type="password" placeholder="Senha">
        <br><br>
        <input class="inputSubmit" type="submit" name="submit" value='Enviar'>
    </div>

</body>
</html>