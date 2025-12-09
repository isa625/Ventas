<?php 

/**
 * undocumented class
 */
final class Compras extends Conexion
{

    public function listar() {
        $sql = "SELECT idcompra, producto, precioUnitario, cantidad, importe, descuento, importePagar, obsequio 
        FROM compra
        ORDER BY idcompra ASC";
        $result = $this->cnx->query($sql);
        $lista = [];
        while ($r = $result->fetch_object()) {
            $lista[] = $r;
        }
        return $lista;
        
        
    }

    public function encontrar(int $id) {
        $sql = "SELECT idcompra, producto, precioUnitario, cantidad, importe, descuento, importePagar, obsequio 
        FROM compra WHERE idcompra = $id LIMIT 1";
        $result = $this->cnx->query($sql);
        return $result->fetch_object();
    }
    

    public function crear(object $info) 
    {
        $resumenDeCompra = $this->crearResumenCompra($info);
        $sql = "INSERT compra(producto, precioUnitario, cantidad, importe, descuento, importePagar, obsequio) VALUES (
            '".$info->producto."',
            '".$info->precioUnitario."',
            '".$info->cantidad."',
            '".$resumenDeCompra->importe."',
            '".$resumenDeCompra->descuento."',
            '".$resumenDeCompra->importePagar."',
            '".$resumenDeCompra->obsequio."'
        )";
        $this->cnx->query($sql);
    }

    public function actualizar(object $info) 
    {
        $resumenDeCompra = $this->crearResumenCompra($info);
        $sql = "UPDATE compra SET 
        producto = '".$info->producto."',
        precioUnitario = '".$info->precioUnitario."',
        cantidad = '".$info->cantidad."',
        importe = '".$resumenDeCompra->importe."',
        descuento = '".$resumenDeCompra->descuento."',
        importePagar = '".$resumenDeCompra->importePagar."',
        obsequio = '".$resumenDeCompra->obsequio."'
        WHERE idcompra = ".$info->idcompra;
        $this->cnx->query($sql);
    }

    public function eliminar(object $info) 
    {
        $sql = "DELETE FROM compra where idcompra = ".$info->idcompra;
        $this->cnx->query($sql);
    }

    private function crearResumenCompra(object $info) 
    {
        $importe = floatval($info->precioUnitario) * intval($info->cantidad);
        $descuento = $importe * 0.11;
        return (object) [
            'importe' => $importe,
            'descuento' => $descuento,
            'importePagar' => $importe - $descuento,
            'obsequio' => 2 * intval($info->cantidad)
        ];
    }

}


