<?php

require_once("conect_class.php");

session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>Login</title>
</head>

<body class="contenedora">

	<?php include("../navegador/navTienda.php"); ?>
	<div>
		<h2>Login to your account</h2>
		<div class="contInicoSesion">
			<div>
				<form action="#" method="POST">
					<div class="login">

						<input type="email" class="Inputs" id="email" name="email" placeholder="Email*" required>

						<br>

						<input type="password" class="Inputs" id="password" name="password" placeholder="Password*" required>
					</div>
					<a class="button1" href="cambio_contrasena_paso_1.php">Forgotten your password?</a>
					<br>
					<button class="button" type="submit" id="iniciar" name="iniciar">Login</button>

				</form>
			</div>

			<div class="crearCuenta">

				<h3><b>Don't have an account?<br>

				Sign up</b></h3><br>

				<button type="submit" id="registrarse" class="button">
					<a class="enlaceRegistro" href="registro.php">Sign up now</a></button>

			</div>
		</div>
		<img class="imagenFondo" src="../img/RegistroLogin/store_inicio_de_session.svg" alt="Viviendo la Tecnolgía">
		<?php


		if (isset($_POST['iniciar'])) {

			if (!$_POST['email'] == "" && !$_POST['password'] == "") {
				$email = $_POST["email"];
				$password = $_POST["password"];

				$MyBBDD->consulta("SELECT * FROM usuarios WHERE correo = '$email' AND contrasena = '$password'");


				if ($MyBBDD->numero_filas() == 1) {

					$fila = $MyBBDD->extraer_registro();

					$_SESSION['usuario'] = $fila['id_usuario'];

					echo '<script>
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Welcome: ' . $fila['nombre'] . ' ",
                            showConfirmButton: false,
                            timer: 5500
                        }).then(function() {
							window.location.href = "tienda.php";
						});
                    </script>';
				} else {
					echo '<script>
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "Incorrect username or password, please try again.",
						customClass: {
							confirmButton: "my-custom-button-class",
							title: "my-custom-title-class",
							text: "my-custom-text-class"
						}       
					});
				</script>';
				}
			} else {
				echo '<script>
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Enter a username and password.",
					customClass: {
						confirmButton: "my-custom-button-class",
						title: "my-custom-title-class",
						text: "my-custom-text-class"
					}       
				});
			</script>';
			}
		}
		?>
	</div>
	<a href="https://wa.me/message/46NEEW6YV5PQH1" target="_blank"> <img src="../img/chatWhatsapp/icono_boton_whatsapp_lila.svg" alt="Chat" width="50px" class="chat"></a>

	<?php include("../footer/footerTienda.php"); ?>

</body>

</html>