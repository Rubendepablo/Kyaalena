<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/contacto.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
    <title>Contact</title>
    <?php
    $currentPage = 'contacto';
    ?>
</head>


<body>
    <?php include("../navegador/nav.php"); ?>
    <div class="container">
    <img src="../img/contacto/contacto-foto.svg" alt="foto contacto" class="imagenFondo">
    <div class="transparencia"></div>
    <div class="frase conversar">Je suis là, parlons-en</div>
    <div class="frase datos">Laissez-moi vos coordonnées et je vous contacterai.</div>
    
        <img src="../img/contacto/contacto-04.svg" alt="form" class="form-img">
        <div class="contacto">
            <form action="#" method="post">
                <div class="bloque">
                    <table class="tabla" border="0">

                        <tr>
                            <td></td>
                            <td>
                                <span class="texto"> Nom et prénom *</span>
                                <input type="text" class="Inputs" id="nombre-apellido" name="nombre-apellido" placeholder="Nom et prénom *" required>
                            </td>
                        </tr>

                        <tr>
                            <td>

                            </td>

                            <td>
                                <span class="texto"> Courriel*</span>
                                <input type="email" class="Inputs" id="email" name="email" placeholder="Courriel *" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: left; text-align: left; position: relative; top: -6px; margin-inline-end: 12px;">
                                <span class="texto"> Préfixe </span>
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
                                <input type="number" style="width: 251px;" class="Inputs no-arrows" id="telefono" name="telefono" placeholder="Nº Téléphone *" required>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>

                            <td>
                                <span class="texto"> Raison*</span>
                                <input type="text" class="Inputs" id="motivo" name="motivo" placeholder="Raison *" required>
                            </td>
                        </tr>
                    </table>
                </div>
                <button type="submit" class="btn-enviar" id="enviar" name="enviar">Envoyer</button>
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
                    text: "Le numéro de téléphone doit être composé de 9 chiffres ou être déjà enregistré..",
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
                        text: "Le-mail est déjà attribué à un utilisateur.",
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
                        title: "Envoi réussi.",
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