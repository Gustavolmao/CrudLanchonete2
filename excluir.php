<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $db = new SQLite3("database.db");

    $stmt = $db->prepare('SELECT * FROM produtos WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute();

    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $nome = $row['nome'];
        $descricao = $row['descricao'];
        $preco = $row['preco'];
    } else {
        echo "Produto não encontrado.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir'])) {
    $id = $_POST['id'];

    $db->exec('BEGIN');

    // Exclui o registro baseado no ID
    $stmt = $db->prepare('DELETE FROM produtos WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

    if ($stmt->execute()) {
    
        $db->exec('COMMIT');
        echo "<p class='success-message'>Produto excluido com sucesso!</p>";
    } else {
       
        $db->exec('ROLLBACK');
        echo "<p class='error-message'>Erro ao excluir o produto.</p>";
    }
}
?>

<html>
<head>
    <title>Excluir Produto</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #45a049;
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
        .success-message {
            color: #28a745;
            background-color: #d4edda; 
            border: 1px solid #c3e6cb; /
            padding: 10px; 
            border-radius: 5px;
            font-size: 16px; 
            font-weight: bold; 
            margin: 20px 0; 
            text-align: center; 
        }

        .error-message {
            color: #dc3545; 
            background-color: #f8d7da; 
            border: 1px solid #f5c6cb; 
            padding: 10px; 
            border-radius: 5px; 
            font-size: 16px; 
            font-weight: bold;
            margin: 20px 0; 
            text-align: center; 
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
        <h1>Excluir Produto</h1>
        <form method="post">
            <div class="form-group">
                <label for="id">ID do Produto:</label>
                <input type="number" id="id" name="id" required>
            </div>
            <div class="form-group">
                <input type="submit" name="buscar" value="Buscar Produto">
            </div>
        </form>

        <?php if (isset($nome)) { ?>
            <p>Você está prestes a excluir o seguinte produto:</p>
            <p><strong>ID:</strong> <?php echo $id; ?></p>
            <p><strong>Nome:</strong> <?php echo $nome; ?></p>
            <p><strong>Descrição:</strong> <?php echo $descricao; ?></p>
            <p><strong>Quantidade:</strong> <?php echo $preco; ?></p>
            <p>Tem certeza de que deseja excluí-lo?</p>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <input type="submit" name="excluir" value="Sim, Excluir">
                </div>
            </form>
        <?php } ?>
        <a href="estoque.php" class="btn-back">Voltar ao Estoque</a>
    </div>
</body>
</html>
