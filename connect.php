<?php

//configuracion para la base de datos

$hostname = "sql106.epizy.com";
$usuariodb = "epiz_32342782";
$password = "e5OLrI3c80aM";
$dbname = "epiz_32342782_parkingweb";

//conexion con la db
$conectar = new mysqli($hostname, $usuariodb, $password, $dbname) or die('Error');