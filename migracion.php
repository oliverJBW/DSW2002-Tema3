<?php 
@$link = new mysqli('db', 'root', 'test', 'world');
$error = $link->connect_errno;
if ($error != null) {
    echo "<p>El error número: $error</p>";
    echo "<p>El error dice: $link->connect_error </p>";
    die(); // Parar la ejecución de todo.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Migración</title>
</head>
<body>
    <h1>Migracion</h1>


    <?php 
    $sql = "SELECT * FROM country";
    $consulta1 = $link->query($sql);
    $arrayPaises = $consulta1->fetch_array();
    ?>

    <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
        <label for="">
            País origen:
            <select name="origen" id="">
                <option hidden disabled selected value="">Elige un País</option>
                <?php while ($arrayPaises != null){ ?>
                    <option value="">"<?php echo $arrayPaises[1] ?>"</option>
                <?php $arrayPaises = $consulta1->fetch_array(); ?>
                <?php } ?>
            </select>
        </label><br><br>
        <label for="">
            País destino:
            <select name="destino" id="">
                <option hidden disabled selected value="">Elige un País</option>
                <?php
                    $consulta1 = $link->query($sql);
                    $arrayPaises = $consulta1->fetch_array(); 
                ?>
                <?php while ($arrayPaises != null){ ?>
                    <option value="">"<?php echo $arrayPaises[1] ?>"</option>
                <?php $arrayPaises = $consulta1->fetch_array(); ?>
                <?php } ?>              
            </select>
        </label><br><br>
        <label for="">  
            Número de habitantes:
            <input type="number" name="habitantes" id="">
        </label>  
        <br><br>
        <input type="submit" value="Migrar">
    </form>
</body>
</html>