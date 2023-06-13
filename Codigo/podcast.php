<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/podcast.css">
    <title>Podcast</title>
    <?php $currentPage = 'podcast'; ?>
</head>


<body>
    <?php include("../navegador/nav.php"); ?>
    <div class="contenedor">
        <img src="../img/podcast/principal-04.svg" alt="KyaNews">
        <div class="plataformas">
            <h2 class="disponible">Disponible en</h2>
            <a href="https://www.youtube.com/channel/UCjboHEU8iX2G0C71XsQwq7Q" target="_blank" class="linkYoutube"></a>
            <img src="../img/podcast/youtube-04.svg" alt="Youtube" class="youtube">
            <a href="https://open.spotify.com/user/312ssvvxf6ylf5vq3syhw6xyh67u" target="_blank" class="linkSpoty"></a>
            <img src="../img/podcast/spotify-05.svg" alt="Spotify" class="spotify">
        </div>
        <div class="acerca">
            <h2 class="titulos1">Acerca del Podcast</h2>
            <p class="parrafo1">Buscando mantenerse informativo sobre la ciberseguridad<br>
                para conocer como se mueve el entorno<br>
                y su transformación digital.</p>
            <img src="../img/podcast/avatar-con-audifonos-05.svg" alt="Audifonos" class="audifonos">
        </div>
        <div class="separador"></div>
        <div class="unete">
            <img src="../img/podcast/avatar-invitación-05.svg" alt="Unete" class="invitacion">          
            <h2 class="titulos2">Únete a la comunidad</h2>
            <p class="parrafo2">Comparte noticias relevantes, ten conversaciones importantes
                sobre ellas, accede a los episodios por adelantado, a eventos
                especiales de forma online, promociona tus proyectos y mantente
                al día de lo que nos une, la ciberseguridad, el desarrollo de
                software y la transformación digital</p>
            <a href="https://t.me/kyaNewsVipCommunity" target="_blank"><p class="grupovip1">Grupo Vip Telegram</p></a>
            <img src="../img/podcast/boton-telegram-05.svg" alt="Grupo Vip Telegram" class="telegram">
            <a href="https://discord.gg/XQXGZ6JWFu" target="_blank"><p class="grupovip2">Grupo Vip Discord</p></a>
            <img src="../img/podcast/boton-discord-05.svg" alt="Grupo Vip Discord" class="discord">
        </div>
    </div>
    <a href="https://wa.me/message/46NEEW6YV5PQH1" target="_blank"> <img src="../img/chatWhatsapp/icono_boton_whatsapp_verde.svg" alt="Chat" width="50px" class="chat"></a>
    <?php include("../footer/footer.php"); ?>
</body>

</html>

