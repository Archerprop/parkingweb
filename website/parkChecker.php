<?php

include "mcript.php";
include_once('../connect.php');
var_dump($_POST);

$placa = strtoupper($_POST['placa']);
if ($_REQUEST['type']) {
    $tipo = $_REQUEST['type'];
    $tipo = implode(",", $tipo);
}


$checking = "SELECT COUNT(placas) AS cant FROM vehiculos WHERE placas ='$placa'";
$checkedplaca = $conectar->query($checking);
$row = $checkedplaca->fetch_assoc();


if ($row['cant']>0) {
    $hour = "SELECT * FROM vehiculos WHERE placas ='$placa'";
    $selectHour = $conectar->query($hour);
    $vehiculo = mysqli_fetch_array($selectHour);
    $horaVehiculo = $vehiculo['fechIngreso'];
    date_default_timezone_set("America/Bogota");
    $now = new DateTime();
    $diffhour = new DateTime($vehiculo['fechIngreso']);
    $interval = $diffhour->diff($now);

    echo($interval->format(" %i minutes "));

    if ($vehiculo['tipo']=='moto') {
        if ($interval->format("%i")!=0) {
            $min = $interval->format("%i");
            echo $valorC = $min*86;
            (int)$numC = $valorC/100;
            if ($numC!=0) {
                $numD= (int)(($valorC-(100*(int)$numC)));
                echo " ".$numD;
                if ($numD>50) {
                    $valorE = $valorC-$numD+100;
                    echo " ".$valorE;
                    $valorE = $encriptar($valorE);  //Encriptar el valor a pagar
                    echo $valorE;
                    header("Location: console.php?v=$valorE&este=n");
                } else {
                    if ($numD<50) {
                        $valorA = $valorC-$numD;
                        echo " ".$valorA;
                        $valorA = $encriptar($valorA);  //Encriptar el valor a pagar
                        header("Location: console.php?v=$valorA&este=n");
                    }
                }
            }
        } else {
            $valorC = 100;
            echo " ".$valorC;
            $valorC = $encriptar($valorC);
            header("Location: console.php?v=$valorC&este=n");
        }
    } else {
        if ($vehiculo['tipo']=='carro') {
            if ($interval->format("%i")!=0) {
                $min = $interval->format("%i");
                echo $valorC = $min*97;
                (int)$numC = $valorC/100;
                if ($numC!=0) {
                    $numD= (int)(($valorC-(100*(int)$numC)));
                    echo " ".$numD;
                    if ($numD>50) {
                        $valorED = $valorC-$numD+100;
                        echo " ".$valorED;
                        $valorED = $encriptar($valorED);  //Encriptar el valor a pagar
                        header("Location: console.php?v=$valorED&este=n");
                    } else {
                        if ($numD<50) {
                            $valorAD = $valorC-$numD;
                            echo " ".$valorAD;
                            $valorAD = $encriptar($valorAD);  //Encriptar el valor a pagar
                            header("Location: console.php?v=$valorAD&este=n");
                        }
                    }
                }
            } else {
                $valorC = 100;
                echo " ".$valorC;
                $valorC = $encriptar($valorC);
                header("Location: console.php?v=$valorC&este=n");
            }
        }
    }
    $cleaner = "DELETE FROM vehiculos WHERE placas = '$placa'";
    $deleted = $conectar->query($cleaner);
} else {
    $checkingTypeM = "SELECT COUNT(tipo) AS cantM FROM vehiculos WHERE tipo ='moto'";
    $checkedTypeM = $conectar->query($checkingTypeM);
    $rowM = $checkedTypeM->fetch_assoc();
    $checkingTypeC = "SELECT COUNT(tipo) AS cantC FROM vehiculos WHERE tipo ='carro'";
    $checkedTypeC = $conectar->query($checkingTypeC);
    $rowC = $checkedTypeC->fetch_assoc();
    if ($tipo == 'moto') {
        echo $rowM['cantM'];
        if ($rowM['cantM']==10) {
            header("Location: console.php?v=x&este=sim");
        } else {
            echo " Todavia queda espacio :D";
            date_default_timezone_set("America/Bogota");
            $fechI = new DateTime();
            $fechI = $fechI->format('Y-m-d H:i:s');
            $sql = "INSERT INTO vehiculos (placas,tipo,fechIngreso) VALUES ('$placa','$tipo','$fechI')";
            if (mysqli_query($conectar, $sql)) {
                echo "registrado :D";
                echo "$sql";
                header("Location: console.php?v=x&este=ok");
            } else {
                echo "Error D:";
            }
        }
    } else {
        if ($tipo == 'carro') {
            echo $rowC['cantC'];
            if ($rowC['cantC']==20) {
                header("Location: console.php?v=x&este=sic");
            } else {
                $fechIC = new DateTime();
                $fechIC = $fechIC->format('Y-m-d H:i:s');
                echo " sostengan hay espacio :D";
                $sql = "INSERT INTO vehiculos (placas,tipo,fechIngreso) VALUES ('$placa','$tipo','$fechIC')";
                if (mysqli_query($conectar, $sql)) {
                    echo "registrado :D";
                    echo "$sql";
                    header("Location: console.php?v=x&este=ok");
                } else {
                    echo "Error D:";
                }
            }
        }
    }
}

$conectar->close();