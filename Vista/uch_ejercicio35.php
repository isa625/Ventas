<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <hr>
        <h3>Matemáticas</h3>
        Examen:
        <input type="text" name="examenMate" id="" value="<?php echo $_POST['examenMate'] ?? ''; ?>">
        <br>
        <?php for ($i=1; $i < 4 ; $i++) { ?>
            Tarea <?php echo $i ?>
            <input type="text" name="tareaMate<?php echo $i ?>" id="" value="<?php echo $_POST['tareaMate'.$i] ??''; ?>">
            <br>
        <?php } ?>
        <hr>
        <h3>Fisica</h3>
        Examen:
        <input type="text" name="examenFisica" value="<?php echo $_POST['examenFisica'] ?? ''; ?>">
        <br>
        <?php for ($i=1; $i < 3 ; $i++) { ?>
            Tarea <?php echo $i?>
            <input type="text" name="tareaFisica<?php echo $i ?>" value="<?php echo $_POST['tareaFisica'.$i] ?? ''; ?>">
            <br>
        <?php } ?>
        <hr>
        <h3>Quimica</h3>
        Examen:
        <input type="text" name="examenQuimica" value="<?php echo $_POST['examenQuimica'] ?? ''; ?>">
        <br>
        <?php for ($i=1; $i < 4 ; $i++) { ?>
            Tarea <?php echo $i ?>
            <input type="text" name="tareaQuimica<?php echo $i ?>" id="" value="<?php echo $_POST['tareaQuimica'.$i] ?? ''; ?>">
            <br>
        <?php } ?>
        <input type="submit" value="Enviar">
    </form>
    <?php
        /*Un alumno desea saber cuál será su promedio general en las tres materias más difíciles que cursa y cuál será el promedio que obtendrá en cada una de ellas. Estas materias se evalúan como se muestra a continuación:
        La calificación de Matemáticas se obtiene de la siguiente manera:
        Examen 90%
        Promedio de tareas 10%
        En esta materia se pidió un total de tres tareas.

        La calificación de Física se obtiene de la sig. Manera:
        Examen 80%
        Promedio de tareas 20%
        En esta materia se pidió un total de dos tareas.

        La calificación de Química se obtiene de la siguiente manera:
        Examen 85%
        Promedio de tareas 15%
        En esta materia se pidió un promedio de tres tareas.*/

        function resolverNotas(int $cantidad,string $nombre)
        {
            $tareas = [];
            for ($i= 1 ; $i <= $cantidad ; $i++) { 
                $tareas[] = $_POST[$nombre.$i];
            }
            return array_sum($tareas)/count($tareas);
        }
        function promediarCalificacion(float $examen, float $promedio)
        {
            $promedioCurso = [$examen,$promedio];
            return array_sum($promedioCurso)/count($promedioCurso);
        }

        if ($_POST) {
            $examenM = 0.9 * $_POST['examenMate'];
            $promedioM = 0.1 * resolverNotas(3,'tareaMate');
            $examenF = 0.8 * $_POST['examenFisica'];
            $promedioF = 0.2 * resolverNotas(2,'tareaFisica');
            $examenQ = 0.85 * $_POST['examenQuimica'];
            $promedioQ = 0.15 * resolverNotas(3, 'tareaQuimica');

            echo "El promedio general de Matematicas: ".promediarCalificacion($examenM,$promedioM)."<br>";
            echo "El promedio general de Fisica: ".promediarCalificacion($examenF,$promedioF)."<br>";
            echo "El promedio general de Quimica: ".promediarCalificacion($examenQ,$promedioQ)."<br>";
        }
    ?>
</body>
</html>