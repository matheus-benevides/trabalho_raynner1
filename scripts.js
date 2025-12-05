function cpfCnpj() {
    var selecao = document.getElementById("tipo").value;
    if (selecao == 1) {
        document.getElementById("cpf").readOnly = false;
        document.getElementById("rg").readOnly = false;
        document.getElementById("titulo").readOnly = false;
        document.getElementById("cnh").readOnly = false;
        document.getElementById("cpf").value = '';
        document.getElementById("rg").value = '';
        document.getElementById("titulo").value = '';
        document.getElementById("cnh").value = '';
        document.getElementById("cnpj").value = '';
        document.getElementById("insc_est").value = '';
        document.getElementById("insc_mun").value = '';
        var escondidos = document.querySelectorAll(".escondido");
        for (let i = 0; i < escondidos.length; i++) {
            escondidos[i].style.display = "none";
        }
    } else {
        document.getElementById("cnpj").value = '';
        document.getElementById("insc_est").value = '';
        document.getElementById("insc_mun").value = '';
        document.getElementById("cpf").value = '';
        document.getElementById("rg").value = '';
        document.getElementById("titulo").value = '';
        document.getElementById("cnh").value = '';
        document.getElementById("cpf").readOnly = true;
        document.getElementById("rg").readOnly = true;
        document.getElementById("titulo").readOnly = true;
        document.getElementById("cnh").readOnly = true;
        var escondidos = document.querySelectorAll(".escondido");
        for (let i = 0; i < escondidos.length; i++) {
            escondidos[i].style.display = "grid";
        }
    }
}

function addConta() {
    var tudoConta = document.querySelector(".dados-ban").innerHTML;
    console.log(tudoConta);
    document.querySelector(".dados-ban").innerHTML += `<div class="caixa-input">
                    <label for="banco">Banco:</label>
                    <input type="text" name="banco[]" id="banco" placeholder="Banco Exemplo">
                    <label for="agencia">Agência:</label>
                    <input type="text" name="agencia[]" id="agencia" placeholder="Agência 001">
                    <label for="gerente">Nome do Gerente:</label>
                    <input type="text" name="gerente[]" id="gerente" placeholder="Nome Gerente Da Silva">
                    <button onclick='this.parentElement.remove()'>Remover</button>
                    </div>`
}

function addEndereco() {
    var tudoConta = document.querySelector(".dados-end").innerHTML;
    console.log(tudoConta);
    document.querySelector(".dados-end").innerHTML += `<div class="caixa-input">
                    <label for="endereco">Rua:</label>
                    <input type="text" name="endereco[]" id="endereco" placeholder="R. Exemplo">
                    <label for="numero">Número:</label>
                    <input type="number" name="numero[]" id="numero" placeholder="000">
                    <label for="bairro">Bairro:</label>
                    <input type="text" name="bairro[]" id="bairro" placeholder="Av. Dos Exemplos">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade[]" id="cidade" placeholder="Cidade">
                    <label for="cep">CEP:</label>
                    <input type="text" name="cep[]" id="cep" placeholder="00000-000">
                    <label for="obs">Observação:</label>
                    <input type="text" name="obs[]" id="obs" placeholder="Insira a Observação">
                    <label for="tipo_endereco">Tipo de Endereço:</label>
                    <select name="tipo_endereco[]" id="tipo_endereco">
                    <option value="sem Valor" disabled selected>Selecione o Tipo de Endereço</option>
                    <option value='1'>Endereço de Entrega</option><option value='2'>Endereço da Casa</option><option value='3'>Endereço de Cobrança</option>                    </select>
                    <button onclick='this.parentElement.remove()'>Remover</button>
                </div>`;
}