<?php

include "../Datos/Conexion01.php";
include "../Datos/npm.php";

$n = new npm();
$lista = $n->listar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="formulario_npm.php">Nuevo</a>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Proyecto</th>
            <th>Descripcion</th>
            <th>Enlace web</th>
            <th>Imagen</th>
            <th>Dependencias</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($lista as $npm) { ?>
            <tr>
                <td><?php echo $npm->id_npm?></td>
                <td><?php echo $npm->nom_proyecto?></td>
                <td><?php echo $npm->descripcion?></td>
                <td><a href="<?php echo $npm->enlace_web; ?>" target="_blank">Ver enlace</a></td>
                <td>
                    <a href="<?php echo $npm->enlace_img; ?>" target="_blank">
                    <img src="<?php echo $npm->enlace_img;?>" alt="" width="40" height="40">
                    </a>
                </td>
                <td><?php echo $npm->num_dep?></td>
                <td><a href="formulario_npm.php?<?php echo http_build_query([
                    'id_npm' => $npm->id_npm,
                    'metodo' => 'actualizar'
                ])?>">Actualizar</a></td>
                <td><a href="formulario_npm.php?<?php echo http_build_query([
                    'id_npm' => $npm->id_npm,
                    'metodo' => 'eliminar'
                ])?>">Eliminar</a></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="5">Total de dependencias:</td>
            <td><?php echo $n->PromedioDependencia($lista)?></td>
        </tr>
    </table>
</body>
</html>