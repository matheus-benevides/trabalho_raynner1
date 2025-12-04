<?php
    $pagina = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <div class="nav-header">
        <h3>Cadastro de Pessoas</h3>
    </div>
    <div class="nav-links">
        <a href="index.php" class="<?php if($pagina == "index.php") echo 'ativo' ?>">Cadastrar</a>
        <a href="exibir.php" class="<?php if($pagina == "exibir.php") echo 'ativo' ?>">Consultar</a>
    </div>
</nav>