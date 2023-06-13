<?php

require_once("conect_class.php");

session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/perfil.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Profil</title>
  <?php $currentPage = 'tienda'; ?>
</head>

<body>
  <?php include("../navegador/navTienda.php"); ?>

  <div class="tu_cuenta">
    <?php

    require_once("conect_class.php");
    if (isset($_SESSION['usuario'])) {
      $MyBBDD->consulta("SELECT * FROM usuarios WHERE id_usuario = '" . $_SESSION['usuario'] . "'");
      while ($fila = $MyBBDD->extraer_registro()) {

        echo '<form action="#" method="post">
                <table>
                  <tr> 
                    <td colspan="4"><h1 class="tucuenta">Votre compte</h1></td>
                  </tr>
                  <tr> 
                  <td colspan="2"><label> Courriel  </label><br><input type="text" id="emailPerfil" name="emailPerfil" value="' . $fila['correo'] . '" disabled><button type="submit" id="btn_edit_email"><img src="../img/Perfil/store_perfil_de_usuario_editar.svg" width="15px" alt="modificiar"></button><br>
                  <td colspan="2"><label> Mot de passe  </label><br><input type="password" id="contrasenaPerfil" name="contrasenaPerfil" value="' . $fila['contrasena'] . ' " disabled><button type="submit" id="btn_edit_contra"><img src="../img/Perfil/store_perfil_de_usuario_editar.svg" width="15px" alt="modificiar"></button><br>
                  </tr>
                  <tr> 
                  <td colspan="2"><h1>Informations personnelles</h1>
                  <td colspan="2"><h1>Adresse de facturation</h1>
                  </tr>           
                  <tr>
                  <td colspan="2"><label> Nom  </label><br><input type="text" id="nombrePerfil" name="nombrePerfil" value="' . $fila['nombre'] . ' " > <br>
                  <td colspan="2"><input type="text" id="direccionPerfil" name="direccionPerfil" placeholder="Adresse" value="' . $fila['direccion'] . ' " > <br>
                  </tr>
                  <tr>
                  <td colspan="2"><label> Nom de famille  </label><br><input type="text" id="apellidosPerfil" name="apellidosPerfil" value="' . $fila['apellidos'] . ' " > <br>
                  <td colspan="1"><input type="text" id="numeroCallePerfil" name="numeroCallePerfil" placeholder="Numéro de rue" value="' . $fila['numero_calle'] . ' " > <br>
                  <td colspan="1"><label id="margen"> Plancher, porte, etc.. </label><br><input type="text" id="pisoPerfil" name="pisoPerfil" value="' . $fila['piso'] . ' " > <br>
                  </tr>
                  <tr>
                  <td><label> Préfixe </label> <br><select name="prefijoPerfil" id="prefijoPerfil">
                                                <option value="' . $fila['prefijo'] . '">' . $fila['prefijo'] . '</option>
                                                <option value="+34">+34</option>
                                                <option value="+351">+351</option>
                                                <option value="+33">+33</option>
                                                <option value="+39">+39</option>
                                                <option value="+49">+49</option>
                                                <option value="+44">+44</option>
                                                <option value="+58">+58</option>
                                                <option value="+57">+57</option>
                                             </select> <br>
                            <td><label id="margen"> N° de téléphone </label><br><input type="number" id="telefonoPerfil" name="telefonoPerfil" value="' . $fila['telefono'] . '" > <br>
                            <td><label> Code postal </label><br><input type="text" id="codigoPostalPerfil" name="codigoPostalPerfil" value="' . $fila['codigo_postal'] . ' " > <br>
                            <td><label id="margen"> Province </label><br> <select name="provinciaPerfil" id="provinciaPerfil">
                                                <option value="' . $fila['provincia'] . '">' . $fila['provincia'] . ' </option>
                                                <option value="Alava">Alava</option>
                                                <option value="Albacete">Albacete</option>
                                                <option value="Alicante">Alicante</option>
                                                <option value="Almeria">Almeria</option>
                                                <option value="Asturias">Asturias</option>
                                                <option value="Avila">Avila</option>
                                                <option value="Badajoz">Badajoz</option>
                                                <option value="Barcelona">Barcelona</option>
                                                <option value="Burgos">Burgos</option>
                                                <option value="Caceres">Caceres</option>
                                                <option value="Cadiz">Cadiz</option>
                                                <option value="Cantabria">Cantabria</option>
                                                <option value="Castellon">Castellon</option>
                                                <option value="Ciudad Real">Ciudad Real</option>
                                                <option value="Cordoba">Cordoba</option>
                                                <option value="Cuenca">Cuenca</option>
                                                <option value="Girona">Girona</option>
                                                <option value="Granada">Granada</option>
                                                <option value="Guadalajara">Guadalajara</option>
                                                <option value="Gipuzkoa">Gipuzkoa</option>
                                                <option value="Huelva">Huelva</option>
                                                <option value="Huesca">Huesca</option>
                                                <option value="Islas Baleares">Islas Baleares</option>
                                                <option value="Jaen">Jaen</option>
                                                <option value="La Coruña">La Coruña</option>
                                                <option value="La Rioja">La Rioja</option>
                                                <option value="Las Palmas">Las Palmas</option>
                                                <option value="Leon">Leon</option>
                                                <option value="Lleida">Lleida</option>
                                                <option value="Lugo">Lugo</option>
                                                <option value="Madrid">Madrid</option>
                                                <option value="Malaga">Malaga</option>
                                                <option value="Murcia">Murcia</option>
                                                <option value="Navarra">Navarra</option>
                                                <option value="Ourense">Ourense</option>
                                                <option value="Palencia">Palencia</option>
                                                <option value="Pontevedra">Pontevedra</option>
                                                <option value="Salamanca">Salamanca</option>
                                                <option value="Santa Cruz de Tenerife">Santa Cruz de Tenerife</option>
                                                <option value="Segovia">Segovia</option>
                                                <option value="Sevilla">Sevilla</option>
                                                <option value="Soria">Soria</option>
                                                <option value="Tarragona">Tarragona</option>
                                                <option value="Teruel">Teruel</option>
                                                <option value="Toledo">Toledo</option>
                                                <option value="Valencia">Valencia</option>
                                                <option value="Valladolid">Valladolid</option>
                                                <option value="Vizcaya">Vizcaya</option>
                                                <option value="Zamora">Zamora</option>
                                                <option value="Zaragoza">Zaragoza</option>
                                             </select> 
                  </tr>
                  <tr>
                    <td colspan="2">
                      <input type="submit" id="guardar" name="guardar" value="Économiser" style="display: none;">
                      <input type="submit" id="guardar1" name="guardar1" value="Économiser" style="display: none;">
                      <input type="submit" id="guardar2" name="guardar2" value="Économiser" style="display: none;">
                      <input type="submit" id="guardar3" name="guardar3" value="Économiser" style="display: none;">
                    </td>
                  </tr>
                </table>
              </form>';

        echo '<form action="#" method="post" class="fcambio">
                    <input type="hidden" name="id_usuario" value="' . $fila['id_usuario'] . '">
              </form> <br>';
      }

      if (isset($_POST['guardar1'])) {

        try {
          // Obtener los valores de los campos del formulario

          $MyBBDD->consulta("UPDATE usuarios SET correo = '" . $_POST["emailPerfil"] . "',nombre = '" . $_POST["nombrePerfil"] . "',direccion = '" . $_POST["direccionPerfil"] . "',apellidos = '" . $_POST["apellidosPerfil"] . "',numero_calle = '" . $_POST["numeroCallePerfil"] . "',piso = '" . $_POST["pisoPerfil"] . "',prefijo = '" . $_POST["prefijoPerfil"] . "',telefono = '" . $_POST["telefonoPerfil"] . "',codigo_postal = '" . $_POST["codigoPostalPerfil"] . "',provincia = '" . $_POST["provinciaPerfil"] . "' WHERE id_usuario = '" . $_SESSION['usuario'] . "'");

          $MyBBDD->consulta("SELECT * FROM usuarios WHERE id_usuario = '" . $_SESSION['usuario'] . "'");
          $fila_actualizada = $MyBBDD->extraer_registro();

          // Actualizar los valores de los campos de entrada con los nuevos valores del usuario
          echo '<script>
                    document.getElementById("emailPerfil").value = "' . $fila_actualizada['correo'] . '";
                    document.getElementById("nombrePerfil").value = "' . $fila_actualizada['nombre'] . '";
                    document.getElementById("direccionPerfil").value = "' . $fila_actualizada['direccion'] . '";
                    document.getElementById("apellidosPerfil").value = "' . $fila_actualizada['apellidos'] . '";
                    document.getElementById("numeroCallePerfil").value = "' . $fila_actualizada['numero_calle'] . '";
                    document.getElementById("pisoPerfil").value = "' . $fila_actualizada['piso'] . '";
                    document.getElementById("prefijoPerfil").value = "' . $fila_actualizada['prefijo'] . '";
                    document.getElementById("telefonoPerfil").value = "' . $fila_actualizada['telefono'] . '";
                    document.getElementById("codigoPostalPerfil").value = "' . $fila_actualizada['codigo_postal'] . '";
                    document.getElementById("provinciaPerfil").value = "' . $fila_actualizada['provincia'] . '";                
                  </script>';

          echo '<script>
                  Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Le profil a été modifié avec succès.",
                    showConfirmButton: false,
                    timer: 3500
                  }).then(function() {
							        window.location.href = "perfil.php";
						      });
               </script>';
        } catch (Exception $e) {
          echo "<script>
                  alert(Erreur de mise à jour du profil: );
                </script>'" . $e->getMessage();
        }
      } 

      if (isset($_POST['guardar2'])) {

        try {
          // Obtener los valores de los campos del formulario

          $MyBBDD->consulta("UPDATE usuarios SET contrasena = '" . $_POST["contrasenaPerfil"] . "',nombre = '" . $_POST["nombrePerfil"] . "',direccion = '" . $_POST["direccionPerfil"] . "',apellidos = '" . $_POST["apellidosPerfil"] . "',numero_calle = '" . $_POST["numeroCallePerfil"] . "',piso = '" . $_POST["pisoPerfil"] . "',prefijo = '" . $_POST["prefijoPerfil"] . "',telefono = '" . $_POST["telefonoPerfil"] . "',codigo_postal = '" . $_POST["codigoPostalPerfil"] . "',provincia = '" . $_POST["provinciaPerfil"] . "' WHERE id_usuario = '" . $_SESSION['usuario'] . "'");

          $MyBBDD->consulta("SELECT * FROM usuarios WHERE id_usuario = '" . $_SESSION['usuario'] . "'");
          $fila_actualizada = $MyBBDD->extraer_registro();

          // Actualizar los valores de los campos de entrada con los nuevos valores del usuario
          echo '<script>
                  document.getElementById("contrasenaPerfil").value = "' . $fila_actualizada['contrasena'] . '";
                  document.getElementById("nombrePerfil").value = "' . $fila_actualizada['nombre'] . '";
                  document.getElementById("direccionPerfil").value = "' . $fila_actualizada['direccion'] . '";
                  document.getElementById("apellidosPerfil").value = "' . $fila_actualizada['apellidos'] . '";
                  document.getElementById("numeroCallePerfil").value = "' . $fila_actualizada['numero_calle'] . '";
                  document.getElementById("pisoPerfil").value = "' . $fila_actualizada['piso'] . '";
                  document.getElementById("prefijoPerfil").value = "' . $fila_actualizada['prefijo'] . '";
                  document.getElementById("telefonoPerfil").value = "' . $fila_actualizada['telefono'] . '";
                  document.getElementById("codigoPostalPerfil").value = "' . $fila_actualizada['codigo_postal'] . '";
                  document.getElementById("provinciaPerfil").value = "' . $fila_actualizada['provincia'] . '";                
                </script>';
          echo '<script>
                  Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Le profil a été modifié avec succès.",
                    showConfirmButton: false,
                    timer: 3500
                  }).then(function() {
                      window.location.href = "perfil.php";
                  });
                </script>';
        } catch (Exception $e) {
          echo "<script>alert(Erreur de mise à jour du profil: );</script>'" . $e->getMessage();
        }
      }

      if (isset($_POST['guardar3'])) {

        try {
          // Obtener los valores de los campos del formulario

          $MyBBDD->consulta("UPDATE usuarios SET correo = '" . $_POST["emailPerfil"] . "',contrasena = '" . $_POST["contrasenaPerfil"] . "',nombre = '" . $_POST["nombrePerfil"] . "',direccion = '" . $_POST["direccionPerfil"] . "',apellidos = '" . $_POST["apellidosPerfil"] . "',numero_calle = '" . $_POST["numeroCallePerfil"] . "',piso = '" . $_POST["pisoPerfil"] . "',prefijo = '" . $_POST["prefijoPerfil"] . "',telefono = '" . $_POST["telefonoPerfil"] . "',codigo_postal = '" . $_POST["codigoPostalPerfil"] . "',provincia = '" . $_POST["provinciaPerfil"] . "' WHERE id_usuario = '" . $_SESSION['usuario'] . "'");

          $MyBBDD->consulta("SELECT * FROM usuarios WHERE id_usuario = '" . $_SESSION['usuario'] . "'");
          $fila_actualizada = $MyBBDD->extraer_registro();

          // Actualizar los valores de los campos de entrada con los nuevos valores del usuario
          echo '<script>
                  document.getElementById("emailPerfil").value = "' . $fila_actualizada['correo'] . '";
                  document.getElementById("contrasenaPerfil").value = "' . $fila_actualizada['contrasena'] . '";
                  document.getElementById("nombrePerfil").value = "' . $fila_actualizada['nombre'] . '";
                  document.getElementById("direccionPerfil").value = "' . $fila_actualizada['direccion'] . '";
                  document.getElementById("apellidosPerfil").value = "' . $fila_actualizada['apellidos'] . '";
                  document.getElementById("numeroCallePerfil").value = "' . $fila_actualizada['numero_calle'] . '";
                  document.getElementById("pisoPerfil").value = "' . $fila_actualizada['piso'] . '";
                  document.getElementById("prefijoPerfil").value = "' . $fila_actualizada['prefijo'] . '";
                  document.getElementById("telefonoPerfil").value = "' . $fila_actualizada['telefono'] . '";
                  document.getElementById("codigoPostalPerfil").value = "' . $fila_actualizada['codigo_postal'] . '";
                  document.getElementById("provinciaPerfil").value = "' . $fila_actualizada['provincia'] . '";                
                </script>';
          echo '<script>
                  Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Le profil a été modifié avec succès.",
                    showConfirmButton: false,
                    timer: 3500
                  }).then(function() {
                      window.location.href = "perfil.php";
                  });
                </script>';
        } catch (Exception $e) {
          echo "<script>alert(Erreur de mise à jour du profil: );</script>'" . $e->getMessage();
        }
      }

      if (isset($_POST['guardar'])){

        try {
          // Obtener los valores de los campos del formulario

          $MyBBDD->consulta("UPDATE usuarios SET nombre = '" . $_POST["nombrePerfil"] . "',direccion = '" . $_POST["direccionPerfil"] . "',apellidos = '" . $_POST["apellidosPerfil"] . "',numero_calle = '" . $_POST["numeroCallePerfil"] . "',piso = '" . $_POST["pisoPerfil"] . "',prefijo = '" . $_POST["prefijoPerfil"] . "',telefono = '" . $_POST["telefonoPerfil"] . "',codigo_postal = '" . $_POST["codigoPostalPerfil"] . "',provincia = '" . $_POST["provinciaPerfil"] . "' WHERE id_usuario = '" . $_SESSION['usuario'] . "'");

          $MyBBDD->consulta("SELECT * FROM usuarios WHERE id_usuario = '" . $_SESSION['usuario'] . "'");
          $fila_actualizada = $MyBBDD->extraer_registro();

          // Actualizar los valores de los campos de entrada con los nuevos valores del usuario
          echo '<script>
                  document.getElementById("nombrePerfil").value = "' . $fila_actualizada['nombre'] . '";
                  document.getElementById("direccionPerfil").value = "' . $fila_actualizada['direccion'] . '";
                  document.getElementById("apellidosPerfil").value = "' . $fila_actualizada['apellidos'] . '";
                  document.getElementById("numeroCallePerfil").value = "' . $fila_actualizada['numero_calle'] . '";
                  document.getElementById("pisoPerfil").value = "' . $fila_actualizada['piso'] . '";
                  document.getElementById("prefijoPerfil").value = "' . $fila_actualizada['prefijo'] . '";
                  document.getElementById("telefonoPerfil").value = "' . $fila_actualizada['telefono'] . '";
                  document.getElementById("codigoPostalPerfil").value = "' . $fila_actualizada['codigo_postal'] . '";
                  document.getElementById("provinciaPerfil").value = "' . $fila_actualizada['provincia'] . '";                
                </script>';
          echo '<script>
                  Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Le profil a été modifié avec succès.",
                    showConfirmButton: false,
                    timer: 3500
                  }).then(function() {
                      window.location.href = "perfil.php";
                  });
                </script>';
        } catch (Exception $e) {
          echo "<script>alert(Erreur de mise à jour du profil: );</script>'" . $e->getMessage();
        }
      }     
    }
    ?>
  </div>
  <a href="https://wa.me/message/46NEEW6YV5PQH1" target="_blank">  <img src="../img/chatWhatsapp/icono_boton_whatsapp_lila.svg" alt="Chat" width="50px" class="chat"></a>

  <?php include("../footer/footerTienda.php"); ?>
  <script type="text/javascript" src="../js/perfil.js"></script>
</body>

</html>