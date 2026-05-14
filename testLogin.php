<?php

    session_start(); // usar sempre que for trabalhar com sessões

    // print_r($_REQUEST);

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) // se exitir
    {
        // deixa acessar o sistema
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // print_r('Email: ' . $email);
        // print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        $result = pg_query($conexao, $sql);
        $row = pg_fetch_assoc($result);
        // print_r($row);
        // print_r($sql);

        if(pg_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
            // print_r('Não existe');
        }
        else
        {
            // print_r('Existe');
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: menu.php');
        }

        
    }
    else
    {   // caso não exista, não acessa
        header('location: login.php');
    }


?>