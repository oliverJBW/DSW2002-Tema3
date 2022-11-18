<?php include "top.php"; ?>
    <!--
    <div class="alert alert-success">¡Ejemplo mensaje de éxito!</div>
    <div class="alert alert-error">¡Ejemplo mensaje de error!</div>
    -->

    <?php
        $sql = "SELECT * FROM users ORDER BY name";
        $consulta = $link->query($sql);
        $filaConsulta = $consulta->fetch_array();
    ?>

    <section id="contacts">
        <h2>Contactos</h2>
        <nav>
            <fieldset>
                <legend>Acciones</legend>                    
                <a href="create.php">
                    <button>Crear contacto</button>
                </a>                    
            </fieldset>
        </nav>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php if ($filaConsulta == null){ ?>
                <tbody>
                    <tr>
                        <td class="symbol">N</td>
                        <td class="name">Nombre</td>
                        <td class="surname">Apellidos</td>
                        <td class="actions">                            
                            <a class="button" href="view.php?uid=">
                                <button>Ver</button>
                            </a>
                            <a class="button" href="edit.php?uid=">
                                <button>Editar</button>
                            </a>               
                        </td>
                    </tr>
                </tbody>
            <?php } else { ?>
                <tbody>
                    <?php while ($filaConsulta){ ?>
                        <tr>
                            <td class="symbol"></td>
                            <td class="name"><?php echo $filaConsulta["name"] ?></td>
                            <td class="surname"><?php echo $filaConsulta["surname"] ?></td>
                            <td class="actions">                            
                                <a class="button" href="view.php?uid=<?=$filaConsulta["id"] ?>">
                                    <button>Ver</button>
                                </a>
                                <a class="button" href="edit.php?uid=<?=$filaConsulta["id"] ?>">
                                    <button>Editar</button>
                                </a>               
                            </td>
                        </tr>
                    <?php 
                    $filaConsulta = $consulta->fetch_array();    
                    } 
                    ?>
                </tbody>
            <?php } ?>

        </table>
    </section>
<?php include "bottom.php"; ?>