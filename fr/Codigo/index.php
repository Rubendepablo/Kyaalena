<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/inicio.css">
    <title>Accueil</title>
    <?php
    $currentPage = 'inicio'; // reemplaza 'Inicio' con el nombre de la página actual
    ?>

</head>

<body>
    <?php include("../navegador/nav.php"); ?>
    <div id="container" class="contenedor">
        <img src="../imagenes/_MG_0454.png" class="fondo">
        <div class="capa"></div>
    <img src="../img/banner/viviendo_la_tecnología.svg" alt="Viviendo la Tecnolgía" class="imagen">
    <div class="texto">
    <span>Développement de logiciels, cybersécurité et transformation numérique</span>
    </div>
    </div>

    <a href="https://wa.me/message/46NEEW6YV5PQH1" target="_blank"> <img src="../img/chatWhatsapp/icono_boton_whatsapp_verde.svg" alt="Chat" width="50px" class="chat"></a>

    <?php include("../footer/footer.php"); ?>
</body>

</html>