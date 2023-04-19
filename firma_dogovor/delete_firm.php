<?php
$bd = new mysqli('localhost', 'root', '', 'firmadogovor'); 
if ($bd->connect_error) {
die("Помилка підключення: " . $bd->connect_error);
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Видалення фірми</title>
    <meta charset="cp1251">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> 
    <style>
        body {background-color: turquoise;}
        .container {
        width: 500px;
        }
    </style>
</head>

<body>
    <table class="table" width=100%>
    <div class="container">
    <tbody>
    <?php
        $id = intval($_GET['id']);
        $sql1 = "DELETE FROM dogovor WHERE id_firm = $id";
        $sql2 = "DELETE FROM firm WHERE id_firm = $id";
        if ($bd->query($sql1) ===  TRUE) {

        } else {
            echo "Помилка видалення договорiв фiрми: " . $bd->error . "<br>";
        }
        
        if ($bd->query($sql2) === TRUE) {
            echo "
            <div class='center'>
            <h4>Фірму видалено<h4></div>";
        } else {
            echo "Помилка видалення фірми: " . $bd->error . "<br>";
        }
    ?>
    </tbody>

    <hr>
    <div class="center">
    <a class="btn" style="background: #00796b" href="mainpage.php">На головну</a>
    <a class="btn" style="background: #00796b" href="firm.php">До фірм</a>
    </div>
    </div>
    </table>
</body>
</html>