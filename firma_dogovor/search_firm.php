<?php
    $bd = new mysqli('localhost', 'root', '', 'firmadogovor'); 
    if ($bd->connect_error) {
        die("Помилка підключення: " . $bd->connect_error);
    }
?>
<!doctype html>
<html lang="en"> 

<head>
    <title>Пошук фірм</title>
    <meta charset="cp1251">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> 
    <style>
        body {background-color: thistle;}
        .container {
            width: 500px;
        }
    </style>
</head>

<body>
    <div class="container">
    <div style="text-align: center;"><h4>Пошук фірм за назвою</h4></div>
    <form method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="field">
        <br>
        <label>Почніть вводити назву<input type="text" name="name_search" required=""></label>
    </div>
    </div>
    <div class="center">
    <input type="submit" class="btn" style="background: #673ab7" name="search" value="Знайти"> 
    <br><br>
    </div>
    </form>
    </div>

    <table class="table" width=100%> 
    <div class="container">
    <table class="table" style="background: #ce93d8">
    <thead>
    <tr>
    <th>№</th>
    <th>Назва</th> 
    <th>Керівник</th>
    <th>Адреса</th> 
    <th>Договори</th>
    </tr>
</thead>

<tbody>
<?php
if (isset($_POST["search"]))
{
$name = $_POST["name_search"];
$sql = "SELECT * FROM firm
WHERE LEFT(firm.name, LENGTH('$name')) ='$name'";
if ($result = $bd ->query($sql))
{
$id =0; 
while($row = $result -> fetch_row())
{
    $id++;
    echo "<tr><td>" . $id .
    "</td><td>" . $row [1] .
    "</td><td>" . $row [2] .
    "</td><td>" . $row [3] .
    "</td><td><a href='dogovor.php?id=" . $row[0] . "'>Усi договори</a> 
    </td><br>";
}
$result -> free_result();
}
}
?>
</tbody> 
</table>
<div class="center">
    <br>
        <a class="btn" style="background: #00796b" href="firm.php">До фірм</a>
        <a class="btn" style="background: #00796b" href="mainpage.php">На головну</a> 
    </div>
</body>
</html>