<?php 
include '../Datos/Conexion.php';
include '../Datos/Compras.php';

$objCompras = new Compras();
$listadoCompras = $objCompras->listar();

$compra = null;
if (intval($_GET['id'] ?? 0) > 0) {
    $compra = $objCompras->encontrar(intval($_GET['id'] ?? 0));
}

if ($_POST) {
    $accion = $_POST['accion'];
    unset($_POST['accion']);
    call_user_func([$objCompras, $accion], (object) $_POST);
    header('location: caso2.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <div>
            <label for="producto">Producto</label>
            <input type="hidden" name="idcompra" id="idcompra" value="<?= $compra->idcompra ?? ''; ?>" />
            <input type="hidden" name="accion" id="accion" value="<?= $_GET['accion'] ?? 'crear'; ?>" />
            <input type="text" name="producto" id="producto" value="<?= $compra->producto ?? ''; ?>" />
        </div>
        <div>
            <label for="precioUnitario">Precio unitario</label>
            <input type="text" name="precioUnitario" id="precioUnitario" value="<?= $compra->precioUnitario ?? ''; ?>" />
        </div>
        <div>
            <label for="cantidad">Cantidad</label>
            <input type="text" name="cantidad" id="cantidad" value="<?= $compra->cantidad ?? ''; ?>" />
        </div>
        <?php if (($_GET['accion'] ?? '') === 'ver') { ?>
            <div>
                <label for="importe">Importe</label>
                <input type="text" id="importe" value="<?= $compra->importe ?? ''; ?>" readonly />
            </div>
            <div>
                <label for="descuento">Descuento</label>
                <input type="text" id="descuento" value="<?= $compra->descuento ?? ''; ?>" readonly />
            </div>
            <div>
                <label for="importePagar">Importe a pagar</label>
                <input type="text" id="importePagar" value="<?= $compra->importePagar ?? ''; ?>" readonly />
            </div>
            <div>
                <label for="obsequio">Obsequio</label>
                <input type="text" id="obsequio" value="<?= $compra->obsequio ?? ''; ?>" readonly />
            </div>
        <?php } else { ?>
            <input type="submit" value="<?= $_GET['accion'] ?? 'crear' ?>">
        <?php } ?>
        <a href="caso2.php">Cancelar</a>
    </form>
    <table border="1">
        <tr>
            <td>#</td>
            <td>Producto</td>
            <td>Precio unitario</td>
            <td>Cantidad</td>
            <td>Importe</td>
            <td>Descuento</td>
            <td>Total</td>
            <td>Caramelos de regalo</td>
            <td colspan="3"></td>
        </tr>
        <?php foreach ($listadoCompras as $compra) { ?>
            <tr>
                <td><?= $compra->idcompra; ?></td>
                <td><?= $compra->producto; ?></td>
                <td><?= $compra->precioUnitario; ?></td>
                <td><?= $compra->cantidad; ?></td>
                <td><?= $compra->importe; ?></td>
                <td><?= $compra->descuento; ?></td>
                <td><?= $compra->importePagar; ?></td>
                <td><?= $compra->obsequio; ?></td>
                <td>
                    <a href="caso2.php?<?= http_build_query([
                        'id' => $compra->idcompra,
                        'accion' => 'ver'
                    ]);?>">Ver</a>
                </td>
                <td>
                    <a href="caso2.php?<?= http_build_query([
                        'id' => $compra->idcompra,
                        'accion' => 'actualizar'
                    ]);?>">Actualizar</a>
                </td>
                <td>
                    <a href="caso2.php?<?= http_build_query([
                        'id' => $compra->idcompra,
                        'accion' => 'eliminar'
                    ]);?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="4" align="right">Resumen de compras</td>
            <td><?= array_sum(array_column($listadoCompras, 'importe')); ?></td>
            <td><?= array_sum(array_column($listadoCompras, 'descuento'));?></td>
            <td><?= array_sum(array_column($listadoCompras, 'importePagar'));?></td>
            <td colspan="4"></td>
        </tr>
    </table>
</body>
</html>