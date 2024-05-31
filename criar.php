<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['preco'];

    $db = new SQLite3("database.db");

    $stmt = $db->prepare('INSERT INTO produtos (nome, descricao, preco) VALUES (:nome, :descricao, :preco)');
    $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
    $stmt->bindValue(':descricao', $descricao, SQLITE3_TEXT);
    $stmt->bindValue(':preco', $quantidade, SQLITE3_FLOAT);

    if ($stmt->execute()) {
        echo "<p class='success-message'>Produto adicionado com sucesso!</p>";
    } else {
        echo "<p class='error-message'>Erro ao adicionar o produto.</p>";
    }
    
    $db->busyTimeout(5000);
    $db->close();
}

?>

<html>
<head>
    <title>Criar Produto</title>
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
        <h1>Criar Novo Produto</h1>
        <form method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" required></textarea>
            </div>
            <div class="form-group">
                <label for="preco">Quantidade:</label>
                <input type="number" step="0.01" id="preco" name="preco" required>
            </div>
            <div class="form-group">
                <input type="submit" class="button-green" value="Adicionar Produto">
            </div>
        </form>
        <a href="estoque.php" class="btn-back">Voltar ao Estoque</a>
    </div>
</body>
</html>
