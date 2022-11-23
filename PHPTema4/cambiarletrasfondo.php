<?php
    $color = (isset($_POST['textocolor'])) ? $_POST['textocolor'] : "blue";
    $fondo = (isset($_POST['fondocolor'])) ? $_POST['fondocolor'] : "green";
    $tamaño = (isset($_POST['textotamaño'])) ? $_POST['textotamaño'] : "20";
    setcookie("color", $color, time() + 120);
    setcookie("fondo", $fondo, time() + 120);
    setcookie("tamaño", $tamaño, time() + 120);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar letras y fondo</title>
    
    <style>
        p {
            color: <?php echo $_COOKIE['color'] ?>;
            background-color: <?php echo $_COOKIE['fondo'] ?>;
            font-size: <?php echo $_COOKIE['tamaño'] ?>px;
        }
    </style>

</head>
<body>
    <h1>INICIO</h1>
    <p >Hola, esto es una prueba de texto para modificar</p>

    <form action="cambiarletrasfondo.php" method="post">
        <label for="">Color Texto
            <input type="color" name="textocolor" id="">
        </label><br><br>
        <label for="">Color Fondo
            <input type="color" name="fondocolor" id="">
        </label><br><br>
        <label for="">Tamaño texto
            <input type="range" name="textotamaño" id="" min="8" max="32" step="1">
        </label><br><br>
        <input type="submit" value="Send">
    </form>

</body>
</html>