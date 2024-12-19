

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="simbolo.ico">
    <meta charset="UTF-8">
    <title>Resultado da Consulta por Nome</title>
    <link rel="stylesheet" href="styles.css"> <!-- Inclua o arquivo de estilos CSS -->
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
    margin-left: 190px;
}

.container {
    max-width: 1000px;  
    background-color: #fff;
    padding: 10px;  
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-left: auto; /* Adicionando margem automática à esquerda e à direita */
    margin-right: auto;
}

h1 {
    text-align: center;
    color: #333;
    margin-top: 10px;  /* Ajustando a margem superior para separar o título do conteúdo */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #4caf50;
    color: #fff;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #ddd;
}

/* Ajustes específicos para largura das colunas */
table th:nth-child(1),
table td:nth-child(1) {
    width: 20%; /* Ajuste para a coluna "Nome" */
}

table th:nth-child(2),
table td:nth-child(2) {
    width: 15%; /* Ajuste para a coluna "Cargo" */
}

table th:nth-child(3),
table td:nth-child(3) {
    width: 15%; /* Ajuste para a coluna "Empresa" */
}

table th:nth-child(4),
table td:nth-child(4) {
    width: 10%; /* Ajuste para a coluna "Ramal" */
}

table th:nth-child(5),
table td:nth-child(5) {
    width: 25%; /* Ajuste para a coluna "Email" */
}

table th:nth-child(6),
table td:nth-child(6) {
    width: 15%; /* Ajuste para a coluna "Celular" */
}


a {
    color: #4caf50;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
    </style>
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

    <div class="container">
        <h1>Resultado da Consulta</h1>

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

        // Obter valores do formulário
        $nome = isset($_GET['nome']) ? $_GET['nome'] : '';
        $empresa = isset($_GET['empresa']) ? $_GET['empresa'] : '';

        // Construir a consulta SQL com base nos parâmetros recebidos
        $sql = "SELECT colaborador, cargo, empresa, ramal, email, celular FROM colaboradores WHERE ativo = 'SIM'";

        if (!empty($nome)) {
            $sql .= " AND colaborador LIKE '%$nome%'";
        }

        if (!empty($empresa)) {
            $sql .= " AND empresa = '$empresa'";
        }

        // Executar a consulta SQL
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibir os dados em uma tabela
            echo "<table>";
            echo "<tr><th>Nome</th><th>Cargo</th><th>Empresa</th><th>Ramal</th><th>Email</th><th>Celular</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["colaborador"] . "</td>";
                echo "<td>" . $row["cargo"] . "</td>";
                echo "<td>" . $row["empresa"] . "</td>";
                echo "<td>" . $row["ramal"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["celular"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhum funcionário ativo encontrado com os critérios de pesquisa.</p>";
        }

        $conn->close();
        ?>

        <p><a href="consulta_funcionario.php">Nova Consulta</a></p>
    </div>
    <script src="scripts.js"></script> <!-- Inclua o arquivo de scripts JavaScript -->
</body>
</html>
