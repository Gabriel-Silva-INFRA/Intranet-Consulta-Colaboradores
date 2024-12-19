<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['authenticated'])) {
    header("Location: login.php");
    exit();
}


?>
<div class="sidebar">
    <div class="sidebar-header">
        <img class="sidebar-logo" src="logo.png" alt="Logo">
    </div>
    <ul class="menu">
        <li><a href="Inicial.php">Início</a></li>
        <li class="submenu-item" id="funcionarios">
            <a href="#">Funcionários</a>
            <ul class="submenu">
                <li><a href="cadastrar_usuario.php">Cadastro de Usuários</a></li>
                <li><a href="adicionar.php">Adicionar Colaborador</a></li>
                <li><a href="consulta_funcionario.php">Consultar</a></li>
                <li><a href="editar_funcionario.php">Editar</a></li>
            </ul>
        </li>
        <li class="submenu-item" id="solicitação de compra">
            <a href="#">Solicitação de Compra</a>
            <ul class="submenu">
                <li><a href="solicitacao_compra.php">Solicitar Compra</a></li>
                <li><a href="Compras_Solicitadas.php">Compras Solicitadas</a></li>
                <li><a href="Compras_Concluidas.php">Consultar Pedidos</a></li>
            </ul>
        </li>
        
        </li>
        <li><a href="logout.php">Sair</a></li>
    </ul>
</div>
