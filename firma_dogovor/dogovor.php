<?php
    try {
        $bd = new PDO("mysql:host=localhost;dbname=firmadogovor", 'root',''); 
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    echo "Помилка підключення: " . $e->getMessage();
    }
?>

<!doctype html>
<html lang="en">

<head>
    <title>Договори</title>
    <meta charset="cp1251">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> 
    <style>
        body {background-color: royalblue;}
        .container {
            width: 500px;
        }
    </style>
</head>

<body>
    <div class="container">
    <div style="text-align: center;"><h5>Договори фірми</h5></div>
    </div>
    <br>
    <table class="table" width=100%>

    <div class="container">
    <table class="table" style="background: #e0f7fa">
    <thead>
        <tr>
        <th>№</th>
        <th>Код</th>
        <th>Назва</th>
        <th>Сума</th>
        <th>Дата заключення</th>
        <th>Дата завершення</th>
        <th>Аванс</th>
        <th>Змінити</th>
        <th>Видалити</th>
        </tr>
    </thead>

    <tbody>
    <?php
    $id = intval($_GET['id']);
    $sql =  "SELECT * FROM dogovor INNER JOIN firm ON dogovor.id_firm = firm.id_firm
    WHERE dogovor.id_firm = $id";

    $id_n = 0;
        if($result = $bd -> query($sql))
        {
            while ($row = $result -> fetch())
            {
                $id_n++;
                echo "<tr><td>" . $id_n .
                "</td><td>" . $row [2] .
                "</td><td>" . $row [3] .
                "</td><td>" . $row [4] .
                "</td><td>" . $row [5] .
                "</td><td>" . $row [6] .
                "</td><td>" . $row [7] .
                "</td><td><a href='alter_dogovor.php?id=" . $row[0] . "'>Редагувати</a>
                </td><td><a href='delete_dogovor.php?id=" . $row[0]. "'>Видалити</a></td><br>";
            }
        }
    ?>
    </table>
    </tbody>

    <div class="center">
    <br><br>
    <?php echo
    "<a class='btn' style='background: #673ab7' href='create_dogovor.php?id=" . $id . "'>Новий договір</a>
    <a class='btn' style='background: #673ab7' href='dogovor_q3.php?id=" . $id . "'>Договори та сума за період</a>"
    ?>
    <br><br>
    <a class="btn" style="background: #00796b" href="firm.php">До фірм</a>
    <a class="btn" style="background: #00796b" href="mainpage.php">На головну</a>
    </div>
    </div>
</body>
</html>