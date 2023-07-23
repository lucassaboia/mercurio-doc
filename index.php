<?php
session_start();

if(isset($_POST['entrar'])){
    $nomecliente=$_POST["nome"];
    $sobrenomecliente=$_POST["sobrenome"];
    $senha=$_POST["senha"];
    $cpf=$_POST["cpf"];
    $rg=$_POST["rg"];
    $nascimento=$_POST["nascimento"];
    $email=$_POST["email"];
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/docicon.png" type="image/icon type">
    <title>JapaDoctor - Cadastro</title>
    <style>
        body{font-family: Arial, Helvetica, sans-serif; overflow:hidden }
        .content{display:flex;justify-content: center;}
        .contato{width:100%;max-width: 500px;}
        .form{display:flex;flex-direction: column;}
        .field{padding:10px;margin-bottom: 14px;border: 1px solid blue;border-radius: 5px;font-family: Arial, Helvetica, sans-serif;font-size: 11px;}
        textarea{height: 150px;}
        .logo{ display: block; height:65px}
        #navb{justify-content: center; background-color: darkblue; height:70px; margin-bottom: 14px;}
        #titulo{font-size: 18px; text-align: center; margin-bottom:18px;}
        #envio{display: none;font-size: 21px; height: 50px; background-color: white; color: darkblue; text-align: center; margin-bottom: 12px; border: 1px solid darkblue; border-radius: 15px; width: 300px; margin-left:100px; padding:10px}
        #conta{font-size: 21px; height: 50px; background-color: white; color: darkblue; text-align: center; border: 1px solid darkblue; border-radius: 15px; width: 300px; margin-left:100px; padding:10px}
        #gen{color:gray}
        #cons{color:gray}
        #verifica{font-size: 21px; height: 50px; background-color: white; color: darkblue; text-align: center; margin-bottom: 12px; border: 1px solid darkblue; border-radius: 15px; width: 300px; margin-left:100px; padding:10px}
       
        
        
   </style>
   <script src="cadastro.js"></script>
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
   
    <nav class="navbar navbar-expand-lg navbar-dark" id = "navb">
        <img src="img/doclogo.png" class="logo">
        </nav>
        
  <section class="content">

    <div class="contato">
        <h3 id = "titulo">Cadastro de Conta</h3>
        
        <form class="form" name="form" id="form" method="post" action="processa.php">
            <input class="field" name="nome" id="nome" placeholder="Insira seu nome" onclick="voltaverifica()" onkeypress="return (event.charCode > 64 && 
            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
            
            <input class="field" name="sobrenome" id="sobrenome" placeholder="Insira seu sobrenome" onclick="voltaverifica()" onkeypress="return (event.charCode > 64 && 
            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">

            
            <input class="field" type="password" name="senha" id="senha" placeholder="Insira sua senha" onclick="voltaverifica()">
            <input class="field" type="password" name="senha2" id="csenha" placeholder="Confirme sua senha" onclick="voltaverifica()">

            <input class="field" type="text" name="cpf" id="cpf" placeholder="Insira seu CPF" onclick="voltaverifica()" onkeypress="handleMask(event, '999.999.999-99')" size=40>

            <input class="field" name="rg" id="rg" placeholder="Insira seu RG" onclick="voltaverifica()" onkeypress="handleMask(event, '99.999.999-9')" size=40>
            <input class="field" name="nascimento" id="nascimento" placeholder="Insira sua data de nascimento" onclick="voltaverifica()" onkeypress="handleMask(event, '99/99/9999')" size=40>

            <input class="field" name="email" id="email" placeholder="Insira seu email" onclick="voltaverifica()">

            
                
           <button type="button"id="verifica" name="verificar" class="but" onmouseover="mousecima()" onmouseout="mousesai()" onclick="vldr()" >Cadastrar</button>
                
           <button type="submit"id="envio" name="entrar" class="but" onmouseover="mousecima()" onmouseout="mousesai()" >Cadastrar2</button>
           
           <button type="button"id="conta" class="but" onmouseover="mousecima2()" onmouseout="mousesai2()" onclick="telalogin()" >Já tenho conta</button>
          
           <br>
        </form>

    </div>
  </section>

<script>
      function handleMask(event, mask) {
    with (event) {
        stopPropagation()
        preventDefault()
        if (!charCode) return
        var c = String.fromCharCode(charCode)
        if (c.match(/\D/)) return
        with (target) {
            var val = value.substring(0, selectionStart) + c + value.substr(selectionEnd)
            var pos = selectionStart + 1
        }
    }
    var nan = count(val, /\D/, pos) // nan va calcolato prima di eliminare i separatori
    val = val.replace(/\D/g,'')

    var mask = mask.match(/^(\D*)(.+9)(\D*)$/)
    if (!mask) return // meglio exception?
    if (val.length > count(mask[2], /9/)) return

    for (var txt='', im=0, iv=0; im<mask[2].length && iv<val.length; im+=1) {
        var c = mask[2].charAt(im)
        txt += c.match(/\D/) ? c : val.charAt(iv++)
    }

    with (event.target) {
        value = mask[1] + txt + mask[3]
        selectionStart = selectionEnd = pos + (pos==1 ? mask[1].length : count(value, /\D/, pos) - nan)
    }

    function count(str, c, e) {
        e = e || str.length
        for (var n=0, i=0; i<e; i+=1) if (str.charAt(i).match(c)) n+=1
        return n
    }
}


function trocarcor2(){
    let cons = document.getElementById("cons");
    if(cons.text != "Informe o tipo de consulta"){
        cons.style.color = "black";
    }
    else{
    cons.style.color = "gray";
    }
}
function mousecima(){
    let borda = document.getElementById("envio")
    borda.style.borderColor = "white";
    borda.style.color = "white";
    borda.style.backgroundColor = "darkblue";
    let borda2 = document.getElementById("verifica")
    borda2.style.borderColor = "white";
    borda2.style.color = "white";
    borda2.style.backgroundColor = "darkblue";
}
function mousesai(){
    let borda = document.getElementById("envio")
    borda.style.borderColor = "darkblue";
    borda.style.color = "darkblue";
    borda.style.backgroundColor = "white";
    let borda2 = document.getElementById("verifica")
    borda2.style.borderColor = "darkblue";
    borda2.style.color = "darkblue";
    borda2.style.backgroundColor = "white";
}
function mousecima2(){
    let borda = document.getElementById("conta")
    borda.style.borderColor = "white";
    borda.style.color = "white";
    borda.style.backgroundColor = "darkblue";
}
function mousesai2(){
    let borda = document.getElementById("conta")
    borda.style.borderColor = "darkblue";
    borda.style.color = "darkblue";
    borda.style.backgroundColor = "white";
}
function voltaverifica(){
    verifica.style.display = 'block';
    envio.style.display = 'none';
}
function telalogin(){
    location.replace("conta.php");
}
function vldr(){
    var nome = document.getElementById("nome").value;
    var sobrenome = document.getElementById("sobrenome").value;
    var senha= document.getElementById("senha").value;
    var csenha = document.getElementById("csenha").value;
    var nascimento = document.getElementById("nascimento").value;
    var cpf = document.getElementById("cpf").value;
    var rg = document.getElementById("rg").value;
    var email = document.getElementById("email").value;
    var date = nascimento.split("/");
    let m = date[0];
     let d = date[1];
     let y = date[2];
    var date2 = (y + "-" + d + "-" + m);
    var date3 = new Date(date2).toUTCString();
    var dataatual = new Date().toLocaleDateString();
    var dataatual2 = dataatual.split("/");
    let m2 = dataatual2[0];
    let d2 = dataatual2[1];
    let y2 = dataatual2[2];
    var envio = document.getElementById("envio");
    var verifica = document.getElementById("verifica");
    var vrf = 1;
    cpf = cpf.trim();
      cpf = cpf.replace('.','');
      cpf = cpf.replace('.','');
      cpf = cpf.replace('-','');
      cpf = cpf.split('');
      c1 = parseInt(cpf[0]);
      c2 = parseInt(cpf[1]);
      c3 = parseInt(cpf[2]);
      c4 = parseInt(cpf[3]);
      c5 = parseInt(cpf[4]);
      c6 = parseInt(cpf[5]);
      c7 = parseInt(cpf[6]);
      c8 = parseInt(cpf[7]);
      c9 = parseInt(cpf[8]);
      c10 = parseInt(cpf[9]);
      c11 = parseInt(cpf[10]);
     
    toastr.options = {
        "positionClass": "toast-bottom-right",
      }

  // alert(document.form.rg.value.length);
   if(d == 04 || d == 06 || d == 09 || d == 11){
       if(m > 30){
        toastr["error"]("Data de nascimento inválida", "Erro ao cadastrar")
        vrf = 0;
       }
   }
   else if(d == 02 && m > 28){
    toastr["error"]("Data de nascimento inválida", "Erro ao cadastrar")
        vrf = 0;
   }
    else if(m > 31 || d > 12 || y < 1900 ){ 
        toastr["error"]("Data de nascimento inválida", "Erro ao cadastrar")
        vrf = 0;
    }
    else if(y >= y2){
        vrf = 0;
        toastr["error"]("Data de nascimento inválida", "Erro ao cadastrar")
    }
else if (document.form.nascimento.value.length < 10) {
        toastr["error"]("Data de nascimento inválida", "Erro ao cadastrar")
        vrf = 0;
    }
    if(nome== "" || sobrenome=="" || rg ==""|| cpf=="" || senha=="" || csenha=="" || email=="" || nascimento==""){
    toastr["warning"]("Preencha todos os campos", "Erro ao cadastrar")
    vrf = 0;
}

   if (rg.length < 12) {
    vrf = 0;
    toastr["error"]("RG inválido", "Erro ao cadastrar")
}


 if (document.form.senha.value.length < 4) {
    toastr["warning"]("Insira outra senha", "Senha muito fraca")
    vrf = 0;
}
 if(senha != csenha){
    toastr["warning"]("Senha inválida", "Senhas não coincidem")
    vrf = 0;
}
if (document.form.cpf.value.length < 14) {
 toastr["error"]("CPF inválido", "Erro ao cadastrar")
 vrf = 0;
}
else{
    if(c1 == c2 && c1 == c3 && c1 == c4 && c1 == c5 && c1 == c6 && c1 == c7 && c1 == c8 && c1 == c9 && c1 == c10 && c1 == c11){
        toastr["error"]("CPF inválido", "Erro ao cadastrar")
        vrf = 0; 
    }
var c1x = c1 * 1;
      var c2x = c2 * 2;
       var c3x = c3 * 3;
       var c4x = c4 * 4;
       var c5x = c5 * 5;
       var c6x = c6 * 6;
       var c7x = c7 * 7;
       var c8x = c8 * 8;
       var c9x = c9 * 9;
      var resto = (c1x + c2x + c3x + c4x + c5x + c6x + c7x + c8x + c9x) % 11;
      if(resto > 9){
        resto = 0;
      }
      if(resto != c10){
        toastr["error"]("CPF inválido", "Erro ao cadastrar")
        vrf = 0;
      }
      else{
        c1 = c1 * 0;
        c2 = c2 * 1;
        c3 = c3 * 2;
        c4 = c4 * 3;
        c5 = c5 * 4;
        c6 = c6 * 5;
        c7 = c7 * 6;
        c8 = c8 * 7;
        c9 = c9 * 8;
        c10 = c10 * 9;
        var resto2 = (c1 + c2 + c3 + c4 + c5 + c6 + c7 + c8 + c9 + c10) % 11;
        if(resto2 > 9){
          resto2 = 0;
        }
        if(resto2 != c11){
          toastr["error"]("CPF inválido", "Erro ao cadastrar")
          vrf = 0;
        }
    }
}
   if(vrf == 1){

    swal({
        title: "Deseja cadastrar os dados?",
        text: "Dados prontos para serem cadastrados!",
        icon: "success",
        buttons: ["Não","Sim"]
      }).then((willDelete) => {
        if (willDelete) {
          document.getElementById('form').submit();
          
        } else {
          
        }
      });
    
    }
    
            }
           
</script>
</script>
</body>
</html>
