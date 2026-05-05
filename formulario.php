<?php

    include_once('config.php');

    if(isset($_POST['submit']))
    {
        // print_r($_POST['nome']); se quiser testar
        $nome = $_POST['nome'];
        $cpf_cnpj = $_POST['cpf_cnpj'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $genero = $_POST['genero'];
        $data_nascimento = $_POST['data_nascimento'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];

        $resut = pg_query($conexao, "INSERT INTO usuarios (
            nome, 
            cpf_cnpj, 
            celular, 
            email, 
            genero, 
            data_nascimento, 
            endereco, 
            numero, 
            bairro, 
            cep, 
            cidade, 
            estado
        ) VALUES (
            '$nome', 
            '$cpf_cnpj', 
            '$celular', 
            '$email', 
            '$genero', 
            '$data_nascimento', 
            '$endereco', 
            '$numero', 
            '$bairro', 
            '$cep', 
            '$cidade', 
            '$estado'
        )");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/formulario.css">
</head>
<body>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Cadastre-se</b></legend>

                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="inputUser" oninput="mascaraDinamica(this)" maxlength="18" inputmode="numeric" required>
                    <label for="cpf_cnpj">CPF ou CNPJ</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="celular" id="celular" class="inputUser" placeholder="(00) 00000-0000" maxlength="15" onkeyup="mascaraCelular(this)" required>
                    <label for="celular">Celular</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email">Email</label>
                </div>
                <br>
                <div>
                    <p>Gênero:</p>
                    <input type="radio" id="feminino" name="genero" value="feminino" required>
                    <label for="feminino">Feminino</label>
                    <input type="radio" id="masculino" name="genero" value="masculino" required>
                    <label for="masculino">Masculino</label>
                    <input type="radio" id="outro" name="genero" value="outro" required>
                    <label for="outro">Outro</label>
                </div>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco">Endereço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="numero" id="numero" class="inputUser" inputmode="numeric" required>
                    <label for="numero">Número</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="bairro" id="bairro" class="inputUser" required>
                    <label for="bairro">Bairro</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cep" id="cep" class="inputUser" oninput="mascaraCEP(this)" maxlength="9" inputmode="numeric" placeholder="00000-000" required>
                    <label for="cep">CEP</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade">Cidade</label>
                </div>
                <br><br>                
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado">Estado</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">

            </fieldset>
        </form>
    </div>

    <!-- Formatação CPF/CNPJ, Celular e CEP -->
    <script>
        function mascaraDinamica(input) {
            let v = input.value.replace(/\D/g, ''); 
            if (v.length <= 11) {
                if (v.length > 3) v = v.substring(0, 3) + '.' + v.substring(3);
                if (v.length > 7) v = v.substring(0, 7) + '.' + v.substring(7);
                if (v.length > 11) v = v.substring(0, 11) + '-' + v.substring(11);
            } else {
                if (v.length > 2) v = v.substring(0, 2) + '.' + v.substring(2);
                if (v.length > 6) v = v.substring(0, 6) + '.' + v.substring(6);
                if (v.length > 10) v = v.substring(0, 10) + '/' + v.substring(10);
                if (v.length > 15) v = v.substring(0, 15) + '-' + v.substring(15);
            }
            input.value = v;
        }

        function mascaraCelular(input) {
            let v = input.value.replace(/\D/g, "");
            v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
            v = v.replace(/(\d{5})(\d)/, "$1-$2"); 
            input.value = v;
        }

        function mascaraCEP(input) {
            let v = input.value.replace(/\D/g, ""); 
            v = v.replace(/^(\d{5})(\d)/, "$1-$2"); 
            input.value = v;
        }
    </script>
</body>
</html>