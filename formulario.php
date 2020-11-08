<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="index.php">home</a>
    <h1>formulario</h1>



    <form action="controllers/Controlador.php" method="POST">
    
        <input type="text" name="nombre" placeholder="tumame">
        <br>
        <input type="text" name="edad" placeholder="tuedad">
        <br>
        <button>Saludar</button>


    
    </form>

    <div class="resp">

        <p>
            <?php
                session_start();
                if(isset($_SESSION['msg'])){
                    
                  
                    echo $_SESSION['msg'];

                    unset($_SESSION['msg']);

                }

            ?>

        </p>


    </div>


    
</body>
</html>