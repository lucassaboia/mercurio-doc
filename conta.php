<?php
session_start();

include_once("conexao.php");
if(isset($_POST['logar'])){
 $nomecliente=$_POST["nome"];
  $sobrenomecliente=$_POST["sobrenome"];
 $senha=$_POST["senha"];
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
    //header("Location: conta.php");
    ?>
<link href = "css/bootstrap.min.css" rel = "stylesheet" type = "text/css">
    <link href = "js/toastr.min.css" rel = "stylesheet">
    <script type = "text/javascript" src="js/bootstrap.min.js"></script>
    <script type = "text/javascript" src="js/jquery-3.5.1.min"></script>
    <script src="js/toastr.min.js"></script>
    <script type = "text/javascript" src="js/jquery.mask.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src ="https://github.com/kamranahmedse/jquery-toast-plugin.git"></script>
<script>
$(window).bind("load", function(){
    swal({
  title: "Erro ao fazer login!",
  text: "Usuário não encontrado!",
  icon: "error",
});
})
 </script>
  
        
    <?php
 }
 
  } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/docicon.png" type="image/icon type">
    <title>JapaDoctor - Login</title>
    <style>
        body{font-family: Arial, Helvetica, sans-serif; overflow:hidden }
        .content2{display:flex;justify-content: center;}
        .contato2{width:100%;max-width: 500px;}
        .form2{display:flex;flex-direction: column;}
        .field{padding:10px;margin-bottom: 14px;border: 1px solid blue;border-radius: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 15px;}
        textarea{height: 150px;}
        .logo2{ display: block; height:65px}
        #navb2{justify-content: center; background-color: darkblue;}
        #titulo2{font-size: 40px; text-align: center;}
        #envio2{font-size: 23px;background-color: white; color: darkblue; text-align: center; border: 1px solid darkblue; border-radius: 15px; width: 300px; margin-left:100px; padding:10px}
        #linha{background-color: darkblue; width: 1500px; height: 3px;}
        #tipo{color:gray}
        #volta2{font-size: 23px;background-color: white; color: darkblue; text-align: center; border: 1px solid darkblue; border-radius: 15px; width: 300px; margin-left:100px; padding:10px}
       
        
        
   </style>
   <script src="consulta.js"></script>
    <link href = "css/bootstrap.min.css" rel = "stylesheet" type = "text/css">
    <link href = "js/toastr.min.css" rel = "stylesheet">
    <script type = "text/javascript" src="js/bootstrap.min.js"></script>
    <script type = "text/javascript" src="js/jquery-3.5.1.min"></script>
    <script src="js/toastr.min.js"></script>
    <script type = "text/javascript" src="js/jquery.mask.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src ="https://github.com/kamranahmedse/jquery-toast-plugin.git"></script>


</head>
<body>
   
    <nav class="navbar navbar-expand-lg navbar-dark" id = "navb2">
        <img src="img/doclogo.png" class="logo2">
        </nav>
        <br>
  <section class="content2">

    <div class="contato2">
        <h3 id = "titulo2">Insira sua conta</h3>
        <br>
        <br>
        <form class="form2" name="form" autocomplete="off" method="post">
            <input class="field" name="nome" id="nome" placeholder="Insira seu nome" onkeypress="return (event.charCode > 64 && 
            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
            
            <input class="field" name="sobrenome" id="sobrenome" placeholder="Insira seu sobrenome" onkeypress="return (event.charCode > 64 && 
            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
            
            <input class="field" type="password" name="senha" id="senha" placeholder="Insira sua senha">
          <br>
              <button type="submit"id="envio2" name="logar" id="logar" class="but" onmouseover="mousecima()" onmouseout="mousesai()" onclick="validar()" >Entrar</button>
                <br>
                <button type="button"id="volta2" class="but" onmouseover="mousecima3()" onmouseout="mousesai3()"onclick="voltax()">Voltar</button>
             
                </form>
                </div>
                </section>
                <script>
     function voltax(){
    location.replace("index.php");
}
function mousecima3(){
    let borda = document.getElementById("volta2")
    borda.style.borderColor = "white";
    borda.style.color = "white";
    borda.style.backgroundColor = "darkblue";
    
}
function mousesai3(){
    let borda = document.getElementById("volta2")
    borda.style.borderColor = "darkblue";
    borda.style.color = "darkblue";
    borda.style.backgroundColor = "white";
   
}
                </script>