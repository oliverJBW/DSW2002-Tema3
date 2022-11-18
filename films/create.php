<?php include "top.php"; ?>
<section id="create">
    <h2>Nueva categoría</h2>
    <nav>
        <p><a href="film.php">Volver</a></p>
    </nav>
    
    <?php 
        if (!isset($_POST["name"])){
    ?>

    <form action="" autocomplete="off" method="post">
        <fieldset>
            <legend>Datos de la categoría</legend>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" required>
            <p></p>
            <input type="reset" value="Limpiar">            
            <input type="submit" value="Crear" name="crear">
        </fieldset>
    </form>
    
    <?php
        } else {
        
        $nombreNuevo = $_POST['name'];

        $sqlcrear = "INSERT INTO category (category_id, name, last_update) 
        VALUES (NULL, '$nombreNuevo', CURRENT_TIMESTAMP)";
        $link->query($sqlcrear);

    ?>
        <div class="alert alert-success">Usuario creado satisfactoriamente</div>
    <?php
        }
    ?>

</section>
<?php include "bottom.php"; ?>