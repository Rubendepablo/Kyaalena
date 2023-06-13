<?php require_once "conect_class.php" ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/cambio1.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>Registro</title>

</head>

<body>


	<?php include("../navegador/navTienda.php") ?>

	<h2 class="h2">CAMBIO DE CONTRASEÑA</h2>
	<div class="DivForm">
		<h3>
			<p>Introduce tu email</p>
		</h3>

		<form method="post" action="#" class="formulario">

			<input class="Inputs" type="email" name="correo" id="correo" placeholder="Introduce tu email*"><br>
			<button class="continuar" type="submit" name="continuar" id="continuar">Continuar</button>
		</form>
	</div>

	<div><svg class="imagenFondo" id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1613.98 2805">
			<defs>
				<style>
					.cls-1 {
						fill: #97e0d4;
					}

					.cls-2 {
						fill: #dcedec;
					}
				</style>
			</defs>
			<g id="bb9d869b-d2c6-4068-a460-299257f32f43">
				<path class="cls-1" d="M3244,1628.83c-336.86-149.4-733.92-344.09-947.64-447.36-40.49-19.56-53.58-64.72-39.49-101-40.11-19.5-84.71-41-119.64-58-92-40.62-92.3-182.43-.24-223.23,310.05-150.7,739.5-362.78,1107-519.63V0h-67.45L1674.25,748A79.79,79.79,0,0,0,1630,819.43v456.11l1596.45,791.4a34.69,34.69,0,0,0,17.53,3.74Z" transform="translate(-1630.02)" />
				<path class="cls-1" d="M3244,1538.92c-310.92-131.19-726.57-332.14-987.13-458.45-14.09,36.28-1,81.44,39.49,101,213.72,103.27,610.78,298,947.64,447.36Z" transform="translate(-1630.02)" />
				<path class="cls-1" d="M3244,376.07c-313,134.76-720.37,333.4-968.56,454.41-36.37,17.74-69.83,34-99.7,48.56-18,8.76-19.95,25.19-19.95,31.85s2,23.07,20,31.79c29.29,14.15,62,30,97.58,47.26,19.36,9.38,39.78,19.29,61,29.54C2554.78,912.12,2926.16,729.78,3244,587.9Z" transform="translate(-1630.02)" />
				<path class="cls-1" d="M3244,2159.39c-.57,0-1.14,0-1.71,0a124.34,124.34,0,0,1-55.21-13L1630,1374.52v30.56a79.78,79.78,0,0,0,44.35,71.48L3244,2254.67Z" transform="translate(-1630.02)" />
				<path class="cls-2" d="M3244,1844V1651.32c-312.63,134.74-718.53,332.64-966.06,453.33-36.37,17.74-69.82,34-99.7,48.56-18,8.76-19.95,25.18-19.94,31.84s2,23.08,20,31.8c29.29,14.15,62,30,97.58,47.26l61,29.54c219.86-107.08,589.87-288.74,907.15-430.47Z" transform="translate(-1630.02)" />
				<path class="cls-2" d="M1676.88,2750.73,1786.35,2805h161.5l-315.32-156.31v30.56A79.76,79.76,0,0,0,1676.88,2750.73Z" transform="translate(-1630.02)" />
				<path class="cls-2" d="M3030.41,2805c-278.2-128.53-562.34-267.6-731.55-349.36-40.48-19.56-53.58-64.72-39.49-101-40.1-19.5-84.7-41-119.64-57.95-92-40.62-92.29-182.43-.23-223.23,309.34-150.35,737.55-361.82,1104.5-518.57V1241.83L1676.75,2022.17a79.8,79.8,0,0,0-44.22,71.42v456.12l515,255.29Z" transform="translate(-1630.02)" />
				<path class="cls-2" d="M3227.41,2805c-308.66-131.24-712.78-326.62-968-450.36-14.09,36.28-1,81.44,39.49,101,169.21,81.76,453.35,220.83,731.55,349.36Z" transform="translate(-1630.02)" />
			</g>
		</svg>

	</div>

	<?php


	if (isset($_POST['continuar'])) {

		$correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);

		$consultaMail = "SELECT * FROM usuarios WHERE correo = '$correo'";


		$MyBBDD->consulta($consultaMail);


		if ($MyBBDD->numero_filas() == 1) {
			echo '<script>
			Swal.fire({
				position: "top-end",
				icon: "success",
				title: "Pasamos al último paso!.",
				showConfirmButton: false,
				timer: 2500
			}).then(function() {
				window.location.href = "cambio_contrasena_paso_2.php";
			});
		</script>';
		} else {
			echo '<script>
			Swal.fire({
				icon: "error",
				title: "Oops...",
				text: "El email no existe, intentelo de nuevo.",
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
	<a href="https://wa.me/message/46NEEW6YV5PQH1" target="_blank"> <img src="../img/chatWhatsapp/icono_boton_whatsapp_lila.svg" alt="Chat" width="50px" class="chat"></a>

	<?php include("../footer/footerTienda.php") ?>

</body>

</html>