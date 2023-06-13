<?php
session_start();
include("./conect_class.php");
include("./carrito.php");

?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geschäft</title>
    <link href="../css/tienda.css" type="text/css" rel="stylesheet">
</head>

<body>
<?php
    include("../navegador/navTienda.php");
    ?>
    <div class="container">
        <br>
        <?php if ($mensaje != "") { ?>
            <div class="alert alert-success">
                <?php
                echo $mensaje;
                // print_r($_POST);
                ?>
                <a href="./mostrarCarrito.php" class="badge badge-success ">Warenkorb ansehen</a>
            </div>
        <?php } ?>
        <?php if (!isset($_SESSION['usuario'])) { ?>
            <div class="alert alert-success">
                <?php
                echo 'Zum Kaufen anmelden';
                // print_r($_POST);
                ?>
            </div>
        <?php } ?>
        <h1 id="sueters">Pullover</h1>
        <div class="row">
            <?php
            $noProductos = false; // Variable de control
            $sentencia = $MyBBDD->consulta("SELECT * FROM `productos` WHERE tipo = 'sueter'");
            while ($fila = $MyBBDD->extraer_registro()) {
                // print_r($fila);
            ?>
                <div class="col-5">
                    <div class="card">
                        <img title="<?php echo $fila['nombre']; ?>" alt="<?php echo $fila['nombre']; ?>" class="card-img-top" src="<?php echo $fila['imagen']; ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo $fila['descripcion']; ?>" width="317px" />
                        <div class="card-body">
                            <span></span>
                            <h5 class="card-title"><?php echo $fila['precio']; ?>€</h5>
                            <p class="card-text">Beschreibung</p>

                            <form action="" method="POST">
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($fila['id_producto'], COD, KEY); ?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($fila['nombre'], COD, KEY); ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($fila['precio'], COD, KEY); ?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                                <label class="talla"><b>Wählen Sie Ihre Größe:</b></label>
                                <select name="talla" id="talla" class="talla">
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                                <?php
                                if (isset($_SESSION['usuario'])) {
                                ?>
                                    <button class="agregar" name="btnAccion" value="Hinzufügen" type="submit">
                                    In den Warenkorb legen
                                    </button>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                $noProductos = true;
            }
            if (!$noProductos) {
                echo '<p class="proximamente">Demnächst verfügbar...</p>';
            } ?>
        </div>
        <h1 id="camisetas">T-Shirts</h1>
        <div class="row">
            <?php
            $noProductos = false; // Variable de control
            $sentencia = $MyBBDD->consulta("SELECT * FROM `productos` WHERE tipo = 'camisetas'");
            while ($fila = $MyBBDD->extraer_registro()) {
                // print_r($fila);
            ?>
                <div class="col-5">
                    <div class="card">
                        <img title="<?php echo $fila['nombre']; ?>" alt="<?php echo $fila['nombre']; ?>" class="card-img-top" src="<?php echo $fila['imagen']; ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo $fila['descripcion']; ?>" width="317px" />
                        <div class="card-body">
                            <span></span>
                            <h5 class="card-title"><?php echo $fila['precio']; ?>€</h5>
                            <p class="card-text">Beschreibung</p>

                            <form action="" method="POST">
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($fila['id_producto'], COD, KEY); ?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($fila['nombre'], COD, KEY); ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($fila['precio'], COD, KEY); ?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                                <label class="talla"><b>Wählen Sie Ihre Größe:</b></label>
                                <select name="talla" id="talla" class="talla">
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                                <?php
                                if (isset($_SESSION['usuario'])) {
                                ?>
                                    <button class="agregar" name="btnAccion" value="Hinzufügen" type="submit">
                                    In den Warenkorb legen
                                    </button>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                $noProductos = true;
            }
            if (!$noProductos) {
                echo '<p class="proximamente">Demnächst verfügbar...</p>';
            } ?>
        </div>
        <h1 id="stickers">Aufkleber</h1>
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <img title="kyaalena Avatar" class="card-img-top" src="../img/tienda/stickers/1666615542.webp" data-toggle="popover" data-trigger="hover" data-content="Personalisierte Aufkleber mit
Avatar-Bildern im Metaverse-Stil." width="200px" />
                    <div class="card-body">
                        <div class="flex-row">
                            <button class="agregar boton-s">
                                <a href="https://t.me/addstickers/kyaalenaAvatar"> <img src="../img/tienda/stickers/store_icono_boton_descarga_sticker_telegram.svg" alt="Telegram" style="width: 30px;" />
                                </a>
                            </button>
                            <button class="agregar boton-s">
                                <a href="../img/tienda/stickers/stickers kyaalena avatar.zip" download="stickers kyaalena avatar.zip"><img src="../img/tienda/stickers/store_icono_boton_descarga_sticker_whatsapp.svg" alt="Whatsapp" style="width: 30px;" /></a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card">
                    <img title="kyaalena Developer" class="card-img-top" src="../img/tienda/stickers/sticker_1.webp" data-toggle="popover" data-trigger="hover" data-content="Personalisierte Aufkleber mit Fotos und typischen Sprüchen der Fachleute im Technologiesektor.
Technologie." width="200px" />
                    <div class="card-body">
                        <div class="flex-row">
                            <button class="agregar boton-s">
                                <a href="https://t.me/addstickers/kyaalenaInterplay"> <img src="../img/tienda/stickers/store_icono_boton_descarga_sticker_telegram.svg" alt="Telegram" style="width: 30px;" />
                                </a>
                            </button>
                            <button class="agregar boton-s">
                                <a href="../img/tienda/stickers/stickers kyaalena Developer.zip" download="stickers kyaalena Developer.zip"><img src="../img/tienda/stickers/store_icono_boton_descarga_sticker_whatsapp.svg" alt="Whatsapp" style="width: 30px;" /></a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card">
                    <img title="kyaalena Interplay" class="card-img-top" src="../img/tienda/stickers/sticker_2.webp" data-toggle="popover" data-trigger="hover" data-content="Interaktionssticker mit Symbolen und Arbeitswörtern oder Sätzen zur Verwendung in Gruppen" width="200px" />
                    <div class="card-body">
                        <div class="flex-row">
                            <button class="agregar boton-s">
                                <a href="https://t.me/addstickers/kyaalenaInterplay"> <img src="../img/tienda/stickers/store_icono_boton_descarga_sticker_telegram.svg" alt="Telegram" style="width: 30px;" />
                                </a>
                            </button>
                            <button class="agregar boton-s">
                                <a href="../img/tienda/stickers/stickers kyaalena interplay.zip" download="stickers kyaalena interplay.zip"><img src="../img/tienda/stickers/store_icono_boton_descarga_sticker_whatsapp.svg" alt="Whatsapp" style="width: 30px;" />
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 id="botellas">Flaschen</h1>
        <div class="row">
            <?php
            $noProductos = false; // Variable de control
            $sentencia = $MyBBDD->consulta("SELECT * FROM `productos` WHERE tipo = 'botellas'");
            while ($fila = $MyBBDD->extraer_registro()) {
                // print_r($fila);
            ?>
                <div class="col-5">
                    <div class="card">
                        <img title="<?php echo $fila['nombre']; ?>" alt="<?php echo $fila['nombre']; ?>" class="card-img-top" src="<?php echo $fila['imagen']; ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo $fila['descripcion']; ?>" width="317px" />
                        <div class="card-body">
                            <span></span>
                            <h5 class="card-title"><?php echo $fila['precio']; ?>€</h5>
                            <p class="card-text">Beschreibung</p>

                            <form action="" method="POST">
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($fila['id_producto'], COD, KEY); ?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($fila['nombre'], COD, KEY); ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($fila['precio'], COD, KEY); ?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                                <?php
                                if (isset($_SESSION['usuario'])) {
                                ?>
                                    <button class="agregar" name="btnAccion" value="Hinzufügen" type="submit">
                                    In den Warenkorb legen
                                    </button>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                $noProductos = true;
            }
            if (!$noProductos) {
                echo '<p class="proximamente">Demnächst verfügbar...</p>';
            }
            ?>
        </div>
        <script>
            $(function() {
                $('[data-toggle="popover"]').popover()
            });
        </script>
    </div>
    <a href="https://wa.me/message/46NEEW6YV5PQH1" target="_blank"> <img src="../img/chatWhatsapp/icono_boton_whatsapp_lila.svg" alt="Chat" width="50px" class="chat"></a>
    <?php include("../footer/footerTienda.php");?>
</body>

</html>