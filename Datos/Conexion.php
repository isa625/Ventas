<?php
 class Conexion
 {
    public $cnx;
    public function __construct() {
        $this->cnx = mysqli_connect('localhost','root','','ventas');
    }
 }