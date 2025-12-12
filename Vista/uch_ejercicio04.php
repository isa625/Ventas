<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Calculos salariales de los empleados</h1>
    <form method="POST">
        Categoria: 
        <select name="categoria" id="">
            <option value="E1" <?php echo (($_POST['categoria'] ?? '') == 'E1') ? 'selected' : ''; ?>>E1</option>
            <option value="E2" <?php echo (($_POST['categoria'] ?? '') == 'E2') ? 'selected' : ''; ?>>E2</option>
            <option value="E3" <?php echo (($_POST['categoria'] ?? '') == 'E3') ? 'selected' : ''; ?>>E3</option>
            <option value="E4" <?php echo (($_POST['categoria'] ?? '') == 'E4') ? 'selected' : ''; ?>>E4</option>
        </select>
        <br>
        Importe vendido:
        <input type="text" name="importeVendido" id="" value="<?php echo $_POST['importeVendido'] ?? 0; ?>">
        <br>
        <input type="submit" value="Calcular">
    </form>
    <?php
    if($_POST){
        $importeVendido = $_POST['importeVendido'];
        $sueldoBasico = match ($_POST['categoria']) {
            'E1' => 2500,
            'E2' => 2250,
            'E3' => 2000,
            'E4' => 1850,
            default => 0
        };
        
        $comision = $importeVendido * match (true) {
            ($importeVendido >= 9000) => 0.11,
            ($importeVendido >= 6000 && $importeVendido < 9000) => 0.09,
            ($importeVendido >= 3000 && $importeVendido < 6000) => 0.07,
            ($importeVendido < 3000) => 0.05,
        };
        $sueldoBruto =$sueldoBasico + $comision;
        $descuento = 0.15 * $sueldoBruto;
        $sueldoNeto = $sueldoBruto - $descuento;

        echo "La comision es: ".$comision."<br>";
        echo "El sueldo basico es: ".$sueldoBasico."<br>";
        echo "El sueldo bruto es: ".$sueldoBruto."<br>";
        echo "El descuento es: ".$descuento."<br>";
        echo "El sueldo neto es: ".$sueldoNeto."<br>";
    }
    ?>
</body>
</html>