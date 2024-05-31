<?php
session_start();

$fila = isset($_COOKIE['fila']) ? unserialize($_COOKIE['fila']) : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar'])) {
        $nome = $_POST['nome'];
        $pedido = $_POST['pedido'];
        array_push($fila, ['nome' => $nome, 'pedido' => $pedido]);

        // Atualizar a quantidade do produto no banco de dados
        update_product_quantity($pedido);
    } elseif (isset($_POST['remover'])) {
        $index = $_POST['remover'];
        if (isset($fila[$index])) {
            unset($fila[$index]);
            $fila = array_values($fila); // Reindexar o array
        }
    }

    setcookie('fila', serialize($fila), time() + (86400 * 30), "/");
}

function fetch_client_names() {
    $db = new SQLite3('database.db');
    $result = $db->query('SELECT nome FROM produtos');

    $names = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $names[] = $row['nome'];
    }

    return $names;
}

function update_product_quantity($product_name) {
    $db = new SQLite3('database.db');

    // Atualizar a quantidade do produto na tabela produtos
    $stmt = $db->prepare('UPDATE produtos SET preco = preco - 1 WHERE nome = :nome AND preco > 0');
    $stmt->bindValue(':nome', $product_name, SQLITE3_TEXT);
    $stmt->execute();
    $stmt->close();
    $db->close();
}

$client_names = fetch_client_names();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            background-color: #f0f0f0;
        }
        h1, h2 {
            color: #333;
        }
        form {
            margin-bottom: 1em;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 1em;
            background-color: #fff;
            padding: 1em;
            border-radius: 5px;
        }
        button {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button[name="adicionar"] {
            background-color: #008000;
            color: #fff;
        }
        button[name="adicionar"]:hover {
            background-color: #006400;
        }
        button[name="remover"], a button {
            background-color: #FF0000;
            color: #fff;
            padding: 5px 10px; 
        }
        button[name="remover"]:hover, a button:hover {
            background-color: #8B0000;
        }
        input[type="text"], select {
            height: 30px; 
        }
        a button {
            padding: 15px 30px;
            display: block;
            margin-top: 20px; 
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
    <h1>Cadastro de Cliente</h1>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <select name="pedido" required>
            <?php foreach ($client_names as $name) : ?>
                <option value="<?= htmlspecialchars($name) ?>"><?= htmlspecialchars($name) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="adicionar">Adicionar à fila</button>
    </form>

    <h2>Fila:</h2>
    <ul>
        <?php foreach ($fila as $index => $pessoa) : ?>
            <li>
                <?= htmlspecialchars($pessoa['nome']) ?> - <?= htmlspecialchars($pessoa['pedido']) ?>
                <form method="post">
                    <button type="submit" name="remover" value="<?= $index ?>">Remover da fila</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php"><button>Voltar ao Menu</button></a>
</body>
</html>
