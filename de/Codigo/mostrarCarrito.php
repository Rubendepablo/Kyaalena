<?php
session_start();
include "./conect_class.php";
include "./carrito.php";
include("../navegador/navTienda.php");
echo '<link href="../css/mostrarCarrito.css" type="text/css" rel="stylesheet">';
?>
<div class="container-box">

<br />
<h3 class="title"><img src="../img/Banner/store_bolsa_compras.svg" alt="Carrito" class="Carrito" width="20px"> Lista del carrito</h3>
<?php
//print_r($_SESSION['usuario']);
//print_r($_SESSION['CARRITO']);
if (!empty($_SESSION['CARRITO'])) {
?>
    <div class="container center-table">
        <table class="table table-light table-bordered">
            <tbody>
                <tr>
                    <th width="40%">Beschreibung</th>
                    <th width="15%" class="text-center">Menge</th>
                    <th width="20%" class="text-center">Größe</th>
                    <th width="20%" class="text-center">Preis</th>
                    <th width="20%" class="text-center">Insgesamt</th>
                    <th width="5%">--</th>
                </tr>
                <?php
                $total = 0;
                ?>
                <?php
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                ?>
                    <tr>
                        <td width="40%"><?php echo $producto['NOMBRE']; ?></td>
                        <td width="15%" class="text-center"><?php echo $producto['CANTIDAD']; ?></td>
                        <td width="15%" class="text-center"><?php echo $producto['TALLA']; ?></td>
                        <td width="10%" class="text-center"><?php echo $producto['PRECIO']; ?></td>
                        <td width="10%" class="text-center"><?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2); ?></td>
                        <td width="10%">
                            <form action="" method="post">
                                <input type="hidden" name="id" value=" <?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                                <button class="btn-danger" type="submit" name="btnAccion" value="Eliminar">Löschen</button>
                            </form>
                        </td>
                    </tr>
                <?php
                    $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']);
                }
                ?>
                <tr>
                    <td colspan="4" align="right">
                        <h3>Total</h3>
                    </td>
                    <td align="right">
                        <h3><?php echo number_format($total, 2); ?> €</h3>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="6">
                        <form action="pagar.php" method="post">
                            <div class="alert">
                                <div class="form-group">
                                    <label for="my-input">Wohnanschrift: </label>
                                    <input id="direccion" name="direccion" class="form-control" type="text" placeholder="Bitte geben Sie Ihre Adresse ein" required>
                                </div>
                                <div class="nada">
                                    <small id="direccionHelp" class="form-text">
                                    Die Produkte werden an diese Adresse verschickt.
                                    </small>
                                </div>
                            </div>
                            <button class="btn-pay" type="submit" name="btnAccion" value="weiter zu">
                            Weiter zur Bezahlung >>
                            </button>

                        </form>

                    </td>
                </tr>

            </tbody>
        </table>
    </div>

<?php
} else {
?>
    <div class="alert alert-success">
    Es befinden sich keine Produkte in Ihrem Einkaufswagen...
    </div>
<?php
}
?>
</div>
<?php
include("../footer/footerTienda.php");
?>