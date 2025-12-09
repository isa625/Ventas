<?php
include "../Datos/Conexion.php";
include "../Datos/Cliente.php";

$c = new Cliente();
$lista = $c->listar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="formulario.php">Nuevo</a>
    <table border ="1">
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Distrito</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($lista as $cliente) {?>
            <tr>
                <td><?php echo $cliente->idcliente; ?></td>
                <td><?php echo $cliente->nombres; ?></td>
                <td><?php echo $cliente->apellidos; ?></td>
                <td><?php echo $cliente->direccion; ?></td>
                <td><?php echo $cliente->telefono; ?></td>
                <td><?php echo $cliente->distrito; ?></td>
                <td><?php echo $cliente->email;?></td>
                <td><a href="formulario.php?<?php echo http_build_query([
                    'id' => $cliente->idcliente,
                    'metodo' => 'actualizar'
                ])?>">Actualizar</a></td>
                <td><a href="formulario.php?<?php echo http_build_query([
                    'id' => $cliente->idcliente,
                    'metodo' => 'eliminar'
                ])?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>

    La cantidad de clientes es: <?php echo count($lista)?>
</body>
</html>