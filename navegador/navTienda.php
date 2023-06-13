<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/navTienda.css">
</head>

<body>
    <div class="menu-btn">
        <i class="fas fa-bars fa-2x"></i>
    </div>
    <nav class="nav-main">
        <!-- Brand -->
        <a href="./tienda.php"><img src="../img/Logo PNG/Imagotipo horizontal Kya.svg" alt="Kyaalena" class="nav-brand"></a>

        <!-- Left Nav -->
        <ul class="nav-menu">
            <li>
                <a href="#sueters">Sueters</a>
            </li>
            <li>
                <a href="#camisetas">Camisetas</a>
            </li>
            <li>
                <a href="#stickers">Stickers</a>
            </li>
            <li>
                <a href="#botellas">Botellas</a>
            </li>
            <li>
                <a href="./index.php">Kyaalena</a>
            </li>
            <li>
                <a href="./podcast.php">Podcast</a>
            </li>
            <li>
                <img src="../img/Banner/icono_translate_mundo.svg" class="translate_mundo">

                <select name="idiomas" id="language-select" class="idiomas">
                    <option id="submenu" class="submenu" value="es" selected>ES</option>
                    <option id="submenu" class="submenu" value="en">EN</option>
                    <option id="submenu" class="submenu" value="fr">FR</option>
                    <option id="submenu" class="submenu" value="de">DE</option>
                </select>

            </li>
            <li>
                <a href="#"><img src="../img/Banner/store_buscar.svg" alt="Buscador" class="Buscador" width="20px"></a>
            </li>

            <li>
                <div class="dropdown">
                    <a><img src="../img/Banner/store_user.svg" width="20px" alt="Perfil"></a>
                    <div class="dropdown-content">
                        <button class="cerrar" onclick="location.reload()"><img src="../img/Perfil/store_perfil_de_usuario_cerrar.svg" width="20px" alt="cerrar"></button>

                        <?php
                        if (isset($_SESSION['usuario'])) {
                            $MyBBDD->consulta("SELECT * FROM usuarios WHERE id_usuario = '" . $_SESSION['usuario'] . "'");
                            while ($fila = $MyBBDD->extraer_registro()) {
                                echo  '<p class="cuenta">' . $fila['nombre'] . $fila['apellidos'] . " </p>";
                                echo  '<a href="../Codigo/perfil.php">Mi cuenta</a>
                                    <a href="../Codigo/logout.php">Cerrar Sesion</a>';
                                echo '<form action="#" method="post" class="fcambio">
                                        <input type="hidden" name="id_usuario" value="' . $fila['id_usuario'] . '">
                                    </form> ';
                            }
                        } else {
                            echo '<a href="../Codigo/login.php">Inicio de sesión</a>
                            <a href="../Codigo/registro.php">Registrarse</a>';
                        }
                        ?>
                    </div>
                </div>
            </li>
            <?php
            if (isset($_SESSION['usuario'])) {
                echo  '<li>
                        <a href="./mostrarCarrito.php"><img src="../img/Banner/store_bolsa_compras.svg" alt="Carrito" class="Carrito" width="20px"></a>
                       </li>';
            }
            ?>
        </ul>
    </nav>
    <script>
        document.getElementById("language-select").addEventListener("change", function() {
            let selectedValue = this.value;
            if (selectedValue === "en") {
                window.location.href = "../en/Codigo/tienda.php";
            }
            if (selectedValue === "fr") {
                window.location.href = "../fr/Codigo/tienda.php";
            }
            if (selectedValue === "de") {
                window.location.href = "../de/Codigo/tienda.php";
            }
        });
    </script>
    <!-- Scroll Reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Custom JS-->
    <script src="../js/scrollResponsive.js"></script>

</body>

</html>