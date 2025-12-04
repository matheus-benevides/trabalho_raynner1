<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">

</head>

<body>
    <?php include 'php/componentes/nav.php' ?>
    <main class="contaudo-principal">
        <form action="" method="POST">
            <header>
                <h3>Cadastro</h3>
            </header>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                require 'php/conexao.php';

                $pessoa_nome = $_POST['nome'];
                $pessoa_tipo = $_POST['tipo'];
                //Documento 
                $pessoa_situacao = $_POST['situacao'];
                $pessoa_telefone = $_POST['telefone'];
                $pessoa_celular = $_POST['celular'];
                $pessoa_email = $_POST['email'];
                $pessoa_data_cadastro = $_POST['data'];

                $pessoa_rg = $_POST['rg'];
                $pessoa_cpf = $_POST['cpf'];
                $pessoa_titulo = $_POST['titulo'];
                $pessoa_cnh = $_POST['cnh'];
                $pessoa_cnpj = $_POST['cnpj'];
                $pessoa_ins_est = $_POST['insc_est'];
                $pessoa_ins_mun = $_POST['insc_mun'];

                $insertDocumento = "INSERT INTO pessoa_documento(
                        pessoa_rg,
                        pessoa_cpf,
                        pessoa_titulo,
                        pessoa_cnh,
                        pessoa_cnpj,
                        pessoa_ins_est,
                        pessoa_ins_mun
                        )VALUES(
                            '$pessoa_rg',
                            '$pessoa_cpf',
                            '$pessoa_titulo',
                            '$pessoa_cnh',
                            '$pessoa_cnpj',
                            '$pessoa_ins_est',
                            '$pessoa_ins_mun'
                    );";

                mysqli_query($con, $insertDocumento);

                // $consultaDocumento = "SELECT * FROM pessoa_documento";
                // $executandoDocumento = mysqli_query($con, $consultaDocumento);
                // $qntdDocumentos = mysqli_num_rows($executandoDocumento);

                // $pessoa_documento = $qntdDocumentos;

                $ultimoIDDocumentos = $con->insert_id;

                $insertPessoa = "INSERT INTO tab_pessoa(
                        pessoa_nome,
                        pessoa_tipo,
                        pessoa_documento,
                        pessoa_situacao,
                        pessoa_telefone,
                        pessoa_celular,
                        pessoa_email,
                        pessoa_data_cadastro
                    )VALUES(
                            '$pessoa_nome',
                            '$pessoa_tipo',
                            '$ultimoIDDocumentos',
                            '$pessoa_situacao',
                            '$pessoa_telefone',
                            '$pessoa_celular',
                            '$pessoa_email',
                            '$pessoa_data_cadastro'
                    );";

                mysqli_query($con, $insertPessoa);

                $pessoa_endereco_end = $_POST['endereco'];
                $pessoa_endereco_num = $_POST['numero'];
                $pessoa_bairro = $_POST['bairro'];
                $pessoa_cidade = $_POST['cidade'];
                $pessoa_cep = $_POST['cep'];
                $pessoa_obs = $_POST['obs'];
                $pessoa_endereco_tipo = $_POST['tipo_endereco'];


                // $consultaPessoa = "SELECT * FROM tab_pessoa";
                // $executandoPessoa = mysqli_query($con, $consultaPessoa);
                // $qntdPessoa = mysqli_num_rows($executandoPessoa);

                // $pessoa_nome = $qntdPessoa;

                $ultimoIDPessoa = $con->insert_id;

                $insertEndereco = "INSERT INTO pessoa_enderecos(
                        pessoa_endereco_id_pessoa,
                        pessoa_endereco_end,
                        pessoa_endereco_num,
                        pessoa_bairro,
                        pessoa_cidades,
                        pessoa_cep,
                        pessoa_obs,
                        pessoa_endereco_tipo
                    )VALUES(
                        '$ultimoIDPessoa',
                        '$pessoa_endereco_end',
                        '$pessoa_endereco_num',
                        '$pessoa_bairro',
                        '$pessoa_cidade',
                        '$pessoa_cep',
                        '$pessoa_obs',
                        '$pessoa_endereco_tipo'
                    );";

                mysqli_query($con, $insertEndereco);

                $pessoa_contas_banco = $_POST['banco'];
                $pessoa_contas_agencia = $_POST['agencia'];
                $pessoa_contas_gerente = $_POST['gerente'];

                $insertContas = "INSERT INTO pessoa_contas_bancarias(
                    pessoa_id,
                    pessoa_contas_banco,
                    pessoa_contas_agencia,
                    pessoa_contas_gerente
                )VALUES(
                    '$ultimoIDPessoa',
                    '$pessoa_contas_banco',
                    '$pessoa_contas_agencia',
                    '$pessoa_contas_gerente'
                );";

                mysqli_query($con, $insertContas);

                echo "<script>alert('Cadastrado com sucesso!')</script>";
            }

            ?>
            <fieldset class="dados-pes">
                <legend>Dados Pessoais</legend>
                <div class="caixa-input">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome da Silva">
                </div>
                <div class="caixa-input">
                    <label for="tipo">Tipo de Pessoa:</label>
                    <select name="tipo" id="tipo" onchange="cpfCnpj()">
                        <?php
                        require 'php/conexao.php';

                        $coletando = "SELECT * FROM tab_tipo_pessoa";

                        $executando = mysqli_query($con, $coletando);
                        while ($linha = mysqli_fetch_array($executando)) {
                            echo "<option value='" . $linha["tipo_pessoa_id"] . "'>" . $linha["tipo_pessoa_descricao"] . "</option>";
                        }

                        mysqli_close($con);
                        ?>
                    </select>
                </div>
                <div class="caixa-input">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00">
                    <label for="rg">RG:</label>
                    <input type="text" id="rg" name="rg" placeholder="55.555.119-2">
                    <label for="titulo">Titulo de Eleitor:</label>
                    <input type="text" id="titulo" name="titulo" placeholder="000000000-00">
                    <label for="cnh">CNH:</label>
                    <input type="text" id="cnh" name="cnh" placeholder="00000000">
                    <label for="cnpj" class="escondido">CNPJ:</label>
                    <input class='escondido' type="text" name="cnpj" id="cnpj" placeholder="CNPJ">
                    <label for="insc_est" class="escondido">Inscrição Estadual:</label>
                    <input class='escondido' type="text" name="insc_est" id="insc_est" placeholder="Inscrição Estadual">
                    <label for="insc_mun" class="escondido">Inscrição Municipal:</label>
                    <input class='escondido' type="text" name="insc_mun" id="insc_mun" placeholder="Inscrição Munincipal">
                </div>
                <div class="caixa-input">
                    <label for="situacao">Situação:</label>
                    <select name="situacao" id="situacao">
                        <option value="sem Valor" disabled selected>Selecione Uma Atividade</option>
                        <?php
                        require 'php/conexao.php';

                        $coletando = "SELECT * FROM pessoa_situacao";

                        $executando = mysqli_query($con, $coletando);
                        while ($linha = mysqli_fetch_array($executando)) {
                            echo "<option value='" . $linha["pessoa_situacao_id"] . "'>" . $linha["pessoa_situacao_desc"] . "</option>";
                        }

                        mysqli_close($con);
                        ?>
                    </select>
                </div>
                <div class="caixa-input">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" name="telefone" id="telefone" placeholder="+55 (00) 00000-0000">
                </div>
                <div class="caixa-input">
                    <label for="celular">Celular:</label>
                    <input type="tel" name="celular" id="celular" placeholder="+55 (00) 00000-0000">
                </div>
                <div class="caixa-input">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="exemplo@exemplo.com">
                </div>
            </fieldset>
            <fieldset class="dados-end">
                <legend>
                    Endereço
                </legend>
                <div class="caixa-input">
                    <label for="endereco">Rua:</label>
                    <input type="text" name="endereco" id="endereco" placeholder="R. Exemplo">
                    <label for="numero">Número:</label>
                    <input type="number" name="numero" id="numero" placeholder="000">
                    <label for="bairro">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" placeholder="Av. Dos Exemplos">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" placeholder="Cidade">
                    <label for="cep">CEP:</label>
                    <input type="text" name="cep" id="cep" placeholder="00000-000">
                    <label for="obs">Observação:</label>
                    <input type="text" name="obs" id="obs" placeholder="Insira a Observação">
                    <label for="tipo_endereco">Tipo de Endereço:</label>
                    <select name="tipo_endereco" id="tipo_endereco">
                        <option value="sem Valor" disabled selected>Selecione o Tipo de Endereço</option>
                        <?php
                        require 'php/conexao.php';

                        $coletando = "SELECT * FROM pessoa_tipo_endereco";
                        $executando = mysqli_query($con, $coletando);
                        while ($linha = mysqli_fetch_array($executando)) {
                            echo "<option value='" . $linha["pessoa_tipo_end_id"] . "'>" . $linha["pessoa_tipo_end_descricao"] . "</option>";
                        }

                        mysqli_close($con);
                        ?>
                    </select>
                </div>
                <div class="caixa-btn">
                    <button type="button">Add Endereço</button>
                </div>
            </fieldset>

            <fieldset class="dados-ban">
                <legend>Dados Bancarios</legend>
                <div class="caixa-input">
                    <label for="banco">Banco:</label>
                    <input type="text" name="banco" id="banco" placeholder="Banco Exemplo">
                    <label for="agencia">Agência:</label>
                    <input type="text" name="agencia" id="agencia" placeholder="Agência 001">
                    <label for="gerente">Nome do Gerente:</label>
                    <input type="text" name="gerente" id="gerente" placeholder="Nome Gerente Da Silva">
                </div>
                <div class="caixa-input" style="display: none;">
                    <label for="data">Data Cadastro:</label>
                    <input type="date" name="data" id="data" value="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="caixa-btn">
                    <button type="button" onclick="addConta()">Add Conta</button>
                </div>
            </fieldset>
            <div class="caixa-btn">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </main>
    <script src='scripts.js' defer></script>
</body>

</html>