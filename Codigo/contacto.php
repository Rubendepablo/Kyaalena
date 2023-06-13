<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/contacto.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
    <title>Contacto</title>
    <?php
    $currentPage = 'contacto';
    ?>
</head>


<body>
    <?php include("../navegador/nav.php"); ?>
    <div class="container">
    <img src="../img/contacto/contacto-foto.svg" alt="foto contacto" class="imagenFondo">
    <div class="transparencia"></div>
    <div class="frase conversar">Estoy aquí, conversemos</div>
    <div class="frase datos">Deja tus datos y me pondré en contacto contigo</div>
    
        <img src="../img/contacto/contacto-04.svg" alt="form" class="form-img">
        <div class="contacto">
            <form action="#" method="post">
                <div class="bloque">
                    <table class="tabla" border="0">

                        <tr>
                            <td></td>
                            <td>
                                <span class="texto"> Nombre y Apellido *</span>
                                <input type="text" class="Inputs" id="nombre-apellido" name="nombre-apellido" placeholder="Nombre y apellido *" required>
                            </td>
                        </tr>

                        <tr>
                            <td>

                            </td>

                            <td>
                                <span class="texto"> Email*</span>
                                <input type="email" class="Inputs" id="email" name="email" placeholder="Email *" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: left; text-align: left; position: relative; top: -6px; margin-inline-end: 12px;">
                                <span class="texto"> Prefijo </span>
                                <div class="prefijo" name="prefijo">
                                    <select name="prefijo" id="prefijo">
                                        <option value="+34">+34</option>
                                        <option value="+33">+33</option>
                                        <option value="+351">+351</option>
                                        <option value="+39">+39</option>
                                        <option value="+49">+49</option>
                                        <option value="+44">+44</option>
                                        <option value="+58">+58</option>
                                        <option value="+57">+57</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="number" style="width: 251px;" class="Inputs no-arrows" id="telefono" name="telefono" placeholder="Número de teléfono *" required>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>

                            <td>
                                <span class="texto"> Motivo*</span>
                                <input type="text" class="Inputs" id="motivo" name="motivo" placeholder="Motivo *" required>
                            </td>
                        </tr>
                    </table>
                </div>
                <button type="submit" class="btn-enviar" id="enviar" name="enviar">Enviar</button>
            </form>
        </div>
    </div>
    <a href="https://wa.me/message/46NEEW6YV5PQH1" target="_blank"> <img src="../img/chatWhatsapp/icono_boton_whatsapp_verde.svg" alt="Chat" width="50px" class="chat"></a>
    <?php include("../footer/footer.php"); ?>
</body>

</html>
<?php
if (isset($_POST['enviar'])) {
    $nombre = filter_input(INPUT_POST, 'nombre-apellido', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $correo = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT);
    $motivo = $_POST['motivo'];
    $prefijo = $_POST['prefijo'];

    // Validar el teléfono
    // Consultar si el telefono ya existe en la base de datos
    $consultaTel = "SELECT * FROM whatsletter WHERE telefono = $telefono && prefijo = '$prefijo'";
    $MyBBDD->consulta($consultaTel);
    $resultadoTel = $MyBBDD->extraer_registro();
    if (!preg_match('/^\d{9}$/', $telefono) || $resultadoTel !== false) {
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "El teléfono debe tener 9 dígitos o ya está registrado.",
                    customClass: {
                        confirmButton: "my-custom-button-class",
                        title: "my-custom-title-class",
                        text: "my-custom-text-class"
                    }       
                });
             </script>';
    } else {
        // Consultar si el correo ya existe en la base de datos
        $consultaMail = "SELECT * FROM whatsletter WHERE correo = '$correo'";
        $MyBBDD->consulta($consultaMail);
        $resultado = $MyBBDD->extraer_registro();
        if ($resultado !== false) {
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "El correo electrónico ya está asignado a un usuario.",
                        customClass: {
                            confirmButton: "my-custom-button-class",
                            title: "my-custom-title-class",
                            text: "my-custom-text-class"
                        }       
                    });
                 </script>';
        } else {
            // Insertar los datos en la base de datos
            $consultaInsert = "INSERT INTO whatsletter (nombre_apellido, telefono, correo, prefijo, motivo) VALUES ('$nombre', $telefono, '$correo', '$prefijo', '$motivo')";
            $MyBBDD->consulta($consultaInsert);
            echo '<script>
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Se ha enviado correctamente.",
                        showConfirmButton: false,
                        timer: 3500
                    }).then(function() {
                        window.location.href = "index.php";
                    });
                 </script>';
        }
    }
}

?>