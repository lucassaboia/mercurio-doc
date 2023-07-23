function vld(){
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
    
    toastr.options = {
        "positionClass": "toast-bottom-right",
      }

  // alert(document.form.rg.value.length);

     if(m > 31 || d > 12 || y < 1900 ){ 
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
} if(vrf == 1){

    swal({
        title: "Deseja cadastrar os dados?",
        text: "Dados prontos para serem cadastrados",
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

    function vldcpf()
    {
      var cpf = document.getElementById("cpf").value;
      cpf = cpf.trim();
      cpf = cpf.replace('.','');
      cpf = cpf.replace('.','');
      cpf = cpf.replace('-','');
      cpf = cpf.split('');
      c1 = parseInt(cpf[0]) * 1;
      c2 = parseInt(cpf[1]) * 2;
      c3 = parseInt(cpf[2]) * 3;
      c4 = parseInt(cpf[3]) * 4;
      c5 = parseInt(cpf[4]) * 5;
      c6 = parseInt(cpf[5]) * 6;
      c7 = parseInt(cpf[6]) * 7;
      c8 = parseInt(cpf[7]) * 8;
      c9 = parseInt(cpf[8]) * 9;
      c10 = parseInt(cpf[9]);
      c11 = parseInt(cpf[10]);
      
      var resto = (c1 + c2 + c3 + c4 + c5 + c6 + c7 + c8 + c9) % 11;
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
        c3 = c3 + 2;
        c4 = c4 * 3;
        c5 = c5 * 4;
        c6 = c6 * 5;
        c7 = c7 * 6;
        c8 = c8 * 7;
        c9 = c9 * 8;
        c10 = c10 * 9;
        var resto2 = (c1 + c2 + c3 + c4 + c5 + c6 + c7 + c8 + c9 + c10) % 11;
        alert(c1); alert(c2); alert(c3);alert(c4);alert(c5);alert(c6);
      alert(c7);alert(c8);alert(c9);alert(c10);alert(c11); alert(resto2);
        if(resto2 > 9){
          resto2 = 0;
        }
        if(resto2 != c11){
          toastr["error"]("CPF inválido 2", "Erro ao cadastrar")
          vrf = 0;
        }
      }
    }
           
           