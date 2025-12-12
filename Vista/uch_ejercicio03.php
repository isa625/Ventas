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
        <input type="text" name="cantidad" id="" value="<?php echo $_POST['cantidad'] ?? ''; ?>">
        <br>
        Turno:
        <select name="turno" id="">
            <option value="mañana" <?php echo (($_POST['turno'] ?? '') == 'mañana') ? 'selected' : ''; ?>>Mañana</option>
            <option value="tarde" <?php echo (($_POST['turno'] ?? '') == 'tarde') ? 'selected' : ''; ?>>Tarde</option>
            <option value="noche" <?php echo (($_POST['turno'] ?? '') == 'noche') ? 'selected' : ''; ?>>Noche</option>
        </select>
        <br>
        <input type="submit" value="Enviar formulario">
    </form>
    <?php
    if($_POST){
        $cantidad = $_POST['cantidad'] ?? 0;
        $importeCompra = $cantidad * match ($_POST['turno']) {
           'mañana'  => 30.0,
           'tarde'  => 35.0,
           'noche'  => 42.5,
           default  => 0
        };

        if($cantidad > 5){
            $descuento = 0.05 * $importeCompra;
        }else{
            $descuento = 0;
        }
        $importeTotal = $importeCompra - $descuento;

        if ($cantidad <= 3) {
            $caramelos = 3;
        }elseif ($cantidad > 3 && $cantidad <= 6) {
            $caramelos = 4;
        }else{
            $caramelos = 5;
        }
        $obsequio = $cantidad * $caramelos;
        
        echo "El importe de compra es: ".$importeCompra."<br>";
        echo "El importe de descuento es: ".$descuento."<br>";
        echo "El importe de caramelos es: ".$obsequio."<br>";
        echo "El importe total es: ".$importeTotal;
    }
    ?>
</body>
</html>