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
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Tema 3, bases de datos</title>
</head>
<body>
    <?php
        $limit = "";
        if (isset($GET['n'])){
            $limit = "LIMIT " . $_GET['n'];
        }
        $sql = "SELECT * FROM city" . $limit; 
        //echo $sql;
        $result = $link->query($sql);
        $row = $result->fetch_array();
        ?>
        <table>
    
            <th>ID</th>
            <th>Name</th>
            <th>CountryCode</th>
            <th>District</th>
            <th>Population</th>
        
        <?php
        while ($row != null){
    ?>
        <tr>
            <td><?=$row['ID']?></td>
            <td><?=$row['Name']?></td>
            <td><?=$row['CountryCode']?></td>
            <td><?=$row['District']?></td>
            <td><?=$row['Population']?></td>
        </tr>
    <?php 
        $row = $result->fetch_array();
    } 
    ?>
    </table>
    
</body>
</html>