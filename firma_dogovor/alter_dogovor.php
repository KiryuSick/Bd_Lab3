<!doctype html>
<html lang="en"> 
    
<head>
    <title>Редагування договору</title>
    <meta charset="cp1251">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> 
    <style>
        body {background-color: wheat;}
        .container {
            width: 500px;
        }
    </style>
</head>

<body>
    <div class="container">
    <div style="text-align: center;"><h4>Редагування договору</h4></div> 
    <form method="post" enctype="multipart/form-data">
    <?php
    try {
    $bd = new PDO("mysql: host=localhost; dbname=firmadogovor", 'root',''); 
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM dogovor
    WHERE id_d = $id";
    $row = $bd->query($sql)->fetch();
    } catch (PDOException $e) {
    echo "Помилка. Не отримано назву фірми: " . $sql . "<br>" . $e->getMessage();
    }

    echo "
    <input type='hidden' name='id_d' value=" . $row[0] . ">
    <input type='hidden' name='id_firm' value=" . $row[1] . ">
    <div class='row'>
    <div class='field'>
    <label>Код<input type='text' name='numberd' value=" . $row[2] . "></label>
    </div>
    </div>
    <div class='row'>
    <div class='field'>
    <label>Назва<input type='text' name='named' value=" . $row[3]. "><br></label>
    </div>
    </div>
    <div class='row'>
    <div class='field'>
    <label>Сума<input type='text' name='sumd' value=" . $row[4] . "><br></label>
    </div>
    </div>
    <div class='row'>
    <div class='field'>
    <label>Дата заключення<input type='date' name='data_start' value=" . $row[5] . "><br></label>
    </div>
    </div>
    <div class='row'>
    <div class='field'>
    <label>Дата завершення<input type='date' name='data_finish' value=" . $row[6] . "><br></label>
    </div>
    </div>
    <div class='row'>
    <div class='field'>
    <label>Аванс<input type='text' name='avans' value=" . $row[7]. "><br></label>
    </div>
    </div>
    <div class='center'>
    <input type='submit' class='btn' style='background: #673ab7' name='but_edit' value='Редагувати'>
    <br><br>
    <a class='btn' style='background: #00796b' href='dogovor.php?id=" . $row[1] . "'>До договорів</a> 
    </div>"
    ?>
    </form>

    <?php
    $id_firm = $numberd = $named = $sumd = $data_start = $data_finish = $avans = "";
    if (isset($_POST["but_edit"]))
    {
    if(!empty($_POST["id_firm"]) && !empty($_POST["numberd"]) && !empty($_POST["named"]) && 
    !empty($_POST["sumd"]) && !empty($_POST["data_start"]) && !empty($_POST["data_finish"]) && !empty($_POST["avans"]))
    {
        //$id = $_POST["id_d"]; 
        $id_firm=$_POST["id_firm"]; $numberd=$_POST["numberd"];
        $named=$_POST["named"]; $sumd=floatval($_POST["sumd"]); 
        $data_start=$_POST["data_start"]; $data_finish=$_POST["data_finish"];
        $avans=floatval($_POST["avans"]);
        
        try {
            $bd = new PDO("mysql: host=localhost; dbname=firmadogovor", 'root','');
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE dogovor SET id_firm=$id_firm, numberd='$numberd', named='$named', sumd=$sumd, 
            datastart='$data_start', datafinish='$data_finish', avans=$avans WHERE id_d = $id";
            $bd->exec($sql);
            } catch (PDOException $e) {
            echo "Помилка запису даних: " . $sql . "<br>" . $e->getMessage();
            }
        }
    }
    ?>
    </div>
</body>
</html>


