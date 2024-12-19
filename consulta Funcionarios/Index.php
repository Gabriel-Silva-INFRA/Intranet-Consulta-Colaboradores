

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Funcionários por Nome</title>
    <link rel="shortcut icon" type="image/x-icon" href="simbolo.ico">
    <link rel="stylesheet" href="styles.css"> <!-- Inclua o arquivo de estilos CSS -->
    
</head>
<body>

<!-- Menu Lateral -->
<div class="sidebar">
    <div class="sidebar-header">
        <img class="sidebar-logo" src="logo.png" alt="Logo">
    </div>
    <ul class="menu">
        <li><a href="Index.php">Início</a></li>
        <li class="submenu-item" id="funcionarios">
            <a href="#">Funcionários</a>
            <ul class="submenu">
                
                <li><a href="consulta_funcionario.php">Consultar</a></li>
              
            </ul>
        </li>
        
        
        </li>
       
    </ul>
</div>

<!-- Conteúdo Principal -->
<div class="container">
    <h1>Consulta de Funcionários</h1>
    <form method="GET" action="consulta.php">
        <label for="nome">Nome do Funcionário:</label>
        <input type="text" id="nome" name="nome" placeholder="Nome do Funcionário"><br><br>
        <label for="empresa">Selecionar Empresa:</label>
        <select id="empresa" name="empresa">
            <option value="">Selecione a empresa</option>
            
           <?php
           // Conexão com o banco de dados
           $servername = "192.168.1.203";
           $username = "binaural";
           $password = "binaural@2024";
           $dbname = "funcionarios";

           $conn = new mysqli($servername, $username, $password, $dbname);

           if ($conn->connect_error) {
               die("Erro na conexão com o banco de dados: " . $conn->connect_error);
           }

           // Consulta SQL para obter a lista de empresas
           $sql = "SELECT DISTINCT empresa FROM colaboradores ORDER BY empresa";
           $result = $conn->query($sql);

           if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                   echo "<option value='" . $row['empresa'] . "'>" . $row['empresa'] . "</option>";
               }
           }

           $conn->close();
           ?>
            
        </select><br><br>
        <button type="submit">Consultar</button>
    </form>
</div>

<script src="scripts.js"></script> <!-- Inclua o arquivo de scripts JavaScript -->
</body>
</html>
