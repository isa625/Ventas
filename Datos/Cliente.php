<?php

final class Cliente extends Conexion
{
    public function encontrar(int $id)
    {
        $sql = "SELECT idcliente,nombres,apellidos,direccion,telefono,distrito,email FROM cliente WHERE idcliente = $id";
        $result = $this->cnx->query($sql);
        return $result->fetch_object();
    }

    public function listar()
    {
        $sql = "SELECT cli.idcliente, cli.nombres, cli.apellidos, cli.direccion, cli.telefono, dist.nombre as distrito, cli.email 
        FROM cliente cli 
        INNER JOIN distrito dist ON cli.distrito = dist.iddistrito";
        $result = $this->cnx->query($sql);
        $listado = [];
        while ($cliente = $result->fetch_object()) {
            $listado[] = $cliente;
        }
        return $listado;
    }

    public function crear(object $info)
    {
        $sql = "INSERT INTO cliente(nombres,apellidos,direccion,telefono,distrito,email) VALUES
        (
            '$info->nombres',
            '$info->apellidos',
            '$info->direccion',
            '$info->telefono',
            '$info->distrito',
            '$info->email'
        )";
        $result = $this->cnx->query($sql);
    }

    public function actualizar($info)
    {
        $sql = "UPDATE cliente SET
        nombres = '$info->nombres',
        apellidos = '$info->apellidos',
        direccion = '$info->direccion',
        telefono = '$info->telefono',
        distrito = '$info->distrito',
        email = '$info->email'
        WHERE idcliente = $info->id";
        $result = $this->cnx->query($sql);
        return $this->cnx->affected_rows;
    }

    public function eliminar(object $info)
    {
        $sql = "DELETE FROM cliente WHERE idcliente = $info->id";
        $result = $this->cnx->query($sql);
        return $this->cnx->affected_rows;
    }
}