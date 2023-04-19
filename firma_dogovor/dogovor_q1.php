<?php
    try {
    $bd = new PDO("mysql: host=localhost; dbname=firmadogovor", 'root','');
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    echo "Помилка підключення: " . $e->getMessage();
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=-device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> 
    <style>
    body {
        padding-top: 3rem;
    }
    .container {
        width: 400px;
    }
    </style>
</head>

<body>
    <div class="container">
    <h5>Договори в зазначений період</h5>
    <form method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="field">
    <label>З: <input type="date" name="data_s" required=""></label>
    </div>
    </div>
    <div class="row">
    <div class="field">
    <label>До: <input type="date" name="data_f" required=""></label>
    </div>
    </div>
    <input type="submit" class="btn" name="search" value="Пошук">
    <a class="btn" href="mainpage.php">До головної сторінки</a>
    </form>
    </div>
    <table class="table" width=100%>
    <div class="container">
    <table class="table table-bordered">
    <thead>
    <tr>
        <th>Numbered</th>
        <th>Named</th>
        <th>Sumd</th>
        <th>Data_start</th> 
        <th>Data_finish</th>
        <th>Avans</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if (isset($_POST["search"]))
    {
        $id = intval($_GET['id']);
        $data_start = $_POST["data_s"]; $data_finish = $_POST["data_f"]; 
        $sql = "SELECT * FROM dogovor 
        WHERE id_firm=$id AND (('data_s' BETWEEN '$data_start' AND '$data_finish') OR
        ('data_f' BETWEEN '$data_start' AND '$data_finish')
        OR ('data_s' < '$data_start' AND data_f > '$data_finish'))"; 
        if($result = $bd -> query($sql))
        {
            while ($row = $result -> fetch())
            {
                echo "<tr><td>" . $row[2] . "</td><td>" . $row[3] . 
                "</td><td>" . $row[4] . "</td><td>" . $row[5] . 
                "</td><td>" . $row[6] . "</td><td>" . $row[7] . "</td><br>";
            }
        }
        else echo "Таблиця пуста";
    }
    ?>
    </tbody> 
    </table>
</body>
</html>