<?php

    $host = 'localhost';
    $port = '5432';
    $dbname = 'server101';
    $user = 'postgres';
    $password = 'snapadmin';


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