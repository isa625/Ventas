<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ruta de Lima-Huanuco</h1>
    <form method="post">
        Cantidad:
        <input type="text" name="cantidad" id=""value="<?php echo $_POST['cantidad'] ?? ''; ?>">
        <br>
        Turno:
        <input type="text" name="turno" id="" value="<?php echo $_POST['turno'] ?? ''; ?>">
    </form>
    <?php
    if($_POST){
        /*$importeCompra = 0;
        if ($turno == 'Mañana') {
            $precio = 30.0;
        }elseif($turno == 'Tarde'){
            $precio = 35.0;
        }else{
            $precio = 42.5;
        }
        return $importeCompra = $cantidad * $precio;

        $importeCompra = ($_POST['cantidad'])*/

    }
    ?>
</body>
</html>