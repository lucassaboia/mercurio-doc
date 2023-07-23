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
    verifica2.style.display = 'block';
    envio2.style.display = 'none';
    let cons = document.getElementById("tipo");
    if(cons.text != "Informe o tipo de consulta"){
        cons.style.color = "black";
    }
    else{
    cons.style.color = "gray";
    }
}
function mousecima(){
    let borda = document.getElementById("envio2")
    borda.style.borderColor = "white";
    borda.style.color = "white";
    borda.style.backgroundColor = "darkblue";
    let borda2 = document.getElementById("verifica2")
    borda2.style.borderColor = "white";
    borda2.style.color = "white";
    borda2.style.backgroundColor = "darkblue";
}
function mousesai(){
    let borda = document.getElementById("envio2")
    borda.style.borderColor = "darkblue";
    borda.style.color = "darkblue";
    borda.style.backgroundColor = "white";
    let borda2 = document.getElementById("verifica2")
    borda2.style.borderColor = "darkblue";
    borda2.style.color = "darkblue";
    borda2.style.backgroundColor = "white";
}
function voltaverifica(){
    verifica2.style.display = 'block';
    envio2.style.display = 'none';
}

function validar(){
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
      }
  
    if(xh > 23 || zh > 59){
        toastr["error"]("Horário inválido", "Erro ao agendar consulta")
        vrf = 0;
    }
     if (document.form.tipo.selectedIndex == 0) {
       toastr["warning"]("Nenhuma consulta selecionada", "Selecione o tipo de consulta")
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
                toastr["success"]("Consulta pronta para ser agendada", "Dados verificados")
                verifica2.style.display = 'none';
                envio2.style.display = 'block';
                /*swal({
                    title: "Sucesso",
                    text: "Dados salvos",
                    icon: "success"
                }
                )
                */
            }
        }
        else if(d2 > d3 && y2>y3 && vrf==1){
            toastr["success"]("Consulta pronta para ser agendada", "Dados verificados")
            verifica2.style.display = 'none';
            envio2.style.display = 'block';
            /* swal({
                title: "Sucesso",
                text: "Dados salvos",
                icon: "success"
            }
            )
            */
        }
    }
    }
    else if(y2>y3 && vrf==1){
        toastr["success"]("Consulta pronta para ser agendada", "Dados verificados")
        verifica2.style.display = 'none';
        envio2.style.display = 'block';
       /* swal({
            title: "Sucesso",
            text: "Dados salvos",
            icon: "success"
        }
        )
        */
    }
}
