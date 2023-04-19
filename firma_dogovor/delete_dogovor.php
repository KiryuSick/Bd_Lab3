<!doctype html> 
<html lang="en">

<head>
    <title>Видалення договору</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {background-color: tomato;}
    .container {
        width: 400px;
    }
    </style>
</head>

<body>
    <table class="table" width=100%>
    <div class="container">
    <tbody>
    <?php
    try {
    $bd = new PDO("mysql: host=localhost; dbname=firmadogovor", 'root',''); 
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = intval($_GET['id']);
    $sql = "DELETE FROM dogovor WHERE id_d = $id";
    $bd->exec($sql);
    echo "
            <div class='center'>
            <h4>Договір видалено<h4></div>";
    } catch (PDOException $e) {
    echo "Помилка. Договор не видалено: " . $sql . "<br>" . $e->getMessage();
    }
    ?>
    </tbody>
    <hr>
    <div class="center">
    <a class="btn" style="background: #00796b" href="mainpage.php">На головну</a>
    <a class="btn" style="background: #00796b" href="firm.php">До фірм</a>
    </div>
    </div>
</body>
</html>