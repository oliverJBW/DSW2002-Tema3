<?php 
@$link = new mysqli('db', 'root', 'test', 'ut3');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea final UT3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Agenda de contactos</h1>
        
    </header>