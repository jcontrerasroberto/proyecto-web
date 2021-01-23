<?php
session_start();

if (!isset($_SESSION['active']) || !$_SESSION['active']) {
    header("Location: ../vistas/sign_in.php?error=nosession");
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/registro_exitoso.css" />
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/crud.css">
    <link rel="stylesheet" href="../css/navbar.css" />
    <script type="text/javascript" src="../scripts/resultados_crud.js"></script>
    <title>Registro exitoso</title>
</head>

<body>
    <!-- Image and text -->
    <div class="identidad">
        <a class="navbar-brand logo-escom" href="#">
            <img src="https://www.escom.ipn.mx/images/logoESCOM2x.png" height="80" class="d-inline-block align-top" alt="" />
        </a>
        <a class="navbar-brand logo-ipn" href="#">
            <img src="https://i.pinimg.com/originals/45/b1/41/45b141e39ebc8f63a7b94fe66b14fd4f.jpg" height="80" class="d-inline-block align-top" alt="" />
        </a>
    </div>
    <br />

    <nav class="navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fas fa-bars" style="color: #fff; font-size: 28px"></i>
            </span>
        </button>

        <nav class="nav nav-fill collapse navbar-collapse" id="navbarSupportedContent">
            <a class="nav-item nav-link" href="registro.html">Registro</a>
            <a class="nav-item nav-link" href="recuperar.html">Recuperar archivo</a>
            <a class="nav-item nav-link" href="sign_in.php">Admin</a>
            <a class="nav-item nav-link" href="../backend/close_session.php">Cerrar sesion</a>
        </nav>
    </nav>

    <div class="container messages">

        <?php 
            $mensaje = $_GET['action']; 
            if(strcmp($mensaje, "successupdate")==0){
                echo '<div class="alert alert-success" role="alert"> Registro actualizado exitosamente </div>';
            }
            if(strcmp($mensaje, "successdelete")==0){
                echo '<div class="alert alert-success" role="alert"> Registro eliminado exitosamente </div>';
            }
            if(strcmp($mensaje, "nosuccessdelete")==0){
                echo '<div class="alert alert-danger" role="alert"> No se pudo eliminar el registro </div>';
            }
        ?>

        
    </div>

    <div class="container abrazador">
        <div class="container success">
            <h5>Datos registrados</h5>
            <br>
        </div>
        <div class="container searchSection">
            <form class="search-form row g-3" id="search-form">
                <div class="input-group mb-3">
                    <input type="search" class="searchText form-control" name="searchText" id="searchText" placeholder="Buscar" pattern="^P{2}\d{8}$|^P{1}E{1}\d{8}$|^\d{10}$" required>
                    <button type="submit" class="submit btn btn-outline-secondary"><i class="fas fa-search"></i> </button>
                </div>
                <div class="col-auto">

                </div>
            </form>
            <div class="error-msg" id="error-msg">
                <p>No se encontraron resultados.</p>
            </div>
        </div>
        <div class="container resultados">
            <div class="list-group" id="resultados-list">
            </div>
        </div>
    </div>
    

</body>

<?php
require_once('../backend/get_entries.php');

if ($resultado) {
    // Cycle through results
    while ($row = mysqli_fetch_array($resultado)) {
?>
        <script type="text/javascript">
            addEntry(<?php echo json_encode($row); ?>);
        </script>
<?php
    }
    // Free result set
    $resultado->close();
}

?>

</html>
