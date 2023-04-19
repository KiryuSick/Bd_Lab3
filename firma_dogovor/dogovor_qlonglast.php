<?php
    $bd = new mysqli('localhost', 'root','', 'firmadogovor'); if ($bd->connect_error) {
    die("Помилка підключення: " . $bd->connect_error);
    }
?>

<!doctype html>
<html lang="en">

<head>
    <title>Довгострокові</title>
    <meta charset="cp1251">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {background-color: skyblue;}
    .container {
        width: 500px;
    }
    </style>
</head>

<body>
    <div class="container">
    <div style="text-align: center;"> <h4>Довгострокові договори</h4></div> </div>
    <table class="table" width=100%>
    <div class="container">
    <table class="table" style="background: #80deea">

    <thead>
    <tr>
        <th>Фірма</th>
        <th>Код</th>
        <th>Назва</th>
        <th>Сума</th>
        <th>Дата заключення</th> 
        <th>Дата завершення</th>
        <th>Аванс</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT firm.name, dogovor.numberd, dogovor.named, dogovor.sumd, dogovor.datastart, dogovor.datafinish, dogovor.avans FROM dogovor 
    INNER JOIN firm ON dogovor.id_firm=firm.id_firm
    WHERE (dogovor.datafinish-dogovor.datastart)>=365";
    if($result = $bd ->query($sql))
    {
        while ($row = $result ->fetch_row())
        {
            echo "<tr><td>" . $row[0] .
            "</td><td>" . $row[1] .
            "</td><td>" . $row[2] .
            "</td><td>" . $row[3] .
            "</td><td>" . $row[4] .
            "</td><td>" . $row[5] .
            "</td><td>" . $row[6] . "</td><br>";
        }
        $result -> free_result();
    }
    ?>
    </tbody>
    </table>


    <div class="center">
    <br>
    <a class="btn" style="background: #00796b" href="mainpage.php">На головну</a>
    </div>
    </div>
</body>
</html>
