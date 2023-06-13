<?php require_once "conect_class.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/Registro.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>Registre</title>
</head>

<body>
	<?php include("../navegador/navTienda.php"); ?>
	<img class="imagenFondo1" src="../img/RegistroLogin/store_registro_de_usuario_01.svg" alt="Viviendo la Tecnolgía">

	<h2>Saisissez vos données d'inscription</h2>
	<div class="contRegistro">

		<form action="#" method="post">
			<div class="bloque">
				<table class="tabla" border="0">

					<tr>
						<td></td>
						<td><input type="text" class="Inputs" id="nombre" name="nombre" placeholder="Nom*" required></td>
						<td class="hidden">Ruben</td>
						<td><input type="email" class="Inputs" id="correo" name="correo" placeholder="Courriel*" required></td>
					</tr>

					<tr>
						<td>

						</td>

						<td><input type="text" class="Inputs" id="apellidos" name="apellidos" placeholder="Nom de famille*" required></td>
						<td class="hidden">Nerea</td>
						<td><input type="password" class="Inputs" id="password" name="password" placeholder="Mot de passe" required></td>
					</tr>
					<tr>
						<td>
							<div class="prefijo" name="prefijo" id="prefijo">
							Préfixe
								<select name="prefijo" id="prefijo">
									<option value="+33">+33</option>
									<option value="+34">+34</option>
									<option value="+351">+351</option>
									<option value="+49">+49</option>
									<option value="+44">+44</option>
									<option value="+58">+58</option>
									<option value="+57">+57</option>
								</select>
							</div>
						</td>
						<td><input type="number" class="Inputs" id="telefono" name="telefono" placeholder="Téléphone*" required></td>
						<td class="hidden">Pablo</td>
						<td><input type="password" class="Inputs" id="confirmar_password" name="confirmar_password" placeholder="Confirmer le mot de passe" required></td>
					</tr>
				</table>
			</div>

			<div class="contNoticiasyPoliticas">
				<table border="0">
					<tr>
						<td>
							<div class="noticias">
							Je souhaite recevoir les nouvelles de Stradivarius par e-mail et par SMS.</div>
						</td>
						<td>
							<div class="button">
								<input type="checkbox" id="terms" />
								<label for="terms">
									<span></span>
								</label>

							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="politicas">
							J'ai lu et compris les informations sur l'utilisation de mes données personnelles expliquées dans la <b>Politique de confidentialité</b></div>
						</td>
						<td>
							<div class="buttonPoliticas">
								<input type="checkbox" id="termsPoliticas" name="termsPoliticas" />
								<label for="termsPoliticas">
									<span></span>
								</label>
							</div>
						</td>
					</tr>
				</table>

			</div>

			<button type="submit" class="BotonEnviarRegistro" id="registrarse" name="registrarse">Registre</button>
		</form>

	</div>

	<img class="imagenFondo" src="../img/RegistroLogin/store_registro_de_usuario_02.svg" alt="Viviendo la Tecnolgía">
	<?php

	if (isset($_POST['registrarse'])) {

		$politicasAceptadas = isset($_POST['termsPoliticas']);

		if (!$politicasAceptadas) {
			echo '<div class ="mensajeError">Vous devez accepter la politique de confidentialité pour vous inscrire</div>';
		} else {

			$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
			$telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$confirmar_password = filter_input(INPUT_POST, 'confirmar_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$prefijo = $_POST['prefijo'];

			if ($password == $confirmar_password) {

				try {
					$consultaMail = "SELECT * FROM usuarios WHERE correo = '$correo'";

					// Validar el teléfono
					if (!preg_match('/^\d{9}$/', $telefono)) {
						throw new Exception('Le numéro de téléphone doit être composé de 9 chiffres');
					}
					// Validar el correo electrónico
					if ($MyBBDD->consulta($consultaMail) == true) {
						throw new Exception('Le-mail est déjà attribué à un utilisateur');
					}
					// Validar la contraseña
					if (strlen($password) <= 7) {
						throw new Exception('Le mot de passe doit comporter au moins 8 caractères');
					}

					$MyBBDD->consulta("INSERT INTO usuarios (nombre, apellidos, correo, telefono, contrasena, id_rol, emailmarketing, prefijo) VALUES ('$nombre', '$apellidos', '$correo', '$telefono', '$password',2 , 1 ,'$prefijo')");

					echo '<script>
						Swal.fire({
							position: "top-end",
							icon: "success",
							title: "Utilisateur enregistré avec succès.",
							showConfirmButton: false,
							timer: 5500
						}).then(function() {
							window.location.href = "tienda.php";
						});
					</script>';

					// echo '<div class ="mensajeError">Los datos se han insertado correctamente' . '</div>';
				} catch (Exception $e) {

					echo '
					<script>
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Une erreur sest produite:  ' . $e->getMessage() . '"",
					customClass: {
						confirmButton: "my-custom-button-class",
						title: "my-custom-title-class",
						text: "my-custom-text-class"
					}       
				});
			</script>';
				}
			}
		}
	}
	?>
	<a href="https://wa.me/message/46NEEW6YV5PQH1" target="_blank"> <img src="../img/chatWhatsapp/icono_boton_whatsapp_lila.svg" alt="Chat" width="50px" class="chat"></a>

	<?php include("../footer/footerTienda.php"); ?>
</body>

</html>