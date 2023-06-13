<?php require_once("conect_class.php");?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/footer.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <!-- <div style="height: 950px;">

    </div> -->
    <footer class="all-footer">
        <div class="footer-container">
            <!-- <img src="../img/elementos/barras_de_fondo.svg" alt="Elemento" class="elemento"> -->
            <div class="header-footer">
                <img src="../img/Logo PNG/Imagotipo-kyalena-name.svg" alt="Imagotipo" class="imagotipo">
                <div class="rrss">
                    <a href="https://es.linkedin.com/in/betsabethtorres" target="_blank"><img src="../img/Redes sociales/verde/lnkdin.svg" alt="lnkdin" class="icono"></a>
                    <a href="https://discord.gg/bUaJPQgn" target="_blank"><img src="../img/Redes sociales/verde/telegram.svg" alt="telegram" class="icono"></a>
                    <a href="https://www.instagram.com/kyaalena_/" target="_blank"><img src="../img/Redes sociales/verde/instagram.svg" alt="instagram" class="icono"></a>
                    <a href="https://twitter.com/kyaalena?lang=es" target="_blank"><img src="../img/Redes sociales/verde/twitter.svg" alt="twitter" class="icono"></a>
                    <a href="https://www.tiktok.com/@kyaalena" target="_blank"><img src="../img/Redes sociales/verde/tiktok.svg" alt="tiktok" class="icono"></a>
                </div>
            </div>
            <div class="body-footer">
                <div class="info-marca">
                    <p><span class="text-bold">Je suis l'auteur de mes pensées logiques les plus créatives.</span></p>
                    <p>
                    Je suis spécialisé dans le développement de code APIS Restfil sécurisé pour les paiements et les fintechs avec des architectures microservices et dans le conseil technologique pour la cybersécurité et la transformation numérique.
                    </p>
                </div>
                <div id="div_whatsletter" class="whatsletter">
                    <span class="text-bold">S'abonner à la Whatsletter</span>
                    <form action="#" method="post" name="form-whatsletter" class="form-whatsletter">
                        <input type="text" id="movil" name="movil" placeholder="+54 123 45 67 89"></br>
                        <input type="submit" id="boton-movil" name="suscribirse" value="S'abonner">
                    </form>
                </div>
                <div class="menu-footer">
                    <ul>
                        <li><a href="./index.php" class="menu-item <?php if ($currentPage == 'inicio') echo 'active has-icon'; ?>"><span class="menu-icon"></span>Accueil</a></li>
                        <li><a href="./conoceme.php" class="menu-item <?php if ($currentPage == 'conoceme') echo 'active has-icon'; ?>"><span class="menu-icon"></span>Apprenez à me connaître</a></li>
                        <li><a href="./servicios.php" class="menu-item <?php if ($currentPage == 'servicios') echo 'active has-icon'; ?>"><span class="menu-icon"></span>Les services</a></li>
                        <li><a href="./podcast.php" class="menu-item <?php if ($currentPage == 'podcast') echo 'active has-icon'; ?>"><span class="menu-icon"></span>Podcast</a></li>
                        <li><a href="./tienda.php" class="menu-item <?php if ($currentPage == 'tienda') echo 'active has-icon'; ?>"><span class="menu-icon"></span>Boutique</a></li>
                        <li><a href="./contacto.php" class="menu-item <?php if ($currentPage == 'contacto') echo 'active has-icon'; ?>"><span class="menu-icon"></span>Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="final-footer">
                <p><a href="#">Copyright @2023 All Rights Rederved</a></p>
                <p><a href="#">Politique de confidentialité</a></p>
                <p><a href="#">Conditions générales d'utilisation</a></p>
            </div>
        </div>
    </footer>
    <?php
    require_once '../twilio-php-main/src/Twilio/autoload.php';

    use Twilio\Rest\Client;

    if (isset($_POST['suscribirse'])) {
        if (!$_POST['movil'] == ""){
        $movil = $_POST['movil'];
       try {
      


            $MyBBDD->consulta("INSERT INTO whatsletter (telefono) VALUES ('$movil')");


            // Update the path below to your autoload.php,
            // see https://getcomposer.org/doc/01-basic-usage.md

            $sid    = "ACb1d9163058e29c3f89bf7c3dc9367a63";
            $token  = "99e7071a7ae3dd349339b6ba61f989b0";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create(
                    "whatsapp:+34635392937", // to
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" => "Gracias por suscribirse, le mantendremos al día de todas las ofertas y novedades de Kyaalena."
                    )
                );

            // Imprime el SID del mensaje si se envió correctamente
            if ($message->sid) {
                echo '<script>
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Message envoyé avec succès. SID:  '. $message->sid.'",
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>';
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Une erreur sest produite lors de lenvoi du message WhatsApp.",
                            customClass: {
                            confirmButton: "my-custom-button-class",
                            title: "my-custom-title-class",
                            text: "my-custom-text-class"
                            }
                        });
                    </script>';
            }
        } catch (mysqli_sql_exception $e){
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Téléphone déjà abonné!",
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
    ?>
</body>

</html>
