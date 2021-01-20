<?php
    session_start();

    if (isset($_SESSION['active']) && $_SESSION['active']) {
        header("Location: ../vistas/admin.php");
        die();
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml-transitional.dtd">
<html xmlns="http://www.w3,org/1999/xhtml" xml:lang="es" lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/registro_exitoso.css" />
        <link rel="stylesheet" href="../css/navbar.css" />
        <link rel="stylesheet" href="../css/styles.css" />
        <title>Administrador</title>
    </head>

    <body>
        <!-- Image and text -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand logo-escom" href="#">
                <img src="https://www.escom.ipn.mx/images/logoESCOM2x.png" height="100" class="d-inline-block align-top"
                    alt="" />
            </a>

            <nav class="nav nav-fill collapse navbar-collapse" id="navbarSupportedContent">
                <a class="nav-item nav-link" href="registro.html">Registro</a>
                <a class="nav-item nav-link" href="recuperar.html">Recuperar archivo</a>
                <a class="nav-item nav-link" href="sign_in.php">Admin</a>
            </nav>

            <a class="navbar-brand logo-ipn" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Logo_Instituto_Polit%C3%A9cnico_Nacional.png/1200px-Logo_Instituto_Polit%C3%A9cnico_Nacional.png"
                    height="150" class="d-inline-block align-top" alt="" />
            </a>
        </nav>

        <div class="container success">
            <h3>Ingreso al sistema administrador</h3>
            <form action="../backend/inicio_sesion.php" method="POST">
                <div class="form-group" id="group-user">
                    <label for="user">Usuario</label>
                    <div class="form-group-input">
                        <input type="text" name="user" id="user" class="form-control" required />
                        <i class="fas fa-times form-valid-edo"></i>
                    </div>
                </div>
                <div class="form-group" id="group-password">
                    <label for="password">Contraseña</label>
                    <div class="form-group-input">
                        <input type="password" name="password" id="password" class="form-control" />
                    </div>
                    <br />
                </div>
                <input type="submit" value="Entrar" class="btn btn-success" /><br><br>
                <p class="form-mens" id="form-mens">
                    <i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Datos de ingreso inv&aacute;lidos.
                </p>
                <p class="form-mens" id="form-mens-no">
                    <i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Debes iniciar sesion.
                </p>
            </form>
        </div>

    <?php
        if(!isset($_GET["error"])) exit;
        $error = $_GET["error"];
        if(isset($error) && strcmp($error, "wrongkeys")==0){
            
    ?>
        
        <script type = "text/javascript">
            document.getElementById("form-mens").className += " form-mens-active ";
        </script>

    <?php
        }
    ?>

    <?php
        if(isset($error) && strcmp($error, "nosession")==0){
            
    ?>
        
        <script type = "text/javascript">
            document.getElementById("form-mens-no").className += " form-mens-active ";
        </script>

    <?php
        }
    ?>

    </body>

</html>