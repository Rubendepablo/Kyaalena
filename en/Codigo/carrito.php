
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
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
                    $mensaje .= "OK ID correct " . $ID . "<br/>";
                } else {
                    $mensaje .= "Upss... ID incorrect " . $ID . "<br/>";
                }
                if (openssl_decrypt($_POST['nombre'], COD, KEY)) {

                    $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
                    $mensaje .= "OK price " . $NOMBRE . "<br/>";
                } else {
                    $mensaje .= "Upss... something is wrong with the name" . $NOMBRE . "<br/>";
                    break;
                }
                if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {

                    $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
                    $mensaje .= "OK price " . $CANTIDAD . "<br/>";
                } else {
                    $mensaje .= "Upss... something is wrong with the quantity " . $CANTIDAD . "<br/>";
                    break;
                }
                if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {

                    $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
                    $mensaje .= "OK price " . $PRECIO . "<br/>";
                }  if ($_POST['talla']) {

                    $TALLA = $_POST['talla'];
                    $mensaje .= "OK price " . $TALLA . "<br/>";
                }
                else {
                    $mensaje .= "Upss... ID incorrect <br/>";
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
                    $mensaje = "Product added to your shopping cart";
                } else {

                    $idProductos = array_column($_SESSION['CARRITO'], "ID");
                    if (in_array($ID, $idProductos)) {
                        echo "<script>alert('The product is already in your shopping cart.')</script>";
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
                        $mensaje = "Product added to your shopping cart";
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
                            echo "<script>alert('Deleted element')</script>";
                        }
                    }
                } else {
                    $mensaje .= "Upss... ID incorrect " . $ID . "<br/>";
                }
                break;
        };
    }
    ?>
</body>

</html>