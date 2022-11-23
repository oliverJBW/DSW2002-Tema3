<?php include "top.php"; ?>
    <!--
    <div class="alert alert-success">¡Ejemplo mensaje de éxito!</div>
    <div class="alert alert-error">¡Ejemplo mensaje de error!</div>
    -->

    <?php
        $sql = "SELECT * FROM category";
        $consulta1 = $link->query($sql);
        $arrayCategorias = $consulta1->fetch_array();
    ?>

    <section id="films">
        <h2>Peliculas</h2>
        <form action="film.php" method="get">
          <fieldset>
            <legend>Categorías</legend>
            <select name="category" id="">
              <option selected disabled>Elige una categoría</option>
              <?php while ($arrayCategorias != null) { ?>
            <option value="<?php echo $arrayCategorias["category_id"] ?>"><?php echo $arrayCategorias["name"] ?></option>
            <?php $arrayCategorias = $consulta1->fetch_array();?>
        <?php } ?>             
            </select>
            <input type="submit" name="search" value="buscar">
            <input type="submit" name="delete" value="eliminar">
          </fieldset>
        </form>
        <nav>
            <fieldset>
                <legend>Acciones</legend>                    
                <a href="create.php">
                    <button>Crear Categoria</button>
                </a>                    
            </fieldset>
        </nav>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Año</th>
                    <th>Duración</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $buscar = isset($_GET["search"]) ? true : false;
                if ($buscar){
                
                $idSeleccionada = isset($_GET["category"]) ? $_GET["category"] : null;

                $sql2 = "SELECT film.film_id, film.title, film.release_year, 
                film.length FROM film, film_category WHERE film.film_id = 
                film_category.film_id AND film_category.category_id = '$idSeleccionada'";

                $consulta2 = $link->query($sql2);
                $listadoPeliculas = $consulta2->fetch_array();
                if ($listadoPeliculas == null){ ?>
                    <tr>
                        <td rowspan="4" class="center" ><b>No hay películas para esta categoría.</b></td>
                    </tr>
                <?php } else {
                    while ($listadoPeliculas != null) {
                ?>
                    <tr>
                        <td><?php echo $listadoPeliculas["title"]?></td>
                        <td class="center"><?php echo $listadoPeliculas["release_year"]?></td>
                        <td class="center"><?php echo $listadoPeliculas["length"]?></td>
                        <td class="actions">                            
                            <a class="button" href="category_film.php?idpelicula=<?php echo $listadoPeliculas["film_id"]?>">
                                <button>Cambiar categorías</button>
                            </a>               
                        </td>
                    </tr>
                <?php 
                    $listadoPeliculas = $consulta2->fetch_array();
                    }
                    } 
                }

                $eliminar = isset($_GET["delete"]) ? true : false;
                $idCategoria = isset($_GET["category"]) ? $_GET["category"] : false;
                if ($eliminar && $idCategoria){
                    $sql4 = "SELECT * FROM `film_category` WHERE category_id='$idCategoria'";
                    $consulta4 = $link->query($sql4);
                    $arrayCategorias2 = $consulta4->fetch_array();
                    $posible = false;

                    if($arrayCategorias2==null){
                        $posible = true;
                    }
                    
                    if ($posible){
                    $sqleliminar = "DELETE FROM `category` WHERE category_id='$idCategoria'";
                    $link->query($sqleliminar);    
                    ?>
                    <div class="alert alert-success">Categoria eliminada satisfactoriamente"</div>
                     <?php   
                    }
                    else {
                    ?>
                    <div class="alert alert-error">No es posible eliminar de esta categoría porque tiene peliculas asignadas.</div>
                    <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </section>
<?php include "bottom.php"; ?>