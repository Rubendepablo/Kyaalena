<!DOCTYPE html>
<html lang="de">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
</head>

<body>
    <div class="menu-btn">
        <i class="fas fa-bars fa-2x"></i>
    </div>
    <nav class="nav-main">
        <!-- Brand -->
        <a href="./index.php"><img src="../img/Logo PNG/Isotipo Kya.svg" alt="Kyaalena" class="nav-brand"></a>
        <!-- Left Nav -->
        <ul class="nav-menu">
            <li>
                <a href="./index.php">Startseite</a>
            </li>
            <li>
                <a href="./conoceme.php">Lernen Sie mich kennen</a>
            </li>
            <li>
                <a href="./servicios.php">Dienstleistungen</a>
            </li>
            <li>
                <a href="./podcast.php">Podcast</a>
            </li>
            <li>
                <a href="./tienda.php">Geschäft</a>
            </li>
            <li>
                <a href="./contacto.php">Kontakt</a>
            </li>
            <li>
                <a href="#"><img src="../img/Banner/icono_translate_mundo.svg" class="translate_mundo"></a>

                <select name="idiomas" id="language-select" class="idiomas">
                    <option id="submenu" class="submenu" value="es">ES</option>
                    <option id="submenu" class="submenu" value="en">EN</option>
                    <option id="submenu" class="submenu" value="fr">FR</option>
                    <option id="submenu" class="submenu" value="de" selected>DE</option>
                </select>
            </li>
            <li>
                <button type="button" class="whatsletter-btn" id="whatsletter-btn">
                    <a href="#div_whatsletter">Whatsletter</a>
                </button>
            </li>
        </ul>


    </nav>
    <script>
    document.getElementById("language-select").addEventListener("change", function() {
        let selectedValue = this.value;
        if (selectedValue === "es") {
            window.location.href = "../../Codigo/index.php";
        }
        if (selectedValue === "en") {
            window.location.href = "../../en/Codigo/index.php";
        }
        if (selectedValue === "fr") {
            window.location.href = "../../fr/Codigo/index.php";
        }
    });
</script>

    <!-- Scroll Reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Custom JS-->
    <script src="../js/scrollResponsive.js"></script>
</body>

</html>

