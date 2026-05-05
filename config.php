<?php

    $host = 'Localhost';
    $port = '5432';
    $dbname = 'testeApp';
    $user = 'usuario_do_banco';
    $password = 'senha_do_banco';


    $conexao = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    if(!$conexao)
    {
        echo 'Erro ao conectar ao banco de dados.';
    }
    else
    {
        echo 'Conexão efetuada com sucesso!';
    }


?>