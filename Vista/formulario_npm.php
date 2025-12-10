<?php
include "../Datos/Conexion01.php";
include "../Datos/npm.php";

$p = new npm();
if ($_POST) {
    $accion = $_POST['metodo'];
    unset($_POST['metodo']);
    call_user_func([$p,$accion], (object) $_POST);
    header('location:lista_npm.php');
}
$npm = $p->encontrar($_GET['id_npm'] ?? 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="hidden" name="id_npm" value="<?php echo $_GET['id_npm'] ?? 0; ?>">
        <input type="hidden" name="metodo" value="<?php echo $_GET['metodo'] ?? "crear"; ?>">
        Proyecto:
        <input type="text" name="nom_proyecto" id="nom_proyecto" value="<?php echo $npm?->nom_proyecto; ?>">
        <br>
        Descripcion:
        <textarea name="descripcion" id="descripcion"><?php echo $npm?->descripcion; ?></textarea>
        <br>
        Enlace web:
        <input type="text" name="enlace_web" id="enlace_web" value="<?php echo $npm?->enlace_web;?>">
        <br>
        Imagen:
        <input type="text" name="enlace_img" id="enlace_img" value="<?php echo $npm?->enlace_img;?>">
        <br>
        Dependencias:
        <input type="text" name="num_dep" id="num_dep" value="<?php echo $npm?->num_dep;?>">
        <br>
        Categoria:
        <select name="categoria" id="categoria">
            <option value="anime" <?php echo ($npm?->categoria == 'anime') ? 'selected' : ''; ?>>Anime</option>
            <option value="proyecto" <?php echo ($npm?->categoria == 'proyecto') ? 'selected' : ''; ?>>Proyecto</option>
            <option value="kdrama" <?php echo ($npm?->categoria == 'kdrama') ? 'selected' : ''; ?>>Kdrama</option>
        </select>
        <br>
        Plataformas:<br>

        <input type="radio" name="plataforma" id="plataforma1" value="Netflix" <?php echo ($npm?->plataforma == 'Netflix') ? 'checked' : ''; ?>>
        <label for="plataforma1">Netflix</label>
        <br>
        <input type="radio" name="plataforma" id="plataforma2" value="HBO" <?php echo ($npm?->plataforma == 'HBO') ? 'checked' : ''; ?>>
        <label for="plataforma2">HBO</label>
        <br>
        Precio:
        <input type="text" name="precio" id="" value="<?php echo $npm?->precio ?? ''; ?>">
        <br>
        <input type="submit" value="<?php echo $_GET['metodo'] ?? 'crear'; ?>">
    </form>
</body>
</html>