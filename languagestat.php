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
    <title>Language stat</title>
</head>
<body>
    <?php 
    $sql = "SELECT DISTINCT language FROM `countrylanguage`";
    $consulta1 = $link->query($sql);
    $arrayPaises = $consulta1->fetch_array();
    ?>
    
</body>
</html>