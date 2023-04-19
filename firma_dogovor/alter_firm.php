<?php
$bd = new mysqli('localhost', 'root', '', 'firmadogovor'); 
if ($bd->connect_error) {
die("Помилка підключення: " . $bd->connect_error);
}
?>

<!doctype html>
<html lang="en"> 

<head>
    <title>Редагування фірми</title>
    <meta charset="cp1251">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {background-color: peachpuff;}
        .container {
            width: 500px;
        }
    </style>
</head>

<body>
    <div class="container">
    <div style="text-align: center;"> <h4>Редагування фірми</h4></div>
    <form method="post" enctype="multipart/form-data">
    <?php
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM firm
    WHERE id_firm = $id";
    $row = $bd -> query($sql) -> fetch_row();

    echo "
        <input type='hidden' name='id_firm' value=" . $row[0] . ">
        <div class='row'>
        <div class='field'>
        <label>Назва<input type='text' name='name' value=" . $row[1] . "></label>
        </div>
        </div>
        <div class='row'>
        <div class='field'>
        <label>Керівник<input type='text' name='shef' value=" . $row [2] . "><br></label>
        </div>
        </div>
        <div class='row'>
        <div class='field'>
        <label>Адреса<input type='text' name='address' value=" . $row[3] . "><br></label>
        </div>
        </div>
        <div class='center'>
    <input type='submit' class='btn' style='background: #673ab7' name='button_edit' value='Редагувати'> </div>"

    ?>
    </form>

    <?php 
    $name = $shef = $address = "";
    if (isset($_POST["button_edit"]))
    {
        if (!empty($_POST["name"]) && !empty($_POST["shef"]) && !empty($_POST["address"]))
        {
            $id1=$_POST["id_firm"]; 
            $name=$_POST["name"]; 
            $shef=$_POST["shef"];
            $address=$_POST["address"];

            $sql = "UPDATE firm SET name='$name', shef='$shef', address='$address' WHERE id_firm = $id1";

            if ($bd->query($sql) == TRUE)
            {
            } else
            {
            echo "Помилка запису даних: " . $sql . "<br>" . $bd->error;
            }

        }

    }
    ?>
    </div>

    <div class="center">
        <br>
        <a class="btn" style="background: #00796b" href="firm.php">До фірм</a> 
        <a class="btn" style="background: #00796b" href="mainpage.php">Ha головну</a>
    </div>
</body>
</html>
