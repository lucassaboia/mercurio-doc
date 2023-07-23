<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);


$result_usuario = "SELECT * FROM tbcontajd WHERE nome ='$nome' and senha ='$senha' and sobrenome='$sobrenome'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
if (mysqli_num_rows($resultado_usuario) > 0) {
    $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
    header("Location: consulta.php");
    $_SESSION['nomecl'] = $nome;
    $_SESSION['sobrenomecl'] = $sobrenome;
 }
 else{
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: conta.php");
 }
 
?>