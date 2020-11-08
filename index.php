<?php

use models\Tarea;

ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<?php

    require_once("models/TareaModel.php");
    session_start();
    $modelo = new Tarea();
    $tareas = $modelo->getAllTareas();
    //print_r($tareas);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cruds</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>

    <div class="container white">

        <a href="formulario.php">formularios</a>
        <br><br>  
        


        <div class="row">
            <div class="col l4 m6 s12">

            <?php if (!isset($_SESSION['editar'])) { ?>
               
                    <h3 class="center">Crear Tarea</h3>
                        

                    <form action="controllers/ControlInsert.php" method="POST">

                        <div class="input-field">
                            <input id="nombre" type="text" name="nombre">
                            <label for="nombre">Nombre de la tarea</label>
                        
                        </div>

                        <div class="input-field">
                            <input id="descripcion" type="text" name="descripcion">
                            <label for="descripcion">Descripcion</label>
                        </div>

                        <br><br>

                        <button class="btn">Guardar Tarea</button>

                    </form>

                    
                    <p>
                        <?php
                            if(isset($_SESSION['resp'])){
                                
                            
                                echo $_SESSION['resp'];

                                unset($_SESSION['resp']);

                            }

                        ?>

                    </p>


                <?php } else { ?>
                    <!-------EDITAR TAREA -------->
                    <h3 class="center">Editar Tarea</h3>
                    <form action="controllers/ControlEdit.php" method="POST">
                        <input type="hidden" name="id" value="<?= $_SESSION['tarea']['id'] ?>">
                        <div class="input-field">
                            <input id="nombre" type="text" name="nombre" value="<?= $_SESSION['tarea']['nombre'] ?>">
                            <label for="nombre">Nombre</label>
                        </div>

                        <div class="input-field">
                            <input id="descripcion" type="text" name="descripcion" value="<?= $_SESSION['tarea']['descripcion'] ?>">
                            <label for="descripcion">Descripción</label>
                        </div>
                        <br><br>
                        <button class="btn orange">Editar Tarea</button>
                    </form>
                    
                <?php
                    unset($_SESSION['editar']);
                    unset($_SESSION['tarea']);
                }

                

                ?>
                    
                
            </div>
            
            

            <div class="col l8 m6 s12">

                <h3 class="center">Lista de Tareas</h3>

                <form action="controllers/ControlTabla.php" method="POST">

                    <table class="margin32">

                        <tr>
                            <th>ID</th>
                            <th>TAREAS</th>
                            <th>DESCRIPCION</th>



                        </tr>

                        <?php      foreach($tareas as $tarea){      ?>

                            <tr>
                                <td><?= $tarea["id"]?></td>
                                <td><?= $tarea["nombre"]?></td>
                                <td><?= $tarea["descripcion"]?></td>
                                <td>
                                    <button name="bt_editar" value="<?= $tarea["id"] ?>" class="btn-floating orange">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button name="bt_eliminar" value="<?= $tarea["id"] ?>" class="btn-floating red">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>

                            </tr>

                        <?php  } ?>

                    </table>





                </form>

                    


                </div>


        </div>


        
    </div>


    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

