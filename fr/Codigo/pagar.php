<?php
session_start();
include "./conect_class.php";
include "./carrito.php";
include("../navegador/navTienda.php");
echo '<link href="../css/pagar.css" type="text/css" rel="stylesheet">';
?>

<?php


if ($_POST) {
    $total = 0;
    $SID = session_id();
    $direccion = $_POST['direccion'];
    $id_usuario = $_SESSION['usuario'];

    $MyBBDD->consulta("INSERT INTO `pedidos` 
    (`id_pedido`,`fecha`, `id_usuario`)
    VALUES ('$SID', NOW(), '$id_usuario');");

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']);
    }

    $MyBBDD->consulta("INSERT INTO `pagos` 
        (`id_pago`, `clave_transaccion`, `PayPal_datos`, `fecha`, `total`, `status`) 
        VALUES (NULL, '$SID', '', NOW(), '$total', '0');");

    $MyBBDD->consulta("UPDATE `usuarios` SET direccion = '$direccion' WHERE id_usuario = '$id_usuario'");

    $MyBBDD->consulta("INSERT INTO `pedidos` (`fecha`, `id_usuario`) VALUES (NOW(), '$id_usuario')");

    $id_pedido = $MyBBDD -> ultimo_id();

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $cantidad = $producto['CANTIDAD'];
        $talla = $producto['TALLA'];
        $id_producto = $producto['ID'];
        $MyBBDD->consulta("INSERT INTO productos_pedidos (cantidad,id_producto, id_pedido, talla) VALUES ($cantidad, $id_producto, $id_pedido,'$talla')"); 
    }
    // echo "<h3>" . $total . "</h3>";
} else {
    $total = 0;
    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']);
    }
}
// print($total);

?>
<style>
    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
            width: 100%;
        }
    }

    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
            display: inline-block;
            width: 250px;
        }
    }
</style>
<div class="jumbotron text-center" style="margin-bottom: 0px;">
    <h1 class="display-4">¡Dernière étape!</h1>
    <hr class="my-4">
    <p class="lead">Vous êtes sur le point de payer le montant de:
    <h4><?php echo $total ?> €</h4>
    <div id="paypal-button-container"></div>
    </p>
    <p class="descargados">
    Les produits seront disponibles au téléchargement une fois le paiement effectué.
    </p>
    <img class="element-back" src="../img/elementos/53.svg" alt="53">
    <img class="element-back second" src="../img/elementos/05.svg" alt="05">

</div>
<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $total; ?>'
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                // Replace the above to show a success message within this page, e.g.
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '';
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });

            // Para examen, otra forma de onAprove:
            /*
            onAuthorize: function(data,actions){
                return actions.payment.execute().then(function(){
                    console.log(data);
                })
            }
            */
        }
    }).render('#paypal-button-container');
</script>
<?php
include("../footer/footerTienda.php");
?>