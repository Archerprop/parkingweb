<?php

include_once('../connect.php');
var_dump($_POST);

$placa = strtoupper($_POST['placa']);
if ($_REQUEST['type']) {
    $tipo = $_REQUEST['type'];
    $tipo = implode(",", $tipo);
} else {
    header("Location: console.php");
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
                } else {
                    if ($numD<50) {
                        $valorA = $valorC-$numD;
                        echo " ".$valorA;
                    }
                }
            }
        } else {
            $valorC = 100;
            echo " ".$valorC;
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
                        $valorE = $valorC-$numD+100;
                        echo " ".$valorE;
                    } else {
                        if ($numD<50) {
                            $valorA = $valorC-$numD;
                            echo " ".$valorA;
                        }
                    }
                }
            } else {
                $valorC = 100;
                echo " ".$valorC;
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
            echo " Ya hay muchas motos";
        } else {
            echo " Todavia queda espacio :D";
            $sql = "INSERT INTO vehiculos (placas,tipo,fechIngreso) VALUES ('$placa','$tipo',NOW())";
            if (mysqli_query($conectar, $sql)) {
                echo "registrado :D";
                echo "$sql";
            } else {
                echo "Error D:";
            }
        }
    } else {
        if ($tipo == 'carro') {
            echo $rowC['cantC'];
            if ($rowC['cantC']==20) {
                echo " mucho carro";
            } else {
                echo " sostengan hay espacio :D";
                $sql = "INSERT INTO vehiculos (placas,tipo,fechIngreso) VALUES ('$placa','$tipo',NOW())";
                if (mysqli_query($conectar, $sql)) {
                    echo "registrado :D";
                    echo "$sql";
                } else {
                    echo "Error D:";
                }
            }
        }
    }
}

$conectar->close();