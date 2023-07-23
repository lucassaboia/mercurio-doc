<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/docicon.png" type="image/icon type">
    <title>JapaDoctor - Dados</title>
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
        #cadastre{margin-bottom: 16px;font-size: 23px;background-color: white; color: darkblue; text-align: center; border: 1px solid darkblue; border-radius: 15px; width: 300px; margin-left:100px; padding:10px}
        #linha{background-color: darkblue; width: 1500px; height: 3px;}
        #tipo{color:gray}
        #titulo3{font-size: 25px; text-align: center;}
        #login{font-size: 23px;background-color: white; color: darkblue; text-align: center; border: 1px solid darkblue; border-radius: 15px; width: 300px; margin-left:100px; padding:10px}
      
        
   </style>
   <script src="consulta.js"></script>
    <link href = "css/bootstrap.min.css" rel = "stylesheet" type = "text/css">
    <script type = "text/javascript" src="js/bootstrap.min.js"></script>
    <script type = "text/javascript" src="js/jquery-3.5.1.min"></script>
    <script type = "text/javascript" src="js/jquery.mask.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
   
    <nav class="navbar navbar-expand-lg navbar-dark" id = "navb2">
        <img src="img/doclogo.png" class="logo2">
        </nav>
        <br>
  <section class="content2">

    <div class="contato2">
        <h3 id = "titulo2">Consulta marcada</h3>
        <form class="form2" name="form" autocomplete="off" method="post" action="conecta.php">
            <br>
            <h3 id = "titulo3">Dados da consulta</h3>
            <?php 
            if($_SESSION['tipocl'] == "valor5"){
              $cons = "Psicóloga";
            }
            else if($_SESSION['tipocl'] == "valor6"){
              $cons = "Psiquiatra";
            }
            echo "<br>"."<br>"."• Nome do cliente: ".$_SESSION['nomecl']."<br>"."<br>"."• Sobrenome do cliente: ".$_SESSION['sobrenomecl']."<br>"."<br>"."• Data da consulta: ".$_SESSION['datacl']."<br>"."<br>"."• Horário da consulta: ".$_SESSION['horariocl']."<br>"."<br>"."• Tipo de consulta: ".$cons; ?>
 <br> <br>
 <button type="button"id="cadastre" class="but" onmouseover="mousecimac()" onmouseout="mousesaic()" onclick="voltal()" >Voltar ao login</button>
 
 <button type="button"id="login" class="but" onmouseover="mousecimad()" onmouseout="mousesaid()" onclick="voltac()" >Voltar ao cadastro</button>
          <script>
function mousecimad(){
    let borda = document.getElementById("login")
    borda.style.borderColor = "white";
    borda.style.color = "white";
    borda.style.backgroundColor = "darkblue";
    
}
function mousesaid(){
    let borda = document.getElementById("login")
    borda.style.borderColor = "darkblue";
    borda.style.color = "darkblue";
    borda.style.backgroundColor = "white";
   
}
function mousecimac(){
    let borda = document.getElementById("cadastre")
    borda.style.borderColor = "white";
    borda.style.color = "white";
    borda.style.backgroundColor = "darkblue";
    
}
function mousesaic(){
    let borda = document.getElementById("cadastre")
    borda.style.borderColor = "darkblue";
    borda.style.color = "darkblue";
    borda.style.backgroundColor = "white";
   
}
function voltal(){
    location.replace("conta.php");
}
function voltac(){
    location.replace("index.php");
}

          </script>
</form>
                </div>
                </section>