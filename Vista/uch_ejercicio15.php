<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Sueldo base: 
        <input type="text" name="sueldoBase" value="<?php echo $_POST['sueldoBase'] ?? ''; ?>">
        <br>
        Venta 1:
        <input type="text" name="venta1" id="" value="<?php echo $_POST['venta1'] ?? ''; ?>">
        <br>
        Venta 2:
        <input type="text" name="venta2" id="" value="<?php echo $_POST['venta2'] ?? ''; ?>">
        <br>
        Venta 3:
        <input type="text" name="venta3" id="" value="<?php echo $_POST['venta3'] ?? ''; ?>">
        <br>
        <input type="submit" value="Enviar formulario">
    </form>
    <?php
    if ($_POST) {
        $ventasTotales = ($_POST['venta1']+$_POST['venta2']+$_POST['venta3']);
        $comisiones = (0.1 * $ventasTotales);
        $sueldoTotal = $_POST['sueldoBase'] + $comisiones;

        echo "El concepto por comisiones es: ".$comisiones."<br>";
        echo "El sueldo total es: ".$sueldoTotal;
    }
    ?>
</body>
</html>