<?php

//configuracion para la base de datos

$hostname = "localhost";
$usuariodb = "root";
$password = "";
$dbname = "parkingweb";

//conexion con la db
$conectar = new mysqli($hostname, $usuariodb, $password, $dbname) or die('Error');