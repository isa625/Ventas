<?php
final class npm extends Conexion01
{
    public function encontrar(int $id)
    {
        $sql = "SELECT id_npm,nom_proyecto,descripcion,enlace_web,enlace_img,num_dep FROM tb_npm WHERE id_npm = $id";
        $result = $this->cn->query($sql);
        return $result->fetch_object();
    }

    public function listar()
    {
        $sql = "SELECT id_npm,nom_proyecto,descripcion,enlace_web,enlace_img,num_dep FROM tb_npm";
        $result = $this->cn->query($sql);
        $listado = [];
        while ($npm = $result->fetch_object()) {
            $listado[] = $npm;
        }
        return $listado;
    }

    public function crear(object $info)
    {
        $sql = "INSERT INTO tb_npm(nom_proyecto,descripcion,enlace_web,enlace_img,num_dep) VALUES
        (
            '$info->nom_proyecto',
            '$info->descripcion',
            '$info->enlace_web',
            '$info->enlace_img',
             $info->num_dep
        )";
        $result = $this->cn->query($sql);
    }

    public function actualizar(object $info)
    {
        $sql = "UPDATE tb_npm SET
        nom_proyecto = '$info->nom_proyecto',
        descripcion = '$info->descripcion',
        enlace_web = '$info->enlace_web',
        enlace_img = '$info->enlace_img',
        num_dep = $info->num_dep
        WHERE id_npm = $info->id_npm";
        $result = $this->cn->query($sql);
        return $this->cn->affected_rows;
    }

    public function eliminar(object $info)
    {
        $sql = "DELETE FROM tb_npm WHERE id_npm = $info->id_npm";
        $result = $this->cn->query($sql);
        return $this->cn->affected_rows;
    }

    public function PromedioDependencia(array $lista)
    {
        $cantidadDep = count($lista);
        $sumaDep = array_sum(array_column($lista, 'num_dep'));
        if ($cantidadDep == 0) {
            return '';
        }
        return $sumaDep/$cantidadDep;
    }
}
