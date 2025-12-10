<?php
final class npm extends Conexion01
{
    public function encontrar(int $id)
    {
        $sql = "SELECT id_npm,nom_proyecto,descripcion,enlace_web,enlace_img,num_dep,categoria,plataforma,precio,importeTotal 
        FROM tb_npm WHERE id_npm = $id";
        $result = $this->cn->query($sql);
        return $result->fetch_object();
    }

    public function listar()
    {
        $sql = "SELECT id_npm,nom_proyecto,descripcion,enlace_web,enlace_img,num_dep,categoria,plataforma,precio,importeTotal FROM tb_npm";
        $result = $this->cn->query($sql);
        $listado = [];
        while ($npm = $result->fetch_object()) {
            $listado[] = $npm;
        }
        return $listado;
    }

    public function crear(object $info)
    {
        $importeTotal = $this->calcularImporte($info);
        $sql = "INSERT INTO tb_npm(nom_proyecto,descripcion,enlace_web,enlace_img,num_dep,categoria,plataforma,precio,importeTotal) VALUES
        (
            '$info->nom_proyecto',
            '$info->descripcion',
            '$info->enlace_web',
            '$info->enlace_img',
             $info->num_dep,
             '$info->categoria',
             '$info->plataforma',
             $info->precio,
             $importeTotal
        )";
        $result = $this->cn->query($sql);
    }

    public function actualizar(object $info)
    {
        $importeTotal = $this->calcularImporte($info);
        $sql = "UPDATE tb_npm SET
        nom_proyecto = '$info->nom_proyecto',
        descripcion = '$info->descripcion',
        enlace_web = '$info->enlace_web',
        enlace_img = '$info->enlace_img',
        num_dep = $info->num_dep,
        categoria = '$info->categoria',
        plataforma = '$info->plataforma',
        precio = $info->precio,
        importeTotal = $importeTotal
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


    /**
     * Agregar un precio por formulario
     * Agregar un importe a cada proyecto NPM
     * 
     * Categoria Anime: precio + 8
     * Categoria Proyecto: precio + 9
     * Categoria Kdrama: precio + 12
     * 
     * Plataforma
     * Netflix += 10%
     * HBO += 5%
     */
    public function calcularImporte(object $info)
    {
        $importeTotal = $info->precio + match ($info->categoria) {
            'anime' => 8,
            'proyecto' => 9,
            'kdrama' => 12,
            default => 0
        };
        return $importeTotal + match ($info->plataforma) {
            'Netflix' => 0.1 * $importeTotal,
            'HBO' => 0.05 * $importeTotal,
            default => 0
        };
    }


    
}
