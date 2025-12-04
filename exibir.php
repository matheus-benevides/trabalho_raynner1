<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Pessoas</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">

</head>

<body>
    <?php include "php/componentes/nav.php" ?>
    <div class="contaudo-principal">
        <h3>Pessoas</h3>
        <div class="tabela-caixa">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Documento</th>
                    <th>Situação</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>E-mail</th>
                    <th>Data Cadastro</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php
                    require "php/conexao.php";

                    $coletando = "SELECT * FROM tab_pessoa";
                    $executando = mysqli_query($con, $coletando);

                    if (mysqli_num_rows($executando) > 0) {
                        while ($linha = mysqli_fetch_array($executando)) {
                            echo "<tr>";
                            echo "<td>" . $linha[0] . "</td>";
                            echo "<td>" . $linha[1] . "</td>";
                            echo "<td>" . $linha[2] . "</td>";
                            echo "<td>" . $linha[3] . "</td>";
                            echo "<td>" . $linha[4] . "</td>";
                            echo "<td>" . $linha[5] . "</td>";
                            echo "<td>" . $linha[6] . "</td>";
                            echo "<td>" . $linha[7] . "</td>";
                            echo "<td>" . $linha[8] . "</td>";
                            // echo "<td>" . "<button onclick='window.location.href="."'deletar.php?id=$linha[0]'"."'>🗑️</button>" . "</td>";
                            include 'php/componentes/btn-acoes.php';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan=10>Nenhuma Pessoa Cadastrada!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <h3>Endereços</h3>
        <div class="tabela-caixa">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Pessoa</th>
                    <th>Rua</th>
                    <th>Numero</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>CEP</th>
                    <th>OBS</th>
                    <th>Tipo de Endereço</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php
                    require "php/conexao.php";

                    $coletando = "SELECT * FROM pessoa_enderecos";
                    $executando = mysqli_query($con, $coletando);

                    if (mysqli_num_rows($executando) > 0) {
                        while ($linha = mysqli_fetch_array($executando)) {
                            echo "<tr>";
                            echo "<td>" . $linha[0] . "</td>";
                            echo "<td>" . $linha[1] . "</td>";
                            echo "<td>" . $linha[2] . "</td>";
                            echo "<td>" . $linha[3] . "</td>";
                            echo "<td>" . $linha[4] . "</td>";
                            echo "<td>" . $linha[5] . "</td>";
                            echo "<td>" . $linha[6] . "</td>";
                            echo "<td>" . $linha[7] . "</td>";
                            echo "<td>" . $linha[8] . "</td>";
                            // echo "<td>" . "<button onclick='window.location.href="."'deletar.php?id=$linha[0]'"."'>🗑️</button>" . "</td>";
                            include 'php/componentes/btn-acoes.php';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan=10>Nenhuma Pessoa Cadastrada!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <h3>Contas Bancarias</h3>
        <div class="tabela-caixa">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Pessoa</th>
                    <th>Banco</th>
                    <th>Agência</th>
                    <th>Gerente</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php
                    require "php/conexao.php";

                    $coletando = "SELECT * FROM pessoa_contas_bancarias";
                    $executando = mysqli_query($con, $coletando);

                    if (mysqli_num_rows($executando) > 0) {
                        while ($linha = mysqli_fetch_array($executando)) {
                            echo "<tr>";
                            echo "<td>" . $linha[0] . "</td>";
                            echo "<td>" . $linha[1] . "</td>";
                            echo "<td>" . $linha[2] . "</td>";
                            echo "<td>" . $linha[3] . "</td>";
                            echo "<td>" . $linha[4] . "</td>";
                            // echo "<td>" . "<button onclick='window.location.href="."'deletar.php?id=$linha[0]'"."'>🗑️</button>" . "</td>";
                            include 'php/componentes/btn-acoes.php';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan=10>Nenhuma Pessoa Cadastrada!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>