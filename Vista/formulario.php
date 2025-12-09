<?php
include "../Datos/Conexion.php";
include "../Datos/Cliente.php";
include "../Datos/Distrito.php";

$l = new Cliente();
$objDistrito = new Distrito();
if ($_POST) {
    $accion = $_POST['metodo'];
    unset($_POST['metodo']);
    call_user_func([$l,$accion], (object) $_POST);
    header('location:index.php');
}
$cliente = $l->encontrar($_GET['id'] ?? 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?? 0; ?>">
        <input type="hidden" name="metodo" value="<?php echo $_GET['metodo'] ?? "crear"; ?>">
        Nombres:
        <input type="text" name="nombres" id="" value="<?php echo $cliente?->nombres ?? ''; ?>">
        <br>
        Apellidos:
        <input type="text" name="apellidos" id="" value="<?php echo $cliente?->apellidos ?? ''; ?>">
        <br>
        Direccion:
        <input type="text" name="direccion" id="" value="<?php echo $cliente?->direccion ?? ''; ?>">
        <br>
        Telefono:
        <input type="text" name="telefono" id="" value="<?php echo $cliente?->telefono ?? ''; ?>">
        <br>
        Distrito:
        <select name="distrito" id="distrito">
            <?php foreach ($objDistrito->listar() as $distrito) {?>
                <option value="<?php echo $distrito->id?>" <?php echo ($cliente?->distrito == $distrito->id) ? 'selected' : ''; ?>><?php echo $distrito->nombre;?></option>
            <?php } ?>
        </select>
        <br>
        Email:
        <input type="text" name="email" id="" value="<?php echo $cliente?->email ?? ''; ?>">
        <br>
        <input type="submit" value="<?php echo $_GET['metodo'] ?? 'crear';?>">
    </form>
</body>
</html>