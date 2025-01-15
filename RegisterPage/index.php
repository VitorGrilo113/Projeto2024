<?php
session_start();
if (isset($_POST["cadastrar"])) {

    include_once('../BD/conexao.php');

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone= $_POST['telefone'];
$nascimento = $_POST['nascimento'];
$senha = $_POST['senha'];

$sql = "INSERT INTO cadastro (cpf,nome,email,telefone,nascimento,senha)
                     VALUES ('$cpf','$nome','$email','$telefone','$nascimento','$senha' )";

$_SESSION['nome'] = $_POST['nome'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['telefone'] = $_POST['telefone'];

 $resultado = mysqli_query($conexao, $sql);

 if ($resultado) {
    echo "Cadastro realizado com sucesso!";
     } else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }

    header("Location: ../LoginPage/index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GOLBET Cadastro | Criar conta</title>
</head>

<body>
    <main class="main-section">
        <div class="left-container">
            <div class="top-left">
                <img class="img-logo" src="./imagens/Logogolbet.rodape.png">
                <p>Vença no jogo, conquiste na vida!</p>
            </div>

            <div class="image-box">
                <img src="./imagens/PlayerPng.png">
            </div>

        </div>
        <div class="right-container">
            <form id="form" method="POST">
                <h1 class="title">Criar Conta</h1>
                <p id="join-text">Já tem uma conta? <a class="link-text" href="../LoginPage/index.php">Entrar</a></p>

                <div class="input-container">
                    <div class="grudado-inputs">
                        <div class="input-group">
                            <input id="name-input" name="nome" type="text" placeholder="Nome de usuário" >

                        </div>
                        <div class="input-group">
                            <input type="email" name="email" id="email-input" placeholder="Email" >
                            <div class="email-types">
                                <p onclick="addDomain('@uol.com.br')" class="button" id="oul">@uol.com.br</p>
                                <p onclick="addDomain('@gmail.com')" class="button" id="gmail">@gmail.com</p>
                                <p onclick="addDomain('@outlook.com')" class="button" id="outlook">@outlook.com</p>
                            </div>
                            <p class="error-text" id="name-error"></p>
                            <p class="error-text" id="email-error"></p>
                        </div>
                    </div>

                    <div class="input-group">
                        <div>
                            <div class="input-box">
                                <input type="date" name="nascimento" id="date-input" placeholder="Data de nascimento" >
                            <img class="icon-img" src="./imagens/date.png" alt="">
                            </div>
                            
                        </div>

                        <p class="error-text" id="date-error"></p>
                    </div>

                    <div class="grudado-inputs">

                        <div class="input-group">
                            <input type="text" name="cpf" id="cpf-input" placeholder="CPF" >
                        </div>

                        <div class="input-group">
                            <input type="text" name="telefone" id="tel-input" placeholder="Telefone" onfocus="adicionarPrefixo(this)" 
                            oninput="formatarTelefone(this)">

                            <p class="error-text" id="cpf-error"></p>
                            <p class="error-text" id="tel-error"></p>
                        </div>

                    </div>



                    <div class="grudado-inputs" id="pass-campo">

                        <div class="input-group">

                            <div>
                                <img class="eye-icon" src="./imagens/open-eyes.png">
                                <input type="password" name="senha" id="pass-input" placeholder="Senha" >
                            </div>


                        </div>

                        <div class="input-group">

                            <div class="input-box">
                                <div>
                                    <img class="eye-icon" onclick="seePassword('input-2')" class="eye-icon"
                                src="./imagens/open-eyes.png">
                                <input type="password" id="confirm-pass" name="Confirmar a senha" placeholder="Confirmar a senha" >
                                </div>
                                
                            </div>


                            <p class="error-text" id="pass-error"></p>
                            <p class="error-text" id="confirm-error"></p>
                        </div>


                    </div>


                    <div class="confirm-box">
                        <input type="checkbox" id="check-box" required>
                        <label for="check-box">Confirmo que tenho mais de 18 anos de idade, e aceito os <a
                                class="link-text" href="../TelaInicial/termsPage/index.html">Termos e Condições</a></label>
                    </div>



                </div>

             <button type="submit" name="cadastrar" class="enviar-button" >Cadastrar</button>

            </form>

            
        </div>
    </main>




    <script src="./javascriptFolder/atalhoEmail.js"></script>
    
    <script src="./javascriptFolder/validation.js"></script>
    
    <script src="./javascriptFolder/mostrarSenha.js"></script>
    
    <script src="./javascriptFolder/termos.js"></script>
    <script src="./javascriptFolder/formatCpf.js"></script>
    <script src="./javascriptFolder/formatTelefone.js"></script>
</body>

</html>
