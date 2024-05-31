<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD SQLite</title>
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
        .btn-green {
            display: inline-block;
            margin: 10px; 
            padding: 10px 20px;
            color: white;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-green:hover {
            background-color: #45a049;
        }
        body {
            background-image: url('snackedit.png');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="criar.php" class="btn-green">Adicionar Produto</a></li>
            <li><a href="listar.php" class="btn-green">Listar Produtos</a></li>
            <li><a href="editar.php" class="btn-green">Editar Produto</a></li>
            <li><a href="excluir.php" class="btn-green">Excluir Produto</a></li>
        </ul>
    </nav>
    <div class="container">
        <a href="index.php" class="btn-back">Voltar ao Menu</a>
    </div>
</body>
</html>
