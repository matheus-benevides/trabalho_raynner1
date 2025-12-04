function cpfCnpj() {
    var selecao = document.getElementById("tipo").value;
    if(selecao == 1){
        document.getElementById("cnpj").value = 'Não Informado';
        document.getElementById("insc_est").value = 'Não Informado';
        document.getElementById("insc_mun").value = 'Não Informado';
        var escondidos = document.querySelectorAll(".escondido");
        for(let i = 0; i < escondidos.length; i++){
            escondidos[i].style.display = "none";
        }
    } else{
        var escondidos = document.querySelectorAll(".escondido");
        for(let i = 0; i < escondidos.length; i++){
            escondidos[i].style.display = "inline-flex";
        }
    }
}