
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <?php
    $currentPage = 'tienda';
    ?>
</head>


<body>
<?php
    $mensaje = "";

    if (isset($_POST['btnAccion']) ) {

        switch ($_POST['btnAccion']) {

            case "Agregar":
                if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                    $ID = openssl_decrypt($_POST['id'], COD, KEY);
                    $mensaje .= "OK ID correcto " . $ID . "<br/>";
                } else {
                    $mensaje .= "Upss... ID incorrecto " . $ID . "<br/>";
                }
                if (openssl_decrypt($_POST['nombre'], COD, KEY)) {

                    $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
                    $mensaje .= "OK precio " . $NOMBRE . "<br/>";
                } else {
                    $mensaje .= "Upss... algo pasa con el nombre" . $NOMBRE . "<br/>";
                    break;
                }
                if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {

                    $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
                    $mensaje .= "OK precio " . $CANTIDAD . "<br/>";
                } else {
                    $mensaje .= "Upss... algo pasa con la cantidad " . $CANTIDAD . "<br/>";
                    break;
                }
                if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {

                    $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
                    $mensaje .= "OK precio " . $PRECIO . "<br/>";
                }  if ($_POST['talla']) {

                    $TALLA = $_POST['talla'];
                    $mensaje .= "OK precio " . $TALLA . "<br/>";
                }
                else {
                    $mensaje .= "Upss... ID incorrecto <br/>";
                    break;
                }

                if (!isset($_SESSION['CARRITO'])) {

                    $producto = array(
                        'ID' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'CANTIDAD' => $CANTIDAD,
                        'PRECIO' => $PRECIO,
                        'TALLA' => $TALLA
                    );
                    $_SESSION['CARRITO'][0] = $producto;
                    $mensaje = "Producto agregado al carrito";
                } else {

                    $idProductos = array_column($_SESSION['CARRITO'], "ID");
                    if (in_array($ID, $idProductos)) {
                        echo "<script>alert('El producto ya está en el carrito.')</script>";
                        $mensaje = "";
                    } else {
                        $NumeroProductos = count($_SESSION['CARRITO']);
                        $producto = array(
                            'ID' => $ID,
                            'NOMBRE' => $NOMBRE,
                            'CANTIDAD' => $CANTIDAD,
                            'PRECIO' => $PRECIO,
                            'TALLA' => $TALLA
                        );
                        $_SESSION['CARRITO'][$NumeroProductos] = $producto;
                        $mensaje = "Producto agregado al carrito";
                    }
                }
                // $mensaje = print_r($_SESSION, true);

                break;

            case "Eliminar":
                if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                    $ID = openssl_decrypt($_POST['id'], COD, KEY);
                    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                        if ($producto['ID'] == $ID) {
                            unset($_SESSION['CARRITO'][$indice]);
                            //Para mostar que está eliminado
                            echo "<script>alert('Elemento borrado')</script>";
                        }
                    }
                } else {
                    $mensaje .= "Upss... ID incorrecto " . $ID . "<br/>";
                }
                break;
        };
    }
    ?>
</body>

</html>