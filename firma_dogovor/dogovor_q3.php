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
    <title>Договори та сума</title>
    <meta charset="cp1251">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> 
    <style>
    body {background-color: lemonchiffon;}
    h5 {background: tomato}
    .container {
        width: 500px;
    }
    </style>
</head>

<body>
    <div class="container">
    <div style="text-align: center;"><h4>Договори за період та їх сума</h4></div> 
    <form method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="field">
        <label>З<input type="date" name="data_start" required=""></label>
    </div>
    </div>
    <div class="row">
    <div class="field">
    <label>До<input type="date" name="data_finish" required=""></label>
    </div>
    </div>
    <div class = "center">
    <input type="submit" class="btn" style='background: #673ab7' name="but_search" value="Пошук">
    <br><br>
    <a class="btn" style='background: #00796b' href="firm.php">До фірм</a>
    <br><br>
    </div>
    </form>
    </div>
    <table class="table" width=100%>
    <div class="container">
    <table class="table" style="background: #ff8a80">
    <thead>
    <tr>
        <th>Код</th> 
        <th>Haзвa</th>
        <th>Сума</th>
        <th>Дата заключення</th> 
        <th>Дата завершення</th> 
        <th>Аванс</th>
    </tr>
    </thead>
    <tbody>
    <?php
        if (isset($_POST["but_search"]))
        {
            $id = intval($_GET['id']);
            $data_start = $_POST["data_start"];
            $data_finish = $_POST["data_finish"];
            $sql = "SELECT * FROM dogovor
            WHERE id_firm=$id AND ((datastart BETWEEN '$data_start' AND '$data_finish') OR 
            (datafinish BETWEEN '$data_start' AND '$data_finish') OR 
            (datastart< '$data_start' AND datafinish>'$data_finish'))"; 
            if($result = $bd ->query($sql))
            {
                while ($row = $result ->fetch())
                {
                    echo "<tr><td>" . $row[2] . "</td><td>" . $row[3] . 
                    "</td><td>" . $row[4] . "</td><td>" . $row[5] . 
                    "</td><td>" . $row[6] . "</td><td>" . $row[7] . "</td><br>";
                }
            } else echo "В таблиці немає даних!";
        }
        ?>
    </tbody>
    <?php
    if (isset($_POST["but_search"]))
    {
        $id = intval($_GET['id']);
        $data_start = $_POST["data_start"]; $data_finish = $_POST["data_finish"]; 
        $sql = "SELECT ifnull(sum(sumd), 0) FROM dogovor
        WHERE id_firm=$id AND ((datastart BETWEEN '$data_start' AND '$data_finish') OR 
        (datafinish BETWEEN '$data_start' AND '$data_finish') 
        OR (datastart<'$data_start' AND datafinish>'$data_finish'))"; 
        $sum = $bd->query($sql)->fetch();
        echo "<h5>Сума = ". $sum[0] . "</h5>";
    }
    ?>
</body>
</html>