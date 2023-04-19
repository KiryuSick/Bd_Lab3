<?php
    $bd = new mysqli('localhost', 'root', '', 'firmadogovor'); 
    if ($bd->connect_error) {
    die("Помилка підключення: " . $bd->connect_error);
    }
?>
<!doctype html>

<html lang="en">
<head>
<title>Фірми</title>
<meta charset="cp1251">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style>
    body {background-color: yellowgreen;}
    .container {
        width: 100%;
        background-color: darkolivegreen;
    }
    h3   {color: seashell;}
    
</style>
</head>

<body>
    <div class="container">
        <br>
    <div style="text-align: center;"><h3>Фірми</h3></div>
    <table class="table" style="background: #a5d6a7">
        <thead>
        <tr>    
        <th>№</th>
        <th>Назва</th>
        <th>Керівник/Шеф</th>
        <th>Адреса</th>
        <th>Договори</th>
        <th>Редагування</th>
        <th>Видалення</th>
        </tr>
        </thead>

<tbody>
<?php
$sql = "SELECT * FROM firm";
if($result = $bd -> query($sql))
{
    $id = 0;
    while ($row = $result -> fetch_row())
    {
        $id++;
        echo "<tr><td>" . $id .
        "</td><td>" . $row [1] .
        "</td><td>" . $row [2] .
        "</td><td>" . $row [3] .
        "</td><td><a href='dogovor.php?id=" . $row[0] . "'>Усі договори</a>
        </td><td><a href='alter_firm.php?id=" . $row [0] . "'>Редагувати</a>
        </td><td><a href='delete_firm.php?id=" . $row [0] . "'>Видалити</a>
        </td><br>";
    }
    $result -> free_result();
}
?>
</tbody>
</table>

<div class="center">
<br>
<a class="btn" style="background: #00796b" href="create_firm.php">Нова фірма</a> 
<a class="btn" style="background: #00796b" href="search_firm.php">Пошук</a> 
<a class="btn" style="background: #00796b" href="mainpage.php">На головну</a> 
<br>
</div>
</div>

</body>
</html>