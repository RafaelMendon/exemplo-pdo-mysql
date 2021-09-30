<?php
require_once './vendor/autoload.php';

use exemplo_pdo_mysql\MySQLConnection; //PDO;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $bd = new MySQLConnection; //new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
    $comando = $bd->prepare('INSERT INTO generos(nome) values (:nome)');
    $comando->execute([':nome' => $_POST['nome']]);
    header('Location:index.php');
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <main class="container">
        <h1>Novo Genero</h1>
        <form action="insert.php" method= post>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input class="form-control" type="text" name="nome" id="">
            </div>
            <br>
            <button class="btn btn-success" type="submit">Salvar</button>
        </form>

    </main>
</body>
</html>