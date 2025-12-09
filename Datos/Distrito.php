<?php
final class Distrito extends Conexion
{
    public function listar()
    {
        $sql = "SELECT iddistrito as id, nombre FROM distrito";
        $result = $this->cnx->query($sql);
        $listado = [];
        while ($distrito = $result->fetch_object()) {
            $listado[] = $distrito;
        }
        return $listado;
    }
}

?>