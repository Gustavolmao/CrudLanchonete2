<?php
$db = new SQLite3("database.db");

// Consulta para selecionar todos os registros da tabela
$result = $db->query('SELECT * FROM produtos');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr {
            background-color: #ffffff; 
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: white;
            background-color: #f44336;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-back:hover {
            background-color: #e33022;
        }
        body {
            background-image: url('snackedit.png');
            background-size: cover; 
            background-position: center center; 
            background-repeat: no-repeat; 
            height: 100vh; 
            margin: 0; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listar Produtos</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Quantidade</th>
            </tr>
            <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['descricao']; ?></td>
                    <td><?php echo $row['preco']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <a href="estoque.php" class="btn-back">Voltar ao Estoque</a>
    </div>
</body>
</html>

<?php
$db->busyTimeout(5000);
$db->close();
?>
