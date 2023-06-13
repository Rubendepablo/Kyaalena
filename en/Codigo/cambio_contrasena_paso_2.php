<?php require_once "conect_class.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cambio2.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Register</title>

</head>

<body>
    <?php include("../navegador/navTienda.php") ?>
    <h2 class="h2">LAST STEP FOR PASSWORD CHANGE</h2>

    <div id="DivForm" class="DivForm">

        <form action="#" method="post" class="formulario">
            <table>
                <tr>
                    <td class="ojos"><input type="password" class="Inputs" name="nuevacontrasena" id="nuevacontrasena" placeholder="New password*"></td>
                    <td>
                        <div class="ojoVisible" id="ojoVisible"><svg id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 84.32 83.47">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #cc9ed2;
                                        }

                                        .cls-2 {
                                            fill: #bc77c6;
                                        }
                                    </style>
                                </defs>
                                <g id="b16a6b4e-8de8-41f3-a7dd-1a240b718801">
                                    <path class="cls-1" d="M120.91,110.33c-6.2-10-21.2-30.64-40.12-30.64-17.22,0-31.19,17-38.24,27.7C49.26,99,60.84,87.81,74.81,87.81c16.89,0,30.28,16.35,35.81,24.33a15.42,15.42,0,0,1,0,17.61c-5.53,8-18.92,24.34-35.81,24.34-16.23,0-29.23-15.11-35.13-23.38.3.62.63,1.22,1,1.81,6.2,10,21.2,30.64,40.12,30.64s33.92-20.59,40.12-30.64a21.46,21.46,0,0,0,0-22.19Z" transform="translate(-39.68 -79.69)" />
                                    <path class="cls-2" d="M76.37,97.91c-12.64,0-22.66,12.23-26.8,18.21a11.6,11.6,0,0,0-2.06,6.59h0a11.56,11.56,0,0,0,2.06,6.59c4.14,6,14.16,18.22,26.8,18.22S99,135.28,103.17,129.3a11.56,11.56,0,0,0,2.06-6.59h0a11.6,11.6,0,0,0-2.06-6.59C99,110.14,89,97.91,76.37,97.91Zm0,40.59a15.79,15.79,0,1,1,15.79-15.79h0A15.81,15.81,0,0,1,76.37,138.5Z" transform="translate(-39.68 -79.69)" />
                                    <path class="cls-2" d="M85.93,124.23a9.12,9.12,0,0,0-7.83-9l7.78,10.06C85.91,124.92,85.93,124.58,85.93,124.23Z" transform="translate(-39.68 -79.69)" />
                                    <path class="cls-2" d="M67.68,124.23a9.12,9.12,0,0,0,16.26,5.69l-10.84-14A9.12,9.12,0,0,0,67.68,124.23Z" transform="translate(-39.68 -79.69)" />
                                    <rect class="cls-1" x="75.14" y="76.64" width="4.33" height="94.76" rx="2.16" transform="translate(-99.39 -6.51) rotate(-37.71)" />
                                </g>
                            </svg></div>

                        <div class="ojo" id="ojo"><svg id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 85.75 84.89">
                                <defs>
                                    <style>
                                        .cls-7 {
                                            fill: #cc9ed2;
                                        }

                                        .cls-8 {
                                            fill: #bc77c6;
                                        }
                                    </style>
                                </defs>
                                <g id="b3c5f1c1-66a1-449a-9832-233ba440c501">
                                    <path class="cls-1" d="M153.09,103.17C146.78,92.94,131.53,72,112.28,72,94.77,72,80.56,89.34,73.4,100.17c6.82-8.53,18.6-19.91,32.81-19.91,17.17,0,30.79,16.62,36.41,24.74a15.71,15.71,0,0,1,0,17.92c-5.62,8.12-19.24,24.74-36.41,24.74-16.51,0-29.74-15.37-35.73-23.77a20.19,20.19,0,0,0,1,1.83C77.79,136,93,156.89,112.28,156.89s34.5-20.94,40.81-31.17a21.84,21.84,0,0,0,0-22.55Z" transform="translate(-70.48 -72)" />
                                    <path class="cls-2" d="M106.88,89.22c-12.86,0-23,12.45-27.26,18.53a11.84,11.84,0,0,0-2.1,6.7h0a11.89,11.89,0,0,0,2.1,6.7c4.21,6.08,14.4,18.52,27.26,18.52s23-12.44,27.25-18.52a11.74,11.74,0,0,0,2.1-6.7h0a11.69,11.69,0,0,0-2.1-6.7C129.92,101.67,119.73,89.22,106.88,89.22Zm0,41.28a16,16,0,1,1,16.05-16h0A16.07,16.07,0,0,1,106.88,130.5Z" transform="translate(-70.48 -72)" />
                                    <circle class="cls-2" cx="36.4" cy="42.45" r="9.17" />
                                </g>
                            </svg>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><input type="password" class="Inputs" name="nuevacontrasena_confirm" id="nuevacontrasena_confirm" placeholder="Confirm password*"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="email" class="Inputs" name="correo" id="correo" placeholder="Email*"><br>
                        <input class="enviar" type="submit" name="cambio" id="cambio" value="Change">
                    </td>

                </tr>
            </table>

        </form>
    </div>
    <a href="https://wa.me/message/46NEEW6YV5PQH1" target="_blank"> <img src="../img/chatWhatsapp/icono_boton_whatsapp_lila.svg" alt="Chat" width="50px" class="chat"></a>
    <div><svg class="imagenFondo" id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1613.98 2805">
            <defs>
                <style>
                    .cls-10 {
                        fill: #97e0d4;
                    }

                    .cls-20 {
                        fill: #dcedec;
                    }
                </style>
            </defs>
            <g id="bb9d869b-d2c6-4068-a460-299257f32f43">
                <path class="cls-10" d="M3244,1628.83c-336.86-149.4-733.92-344.09-947.64-447.36-40.49-19.56-53.58-64.72-39.49-101-40.11-19.5-84.71-41-119.64-58-92-40.62-92.3-182.43-.24-223.23,310.05-150.7,739.5-362.78,1107-519.63V0h-67.45L1674.25,748A79.79,79.79,0,0,0,1630,819.43v456.11l1596.45,791.4a34.69,34.69,0,0,0,17.53,3.74Z" transform="translate(-1630.02)" />
                <path class="cls-10" d="M3244,1538.92c-310.92-131.19-726.57-332.14-987.13-458.45-14.09,36.28-1,81.44,39.49,101,213.72,103.27,610.78,298,947.64,447.36Z" transform="translate(-1630.02)" />
                <path class="cls-10" d="M3244,376.07c-313,134.76-720.37,333.4-968.56,454.41-36.37,17.74-69.83,34-99.7,48.56-18,8.76-19.95,25.19-19.95,31.85s2,23.07,20,31.79c29.29,14.15,62,30,97.58,47.26,19.36,9.38,39.78,19.29,61,29.54C2554.78,912.12,2926.16,729.78,3244,587.9Z" transform="translate(-1630.02)" />
                <path class="cls-10" d="M3244,2159.39c-.57,0-1.14,0-1.71,0a124.34,124.34,0,0,1-55.21-13L1630,1374.52v30.56a79.78,79.78,0,0,0,44.35,71.48L3244,2254.67Z" transform="translate(-1630.02)" />
                <path class="cls-20" d="M3244,1844V1651.32c-312.63,134.74-718.53,332.64-966.06,453.33-36.37,17.74-69.82,34-99.7,48.56-18,8.76-19.95,25.18-19.94,31.84s2,23.08,20,31.8c29.29,14.15,62,30,97.58,47.26l61,29.54c219.86-107.08,589.87-288.74,907.15-430.47Z" transform="translate(-1630.02)" />
                <path class="cls-20" d="M1676.88,2750.73,1786.35,2805h161.5l-315.32-156.31v30.56A79.76,79.76,0,0,0,1676.88,2750.73Z" transform="translate(-1630.02)" />
                <path class="cls-20" d="M3030.41,2805c-278.2-128.53-562.34-267.6-731.55-349.36-40.48-19.56-53.58-64.72-39.49-101-40.1-19.5-84.7-41-119.64-57.95-92-40.62-92.29-182.43-.23-223.23,309.34-150.35,737.55-361.82,1104.5-518.57V1241.83L1676.75,2022.17a79.8,79.8,0,0,0-44.22,71.42v456.12l515,255.29Z" transform="translate(-1630.02)" />
                <path class="cls-20" d="M3227.41,2805c-308.66-131.24-712.78-326.62-968-450.36-14.09,36.28-1,81.44,39.49,101,169.21,81.76,453.35,220.83,731.55,349.36Z" transform="translate(-1630.02)" />
            </g>
        </svg>

    </div>
    <script type="text/javascript" src="../js/cambio_contrasena_paso_2.js"></script>

    <?php

    if (isset($_POST['cambio'])) {

        $nueva = filter_input(INPUT_POST, 'nuevacontrasena', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $confirmar = filter_input(INPUT_POST, 'nuevacontrasena_confirm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
        $consulta = "UPDATE usuarios SET contrasena = '" . $nueva . "' WHERE correo = '" . $correo . "'";

        if ($nueva == $confirmar) {

            $MyBBDD->consulta($consulta);
			echo '<script>
			Swal.fire({
				position: "top-end",
				icon: "success",
				title: "The password has been changed successfully.",
				showConfirmButton: false,
				timer: 2500
			}).then(function() {
				window.location.href = "login.php";
			});
		</script>';
        } else {
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "The passwords entered do not match.",
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

    <?php include("../footer/footerTienda.php") ?>

</body>

</html>