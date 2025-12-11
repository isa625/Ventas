<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Presupuesto total:
        <input type="text" name="presupuestoTotal" id="" value="<?php echo $_POST['presupuestoTotal']?? ''; ?>">
        <input type="submit" value="Enviar formulario">
    </form>
    <?php if($_POST){

        /* Lima norte : 45% del presupuesto
        Lima centro : 50% de lo que recibe Lima norte
        Lima sur : 20% de lo que reciben Lima norte y Lima centro juntos
        Lima este : 35% de Lima sur
        Lima oeste : el resto */

        $limaNorte = 0.45 * $_POST['presupuestoTotal'];
        $limaCentro = 0.5 * $limaNorte;
        $limaSur = 0.2 * ($limaNorte + $limaCentro);
        $limaEste = 0.35 * $limaSur;
        $limaOeste = $_POST['presupuestoTotal'] - array_sum([
            $limaNorte,
            $limaCentro,
            $limaSur,
            $limaEste
        ]);
        echo "Presupuesto Lima Norte: ".$limaNorte."<br>";
        echo "Presupuesto Lima Centro: ".$limaCentro."<br>";
        echo "Presupuesto Lima Sur: ".$limaSur."<br>";
        echo "Presupuesto Lima Este: ".$limaEste."<br>";
        echo "Presupuesto Lima Oeste: ".$limaOeste."<br>";
    } ?>
</body>
</html>