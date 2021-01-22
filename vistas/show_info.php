<?php
    session_start();

    if (!isset($_SESSION['active']) || !$_SESSION['active']) {
        header("Location: ../vistas/sign_in.php?error=nosession");
        die();
    }

?>
<?php
  $boleta = $_GET['key'];
  require_once('../backend/openconnectiondb.php');
  $resultadoUnic = mysqli_query($enlace, "SELECT * FROM alumno WHERE boleta='$boleta'");
  require_once('../backend/closeconnectiondb.php');
  $rowUnic = mysqli_fetch_array($resultadoUnic);
  //modificar los botones
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml-transitional.dtd">
<html xmlns="http://www.w3,org/1999/xhtml" xml:lang="es" lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="stylesheet" href="../css/navbar.css" />
  <title>Detalles de la informaci&oacute;n</title>
</head>

<body>
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
  <div class="container-fluid titular">
    <h3>Editar informaci&oacute;n</h3>
  </div>
  <div class="container formulario">
    <form class="formulario-entradas" id="form">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-sm-12 col-md-4 seccion">
          <fieldset>
            <legend>Identidad</legend>

            <div class="form-group" id="group-boleta">
              <label for="boleta">Número de boleta</label>
              <div class="form-group-input">
                <input type="text" name="boleta" id="boleta" class="form-control" value="<?php echo $rowUnic["boleta"]?>" required/>
                <i class="fas fa-times form-valid-edo"></i>
                <p class="form-input-err">
                  Debes ingresar 10 d&iacute;gitos o PE/PM seguido de 8
                  d&iacute;gitos.
                </p>
              </div>
              <p class="form-input-err">
                Debes ingresar 10 d&iacute;gitos o PE/PM seguido de 8
                d&iacute;gitos.
              </p>
            </div>

            <div class="form-group" id="group-nombre">
              <label for="nombre">Nombre</label>
              <div class="form-group-input">
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $rowUnic["nombre"]?>" required />
                <i class="fas fa-times form-valid-edo"></i>
              </div>
              <p class="form-input-err">
                Solo puedes ingresar letras y espacios.
              </p>
            </div>

            <div class="form-group" id="group-apellidop">
              <label for="apellidop">Apellido paterno</label>
              <div class="form-group-input">
                <input type="text" name="apellidop" id="apellidop" class="form-control" value="<?php echo $rowUnic["apellidop"]?>"/>
                <i class="fas fa-times form-valid-edo"></i>
              </div>
              <p class="form-input-err">
                Solo puedes ingresar letras y espacios.
              </p>
            </div>

            <div class="form-group" id="group-apellidom">
              <label for="apellidom">Apellido materno</label>
              <div class="form-group-input">
                <input type="text" name="apellidom" id="apellidom" class="form-control" value="<?php echo $rowUnic["apellidom"]?>"/>
                <i class="fas fa-times form-valid-edo"></i>
              </div>
              <p class="form-input-err">
                Solo puedes ingresar letras y espacios.
              </p>
            </div>

            <div class="form-group" id="group-daten">
              <label for="daten">Fecha de nacimiento</label>
              <div class="form-group-input">
                <input type="date" name="daten" id="daten" class="form-control" value="<?php echo $rowUnic["daten"]?>"/>
                <i class="fas fa-times form-valid-edo"></i>
              </div>
              <p class="form-input-err">Selecciona una fecha.</p>
            </div>

            <div class="form-group" id="group-sexo">
              <label for="sexo"> Sexo </label>
              <br />
              <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="femenino" value="femenino" <?php if($rowUnic["sexo"]=="1") echo "checked" ?>/>
                <label class="form-check-label" for="femenino">
                  Femenino
                </label>
              </div>
              <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" id="masculino" value="masculino" <?php if($rowUnic["sexo"]=="0") echo "checked" ?>/>
                <label class="form-check-label" for="masculino">
                  Masculino
                </label>
              </div>
            </div>

            <div class="form-group" id="group-curp">
              <label for="curp">CURP</label>
              <div class="form-group-input">
                <input type="text" name="curp" id="curp" class="form-control" value="<?php echo $rowUnic["curp"]?>"/>
                <i class="fas fa-times form-valid-edo"></i>
              </div>
              <p class="form-input-err">
                Formato inv&aacute;lido. Recuerda ingresarlo en
                may&uacute;sculas.
              </p>
            </div>
          </fieldset>
        </div>
        <div class="col-sm-12 col-md-4">
          <fieldset>
            <legend>Contacto</legend>

            <div class="form-group" id="group-calle">
              <label for="calle">Calle y n&uacute;mero </label>
              <div class="form-group-input">
                <input type="text" name="calle" id="calle" class="form-control" value="<?php echo $rowUnic["calle"]?>"/>
                <i class="fas fa-times form-valid-edo"></i>
              </div>
              <p class="form-input-err">Llena este campo.</p>
            </div>

            <div class="form-group" id="group-colonia">
              <label for="colonia">Colonia </label>
              <div class="form-group-input">
                <input type="text" name="colonia" id="colonia" class="form-control" value="<?php echo $rowUnic["colonia"]?>"/>
                <i class="fas fa-times form-valid-edo"></i>
              </div>
              <p class="form-input-err">Llena este campo.</p>
            </div>

            <div class="form-group" id="group-codpostal">
              <label for="codpostal">C&oacute;digo postal</label>
              <div class="form-group-input">
                <input type="text" name="codpostal" id="codpostal" class="form-control" value="<?php echo $rowUnic["codpostal"]?>"/>
                <i class="fas fa-times form-valid-edo"></i>
              </div>
              <p class="form-input-err">Debes ingresar 5 d&iacute;gitos.</p>
            </div>

            <div class="form-group" id="group-tel">
              <label for="tel">Tel&eacute;fono o celular</label>
              <div class="form-group-input">
                <input type="text" name="tel" id="tel" pattern="[0-9]{10}" class="form-control" value="<?php echo $rowUnic["tel"]?>"/>
                <i class="fas fa-times form-valid-edo"></i>
              </div>
              <p class="form-input-err">
                Debes ingresar m&aacute;ximo 10 d&iacute;gitos.
              </p>
            </div>

            <div class="form-group" id="group-correo">
              <label for="correo">Correo electr&oacute;nico</label>
              <div class="form-group-input">
                <input type="email" name="correo" placeholder="usuario@servidor.com" id="correo" class="form-control" value="<?php echo $rowUnic["correo"]?>"/>
                <i class="fas fa-times form-valid-edo"></i>
              </div>
              <p class="form-input-err">Correo inv&aacute;lido.</p>
            </div>
          </fieldset>
        </div>
        <div class="col-sm-12 col-md-4">
          <fieldset>
            <legend>Procedencia</legend>

            <div class="form-group">
              <label for="escuela"> Escuela de procedencia </label>
              <select name="escuela" class="form-control" id="selEscuela">
                <option value="null">Selecciona uno...</option>
                <option <?php if($rowUnic["escuela"]=="CECyT 1") echo "selected" ?> value="CECyT 1">
                  CECyT 1 "Gonzalo V&aacute;zquez Vela"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 2") echo "selected" ?> value="CECyT 2">
                  CECyT 2 "Miguel Bernard Perales"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 3") echo "selected" ?> value="CECyT 3">
                  CECyT 3 "Estanislao Ramirez Ru&iacute;z"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 4") echo "selected" ?> value="CECyT 4">
                  CECyT 4 "L&aacute;zaro C&aacute;rdenas"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 5") echo "selected" ?> value="CECyT 5">
                  CECyT 5 "Benito Ju&aacute;rez Garc&iacute;a"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 6") echo "selected" ?> value="CECyT 6">
                  CECyT 6 "Miguel Oth&oacute;n de Mendizabal"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 7") echo "selected" ?> value="CECyT 7">CECyT 7 "Cuauht&eacute;moc"</option>
                <option <?php if($rowUnic["escuela"]=="CECyT 8") echo "selected" ?> value="CECyT 8">
                  CECyT 8 "Narciso Bassols Garc&iacute;a"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 9") echo "selected" ?> value="CECyT 9">
                  CECyT 9 "Juan de Dios B&aacute;tiz Paredes"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 10") echo "selected" ?> value="CECyT 10">
                  CECyT 10 "Carlos Vallejo M&aacute;rquez"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 11") echo "selected" ?> value="CECyT 11">CECyT 11 "Wilfrido Massieu"</option>
                <option <?php if($rowUnic["escuela"]=="CECyT 12") echo "selected" ?> value="CECyT 12">
                  CECyT 12 "Jos&eacute; María Morelos"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 13") echo "selected" ?> value="CECyT 13">
                  CECyT 13 "Ricardo Flores Mag&oacute;n"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 14") echo "selected" ?> value="CECyT 14">
                  CECyT 14 "Luis Enrique Erro Soler"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 15") echo "selected" ?> value="CECyT 15">
                  CECyT 15 "Diódoro Ant&uacute;nez Echagaray"
                </option>
                <option <?php if($rowUnic["escuela"]=="CECyT 16") echo "selected" ?> value="CECyT 16">CECyT 16 "Unidad Hidalgo"</option>
                <option <?php if($rowUnic["escuela"]=="CECyT 17") echo "selected" ?> value="CECyT 17">CECyT 17 "Unidad Guanajuato"</option>
                <option <?php if($rowUnic["escuela"]=="CET 1") echo "selected" ?> value="CET 1">CET 1 "Walter Cross Buchanan"</option>
                <option <?php if($rowUnic["escuela"]=="otro") echo "selected" ?> value="otro">OTRO</option>
              </select>
            </div>

            <div class="form-group">
              <label for="entidad"> Entidad federativa de procedencia </label>
              <select name="entidad" class="form-control">
                <option value="null">Selecciona uno...</option>
                <option <?php if($rowUnic["entidad"]=="Aguascalientes") echo "selected" ?> value="Aguascalientes">Aguascalientes</option>
                <option <?php if($rowUnic["entidad"]=="Baja California") echo "selected" ?> value="Baja California">Baja California</option>
                <option <?php if($rowUnic["entidad"]=="Baja California Sur") echo "selected" ?> value="Baja California Sur">
                  Baja California Sur
                </option>
                <option <?php if($rowUnic["entidad"]=="Campeche") echo "selected" ?> value="Campeche">Campeche</option>
                <option <?php if($rowUnic["entidad"]=="Chiapas") echo "selected" ?> value="Chiapas">Chiapas</option>
                <option <?php if($rowUnic["entidad"]=="Chihuahua") echo "selected" ?> value="Chihuahua">Chihuahua</option>
                <option <?php if($rowUnic["entidad"]=="CDMX") echo "selected" ?> value="CDMX">Ciudad de M&eacute;xico</option>
                <option <?php if($rowUnic["entidad"]=="Coahuila") echo "selected" ?> value="Coahuila">Coahuila</option>
                <option <?php if($rowUnic["entidad"]=="Colima") echo "selected" ?> value="Colima">Colima</option>
                <option <?php if($rowUnic["entidad"]=="Durango") echo "selected" ?> value="Durango">Durango</option>
                <option <?php if($rowUnic["entidad"]=="Estado de M&eacute;xico") echo "selected" ?> value="Estado de M&eacute;xico">
                  Estado de M&eacute;xico
                </option>
                <option <?php if($rowUnic["entidad"]=="Guanajuato") echo "selected" ?> value="Guanajuato">Guanajuato</option>
                <option <?php if($rowUnic["entidad"]=="Guerrero") echo "selected" ?> value="Guerrero">Guerrero</option>
                <option <?php if($rowUnic["entidad"]=="Hidalgo") echo "selected" ?> value="Hidalgo">Hidalgo</option>
                <option <?php if($rowUnic["entidad"]=="Jalisco") echo "selected" ?> value="Jalisco">Jalisco</option>
                <option <?php if($rowUnic["entidad"]=="Michoacan") echo "selected" ?> value="Michoacan">Michoac&aacute;n</option>
                <option <?php if($rowUnic["entidad"]=="Morelos") echo "selected" ?> value="Morelos">Morelos</option>
                <option <?php if($rowUnic["entidad"]=="Nayarit") echo "selected" ?> value="Nayarit">Nayarit</option>
                <option <?php if($rowUnic["entidad"]=="Nuevo Leon") echo "selected" ?> value="Nuevo Leon">Nuevo Le&oacute;n</option>
                <option <?php if($rowUnic["entidad"]=="Oaxaca") echo "selected" ?> value="Oaxaca">Oaxaca</option>
                <option <?php if($rowUnic["entidad"]=="Puebla") echo "selected" ?> value="Puebla">Puebla</option>
                <option <?php if($rowUnic["entidad"]=="Queretaro") echo "selected" ?> value="Queretaro">Quer&eacute;taro</option>
                <option <?php if($rowUnic["entidad"]=="Quintana Roo") echo "selected" ?> value="Quintana Roo">Quintana Roo</option>
                <option <?php if($rowUnic["entidad"]=="San Luis Potos&iacute;") echo "selected" ?> value="San Luis Potos&iacute;">
                  San Luis Potosí
                </option>
                <option <?php if($rowUnic["entidad"]=="Sinaloa") echo "selected" ?> value="Sinaloa">Sinaloa</option>
                <option <?php if($rowUnic["entidad"]=="Sonora") echo "selected" ?> value="Sonora">Sonora</option>
                <option <?php if($rowUnic["entidad"]=="Tabasco") echo "selected" ?> value="Tabasco">Tabasco</option>
                <option <?php if($rowUnic["entidad"]=="Tamaulipas") echo "selected" ?> value="Tamaulipas">Tamaulipas</option>
                <option <?php if($rowUnic["entidad"]=="Tlaxcala") echo "selected" ?> value="Tlaxcala">Tlaxcala</option>
                <option <?php if($rowUnic["entidad"]=="Veracruz") echo "selected" ?> value="Veracruz">Veracruz</option>
                <option <?php if($rowUnic["entidad"]=="Yucatan") echo "selected" ?> value="Yucatan">Yucat&aacute;n</option>
                <option <?php if($rowUnic["entidad"]=="Zacatecas") echo "selected" ?> value="Zacatecas">Zacatecas</option>
              </select>
            </div>

            <div class="form-group nombreE <?php if($rowUnic["escuela"]=="otro") echo "nombreE-active" ?>" id="group-nombreE">
              <label for="nombreE">Nombre de la escuela </label>
              <div class="form-group-input">
                <input type="text" name="nombreE" id="nombreE" class="form-control" value="<?php echo $rowUnic["nombreE"]?>"/>
                <i class="fas fa-times form-valid-edo"></i>
              </div>
              <p class="form-input-err">Llena este campo.</p>
            </div>

            <div class="form-group" id="group-promedio">
              <label for="promedio">Promedio </label>
              <div class="form-group-input">
                <input type="number" step="0.01" min="0" max="10" name="promedio" id="promedio" class="form-control"
                value="<?php echo $rowUnic["promedio"]?>" required />
                <i class="fas fa-times form-valid-edo"></i>
              </div>
              <p class="form-input-err">
                Ingresa un n&uacute;mero entre 0 y 10.
              </p>
            </div>

            <div class="form-group">
              <label for="escom">ESCOM fue tu </label>
              <select name="escom" class="form-control">
                <option value="null">Selecciona uno...</option>
                <option value="primera" <?php if($rowUnic["escom"]=="1") echo "selected" ?>>1ra opci&oacute;n</option>
                <option value="segunda" <?php if($rowUnic["escom"]=="2") echo "selected" ?>>2da opci&oacute;n</option>
                <option value="tercera" <?php if($rowUnic["escom"]=="3") echo "selected" ?>>3ra opci&oacute;n</option>
                <option value="cuarta" <?php if($rowUnic["escom"]=="4") echo "selected" ?>>4ta opci&oacute;n</option>
              </select>
            </div>
          </fieldset>
        </div>
      </div>

      <div class="botones row d-flex justify-content-center text-center">
        <p class="form-mens" id="form-mens">
          <i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor
          rellena todos los campos del formulario correctamente.
        </p>
        <input type="submit" value="Enviar datos" class="btn btn-primary" />
        <input type="button" onclick="deleteUser('<?php echo $rowUnic['boleta']; ?>')" value="Eliminar registro" class="btn btn-warning" />
      </div>
    </form>
  </div>

  <div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Confirma tus datos</h4>
            <button type="button" class="close btn btn-danger" data-dismiss="modal">
              &times;
            </button>
          </div>
          <div class="modal-body">
            <p class="form-mens error-bd" id="errorbd">
              <i class="fas fa-exclamation-triangle"></i> <b>Error:</b> No se
              pudo actualziar la informacion
            </p>
            <p><strong>Boleta:</strong> <span id="mostrar_boleta"></span></p>
            <p><strong>Nombre:</strong> <span id="mostrar_nombre"></span></p>
            <p>
              <strong>Apellido paterno:</strong>
              <span id="mostrar_apellidop"></span>
            </p>
            <p>
              <strong>Apellido materno:</strong>
              <span id="mostrar_apellidom"></span>
            </p>
            <p>
              <strong>Fecha de nacimiento:</strong>
              <span id="mostrar_daten"></span>
            </p>
            <p><strong>Sexo:</strong> <span id="mostrar_sexo"></span></p>
            <p><strong>CURP:</strong> <span id="mostrar_curp"></span></p>
            <p><strong>Calle:</strong> <span id="mostrar_calle"></span></p>
            <p>
              <strong>Colonia:</strong> <span id="mostrar_colonia"></span>
            </p>
            <p><strong>CP:</strong> <span id="mostrar_codpostal"></span></p>
            <p>
              <strong>Número de telefono:</strong>
              <span id="mostrar_tel"></span>
            </p>
            <p><strong>Correo:</strong> <span id="mostrar_correo"></span></p>
            <p>
              <strong>Escuela:</strong> <span id="mostrar_escuela"></span>
            </p>
            <p>
              <strong>Entidad:</strong> <span id="mostrar_entidad"></span>
            </p>
            <p id="label_nombreE" style="display: none">
              <strong>Nombre de la escuela:</strong>
              <span id="mostrar_nombreE"></span>
            </p>
            <p>
              <strong>Promedio:</strong> <span id="mostrar_promedio"></span>
            </p>
            <p>
              <strong>ESCOM fue tu opcion:</strong>
              <span id="mostrar_escom"></span>
            </p>
            <input type="button" value="Enviar datos" class="btn btn-primary" onclick="guardarDatos('<?php echo $rowUnic['boleta']; ?>')" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
              Modificar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
    integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
    integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
    crossorigin="anonymous"></script>
  <script src="../scripts/admin_crud.js"></script>
  <script src="../scripts/editar_info.js"></script>
</body>



</html>
