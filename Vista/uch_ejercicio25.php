<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Nota 1:
        <input type="text" name="nota1" id="" value="<?php echo $_POST['nota1'] ?? ''; ?>">
        <br>
        Nota 2:
        <input type="text" name="nota2" id="" value="<?php echo $_POST['nota2'] ?? ''; ?>">
        <br>
        Nota 3:
        <input type="text" name="nota3" id="" value="<?php echo $_POST['nota3'] ?? ''; ?>">
        <br>
        Examen final:
        <input type="text" name="examenFinal" id="" value="<?php echo $_POST['examenFinal'] ?? ''; ?>">
        <br>
        Trabajo final:
        <input type="text" name="trabajoFinal" id="" value="<?php echo $_POST['trabajoFinal'] ?? ''; ?>">
        <br>
        <input type="submit" value="Calcular">
    </form>
    <?php
    if($_POST){
        $calificaciones = [$_POST['nota1'],$_POST['nota2'],$_POST['nota3']];
        $parte01 = 0.55 * (array_sum($calificaciones)/count($calificaciones));
        $parte02 = 0.3 * ($_POST['examenFinal']);
        $parte03 = 0.15 * ($_POST['trabajoFinal']);

        echo "El 55% del promedio de sus 3 calificaciones parciales es: ".$parte01."<br>";
        echo "El 30% de la calificacion del examen final es: ".$parte02."<br>";
        echo "El 15% de la calificacion de su trabajo final es: ".$parte03."<br>";
        echo "La calificacion final es: ".array_sum([$parte01,$parte02,$parte03]);
    };
    ?>
</body>
</html>
<?php
    /*Un alumno desea saber cuál será su calificación final en la materia de Algoritmos. Dicha calificación se compone de los siguientes porcentajes:
55% del promedio de sus tres calificaciones parciales.
30% de la calificación del examen final.
15% de la calificación de un trabajo final.*/
?>