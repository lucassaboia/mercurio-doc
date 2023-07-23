<?php
session_start();
include_once("conexao.php");
/*include_once("index.php");
include_once("processa.php");
include_once("consulta.js");
*/
$nomecl =  $_SESSION['nomecl'];
$sobrenomecl =  $_SESSION['sobrenomecl'];
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
$horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);
$obs = filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
    
    if($tipo == "valor5"){
    $result_usuario2 = "INSERT INTO tbconsultapsicologo (nomecliente, sobrenomecliente,dataconsulta,horario,observacoes) VALUES ('$nomecl', '$sobrenomecl','$data','$horario','$obs')";
    $resultado_usuario = mysqli_query($conn, $result_usuario2);
    }
    else if($tipo == "valor6"){
        $result_usuario3 = "INSERT INTO tbconsultapsiquiatra (nomecliente, sobrenomecliente,dataconsulta,horario,observacoes) VALUES ('$nomecl', '$sobrenomecl','$data','$horario','$obs')";
        $resultado_usuario2 = mysqli_query($conn, $result_usuario3);
        }
    if(mysqli_insert_id($conn)){
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
        header("Location: dados.php");
        $_SESSION['datacl'] = $data;
        $_SESSION['horariocl'] = $horario;
        $_SESSION['obscl'] = $obs;
        $_SESSION['tipocl'] = $tipo;
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
        header("Location: consulta.php");
    }
?>