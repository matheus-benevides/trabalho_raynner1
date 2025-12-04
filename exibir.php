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
    <div>
        <table>
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>CPF</th>
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


                ?>
            </tbody>
        </table>
    </div>
</body>

</html>