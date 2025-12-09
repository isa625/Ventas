<?php
class Conexion01
{
    public $cn;
    public function __construct() {
        $this->cn = mysqli_connect('localhost','root','','dbNPM');
    }
}