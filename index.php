<?php
require_once './vendor/autoload.php';

use exemplo_pdo_mysql\MySQLConnection; //PDO;

$bd = new MySQLConnection(); //('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('select * from generos');
$comando-> execute();
$generos = $comando->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>BIBLIOTECA</title>
</head>
<body>
    <main class="container">
    <a class="btn btn-primary" href="insert.php">Adicionar Novo Gênero</a>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach($generos as $g): ?>
                <tr>
                    <td><?= $g['id']?></td>
                    <td><?=$g['nome'] ?></td>
                    <td> <a class="btn btn-secondary" href="update.php?id=<?=$g['id'] ?>">Editar</a> |
                        <a class="btn btn-danger" href="delete.php?id=<?=$g['id'] ?>">Remover</a></td>
                </tr>
                <?php endforeach ?>
        </table>

            </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>