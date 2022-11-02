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
    <title>Actualizar código pais</title>
</head>
<body>

    <?php 
    if (isset($_POST["botonModificar"]) 
        && isset($_POST["viejo"])
            && isset($_POST["nuevo"])){
        $codigoViejo = $_POST["viejo"];
        $codigoNuevo = $_POST["nuevo"];
        
        echo $codigoViejo;
        echo "<br>";
        echo $codigoNuevo;
        echo "<br>";

        $comprobar1 = "SELECT * FROM country WHERE Code='$codigoViejo'";
        $consulta1 = $link->query($comprobar1);
        $consulta11 = $consulta1 -> fetch_array();
        
        $comprobar2 = "SELECT * FROM country WHERE Code='$codigoNuevo'";
        $consulta2 = $link->query($comprobar2);
        $consulta22 = $consulta2 -> fetch_array();

        if (!($consulta11 == null) && ($consulta22 == null)){            

            //crear copia del país con el nuevo código.
            $link->query("INSERT INTO country VALUES '$codigoNuevo', 
            '$consulta11[1]', '$consulta11[2], '$consulta11[3]', '$consulta11[4],
            '$consulta11[5]', '$consulta11[6], '$consulta11[7]', '$consulta11[8],
            '$consulta11[9]', '$consulta11[10], '$consulta11[11]', '$consulta11[12],
            '$consulta11[13]', '$consulta11[14]");

            //modificar codigo pais de ciudades
            $link->query("UPDATE city SET CountryCode='$codigoNuevo' WHERE CountryCode='$codigoViejo'");

            //modificar codigo pais de lenguaje
            $link->query("UPDATE countrylanguage SET CountryCode='$codigoNuevo' WHERE CountryCode='$codigoViejo'");

            //eliminar pais original con código antiguo
            $link->query("DELETE FROM country WHERE Code='$codigoViejo'");

        } else {
            echo "No es posible realizar la modificación.";
        }        
    
    }
    ?>
    <hr>
    <form action="actualizarcodigo.php" method="post">
    <label for="">
        Código anterior:
        <input type="text" name="viejo">
        <br><br>
    </label>
    <label for="">
        Código nuevo:
        <input type="text" name="nuevo">
    </label>
    <input type="submit" name="botonModificar" value="Modificar">
    <hr>
    </form>
    

</body>
</html>