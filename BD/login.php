<?php
session_start();
if (isset($_POST["entrar"]) && !empty($_POST['cpf']) && !empty($_POST['senha'])) {

    include_once('../BD/conexao.php');

    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM cadastro WHERE cpf = '$cpf' AND senha = '$senha' ";

    $result = $conexao ->query($sql);

if (mysqli_num_rows($result) < 1) {
    $_SESSION['erro_login'] = 'CPF ou senha não cadastrados.';
    header('Location: ../LoginPage/index.php');
    exit();
} else {
    $_SESSION["usuario_logado"] = $cpf;
    header('Location: ../TelaInicial/index.php');
    exit();
}
} else {
    $_SESSION['erro_login'] = 'Por favor, preencha todos os campos.';
    header('Location: ../LoginPage/index.php');
    exit();
}
?>