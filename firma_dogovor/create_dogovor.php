<!doctype html>
<html lang="en"> 

<head>
    <title>Створити договір</title>
    <meta charset="cp1251">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
    body {background-color: whitesmoke;}
    .container {
        width: 500px;
    }
    </style>
</head>

<body>
    <div class="container">
    <form method="post" enctype="multipart/form-data">
    <?php 
    try {
    $bd = new PDO("mysql: host=localhost; dbname=firmadogovor", 'root',''); 
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
    $id = intval($_GET['id']);
    $sql = "SELECT name FROM firm
    WHERE id_firm = $id";
    $name = $bd->query($sql)->fetch();}
    catch (PDOException $e) {
    echo "Помилка. Не вдалося отримати назву фірми: " . $sql . "<br>" . $e->getMessage();
    }
    echo "<div style='text-align: center;'><h4>Новий договір фірми $name[0] </h4></div>"; 
    echo "<input type='hidden' name='id_firm' value=$id>"?>

    <div class="row">
    <div class="field">
    <label>Код<input type="text" name="numberd" required=""></label>
    </div>
    </div>
    <div class="row">
    <div class="field">
    <label>Назва<input type="text" name="named" required=""><br></label>
    </div>
    </div>
    <div class="row">
    <div class="field">
    <label>Сума<input type="text" name="sumd" required=""><br></label>
    </div>
    </div>
    <div class="row">
    <div class="field">
    <label>Дата заключення<input type="date" name="data_start" required=""><br></label>
    </div>
    </div>
    <div class="row">
    <div class="field">
    <label>Дата завершення<input type="date" name="data_finish" required=""><br></label>
    </div>
    </div>
    <div class="row">
    <div class="field">
    <label>Аванс<input type="text" name="avans" required=""><br></label>
    </div>
    </div>
    <div class="center">
    <input type="submit" class="btn" style="background: #673ab7" name="but_add" value="Додати"></div> 
    </form>

    <?php
    $id_firm = $numberd = $named = $sumd = $data_start = $data_finish = $avans = "";

    if (isset($_POST["but_add"]))
    {
        if(!empty($_POST["id_firm"]) && !empty($_POST["numberd"]) && !empty($_POST["named"]) && !empty($_POST["sumd"]) && 
        !empty($_POST["data_start"]) && !empty($_POST["data_finish"]) && !empty($_POST["avans"]))
        {
            $id_firm=$_POST["id_firm"]; $numberd=$_POST["numberd"];
            $named=$_POST["named"]; $sumd=floatval($_POST["sumd"]); 
            $data_start=$_POST["data_start"]; $data_finish=$_POST["data_finish"]; 
            $avans=floatval($_POST["avans"]);
            try {
                $bd = new PDO("mysql: host=localhost; dbname=firmadogovor", 'root','');
                $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $sql = "INSERT INTO dogovor (id_firm, numberd, named, sumd, datastart, datafinish, avans) VALUES ($id_firm, 
                '$numberd', '$named', $sumd, '$data_start', '$data_finish', $avans)"; $bd->exec($sql);
        } catch (PDOException $e) {
            echo "Помилка. Дані не записано: " . $sql . "<br>" . $e->getMessage();
        }
    }
    }
    ?>

    <div class="center">
    <br>
    <?php echo
    "<a class='btn' style='background: #00796b' href='dogovor.php?id=" . $id . "'>До договорів</a>"
    ?>
    <a class="btn" style="background: #00796b" href="firm.php">До фірм</a>
    </div>
    </div>
</body> 
</html>