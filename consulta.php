<?php
session_start();

if(isset($_POST['entrar2'])){
    $tipo=$_POST["tipo"];
    $dataconsulta=$_POST["data"];
    $horario=$_POST["horario"];
    $observacoes=$_POST["obs"];
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="img/docicon.png" type="image/icon type">
    <title>JapaDoctor - Consulta</title>
    <style>
        body{font-family: Arial, Helvetica, sans-serif; overflow:hidden }
        .content2{display:flex;justify-content: center;}
        .contato2{width:100%;max-width: 500px;}
        .form2{display:flex;flex-direction: column;}
        .field2{padding:10px;margin-bottom: 14px;border: 1px solid blue;border-radius: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;}
        textarea{height: 150px;}
        .logo2{ display: block; height:65px}
        #navb2{justify-content: center; background-color: darkblue;}
        #titulo2{font-size: 20px; text-align: center;}
        #envio2{display: none;font-size: 23px;background-color: white; color: darkblue; text-align: center; border: 1px solid darkblue; border-radius: 15px; width: 300px; margin-left:100px; padding:10px}
        #linha{background-color: darkblue; width: 1500px; height: 3px;}
        #tipo{color:gray}
        #verifica2{font-size: 23px;background-color: white; color: darkblue; text-align: center; border: 1px solid darkblue; border-radius: 15px; width: 300px; margin-left:100px; padding:10px}
      
       
        
        
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
        <h3 id = "titulo2">Dados para consulta</h3>
        <br>
        <form class="form2" name="form" id="form2" method="post" action="processa2.php">
            <select class="field2" name="tipo" id ="tipo" onclick="trocarcor2()" text-align="center">
                <option value="valor4">Informe o tipo de consulta</option> 
                <option value="valor5">Psicóloga</option> 
                <option value="valor6">Psiquiatra</option>
                    </select>
                    
                    <input class="field2" type="text" id="data" name="data" placeholder="Insira a data da consulta" id="data" onclick="voltaverifica()" onmouseout="stringToDate()"onkeypress="handleMask(event, '99/99/9999')" size=40>
                    <input class="field2" type="text" id="horario" name="horario" placeholder="Insira o horário da consulta" id="hora" onclick="voltaverifica()" onmouseout="stringToDate()"onkeypress="handleMask(event, '99:99')" size=40>
           <textarea class="field2" name="obs"id="obs" placeholder="Observações sobre a consulta(opcional)" onclick="voltaverifica()"></textarea>
                    
               <button type="submit"id="envio2" name="entrar2" class="but" onmouseover="mousecima()" onmouseout="mousesai()">Enviar2</button>
               <button type="button"id="verifica2" name="entrar2" class="but" onmouseover="mousecima()" onmouseout="mousesai()" onclick="validarx()" >Enviar</button>
               
               <br>

                </form>
                </div>
                </section>
                <script>

  function validarx(){
    var tipo = document.getElementById("tipo").value;
    var data = document.getElementById("data").value;
    var horario = document.getElementById("horario").value;
    var obs = document.getElementById("obs").value;
    var hora = horario.split(":");
    let xh = hora[0];
    let zh = hora[1];
    var envio2 = document.getElementById("envio2");
    var verifica2 = document.getElementById("verifica2");
    var datecons = data.split("/");
    let m2 = datecons[0];
    let d2 = datecons[1];
    let y2 = datecons[2];
var datecons2 = (y2 + "-" + d2 + "-" + m2);
var datecons3 = new Date(datecons2).toDateString();
var dataatual = new Date().toDateString();
var dataatual2 = new Date().toLocaleDateString();
var dataatual3 = dataatual2.split("/");
let m3 = dataatual3[0];
let d3 = dataatual3[1];
let y3 = dataatual3[2];
var vrf = 1;
    toastr.options = {
        "positionClass": "toast-bottom-right",
      }
      
      if(data== "" || horario==""){
        toastr["warning"]("Preencha todos os campos", "Campos vazios")
        vrf = 0;
      }
  
    if(xh > 23 || zh > 59){
        toastr["error"]("Horário inválido", "Erro ao agendar consulta")
        vrf = 0;
    }
     if (document.form.tipo.selectedIndex == 0) {
       toastr["warning"]("Nenhuma consulta selecionada", "Selecione o tipo de consulta")
        vrf = 0;
        
    }

    if(d2 == 04 || d2 == 06 || d2 == 09 || d2 == 11){
       if(m2 > 30){
        toastr["error"]("Data de consulta inválida", "Erro ao cadastrar")
        vrf = 0;
       }
   }
   else if(d2 == 02 && m2 > 28){
    toastr["error"]("Data de consulta inválida", "Erro ao cadastrar")
        vrf = 0;
   }

     if(m2 > 31 || d2 > 12 || y2 > 2021 ){
        toastr["error"]("Data de consulta inválida", "Erro ao cadastrar")
        vrf = 0;
    }
    
    else if(y2<y3){
        toastr["error"]("Data de consulta inválida", "Erro ao cadastrar")
        vrf = 0;
     }
     else if(y2 == y3 ){
        if(d2<d3){
            toastr["error"]("Data de consulta inválida", "Erro ao cadastrar")
            vrf = 0;
        }
        else{
         if(d2==d3){
            if(m2<=m3){
                toastr["error"]("Data de consulta inválida", "Erro ao cadastrar")
                vrf = 0;
            }
            else if(m2>m3 && vrf==1){
                swal({
        title: "Deseja agendar a consulta?",
        text: "Consulta pronta para ser agendada!",
        icon: "success",
        buttons: ["Não","Sim"]
      }).then((willDelete) => {
        if (willDelete) {
          document.getElementById('form2').submit();
          
        } else {
          
        }
      });
            }
        }
        else if(d2 > d3 && y2>y3 && vrf==1){
            swal({
        title: "Deseja agendar a consulta?",
        text: "Consulta pronta para ser agendada!",
        icon: "success",
        buttons: ["Não","Sim"]
      }).then((willDelete) => {
        if (willDelete) {
          document.getElementById('form2').submit();
          
        } else {
          
        }
      });
        }
    }
    }
    else if(y2>y3 && vrf==1){
        swal({
        title: "Deseja agendar a consulta?",
        text: "Consulta pronta para ser agendada!",
        icon: "success",
        buttons: ["Não","Sim"]
      }).then((willDelete) => {
        if (willDelete) {
          document.getElementById('form2').submit();
          
        } else {
          
        }
      });
    }
}
                </script>