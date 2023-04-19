<!doctype html>
<html lang="en">

<head>
    <title>Створення фірми</title>
    <meta charset="cp1251">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <div style="text-align: center;"><h4>Створення нової фірми<h4></div>

    <form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="field">
        <label>Назва<input type="text" name="name" required=""></label>
        </div>
    </div>
    <div class="row">
        <div class="field">
        <label>Керівник<input type="text" name="shef" required=""><br></label>
        </div>
    </div>
    <div class="row">
        <div class="field">
        <label>Адреса<input type="text" name="address" required=""><br></label>
        </div>
    </div>
    <div class="center">
        <input type="submit" class="btn" style="background: #673ab7" name="but_add" value="Додати">
    </div>
    </form>

    <?php 
    $name = $shef = $address = "";
    if (isset($_POST["but_add"]))
    {
        if(!empty($_POST["name"]) && !empty($_POST["shef"]) && !empty($_POST["address"]))
        {
            $name=$_POST["name"]; 
            $shef=$_POST["shef"];
            $address=$_POST["address"];

            $bd = new mysqli('localhost', 'root','', 'firmadogovor');

            $sql = "INSERT INTO firm (name, shef, address) VALUES ('$name', '$shef', '$address')";

            if ($bd->query($sql) == TRUE){
            }  else {
            echo "Помилка запису даних: " . $sql . "<br>" . $bd->error;
            }
        }
    }
    ?>

    <div class="center">
    <br> 
    <a class="btn" style="background: #00796b" href="firm.php">До фірм</a> 
    <a class="btn" style="background: #00796b" href="mainpage.php">Ha головну</a>
    </div>
    </div>
</body>
</html>