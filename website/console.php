<?php
    include "mcript.php";

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="../sources/images/carLogo.ico">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/sweetalert2.all.min.js"></script>

    <title>ParkingWeb</title>
</head>

<body>
    <center>
        <div class="console">
            <div class="tittle">
                <h1>Bienvenido</h1>
            </div>
            <div class="textField">
                <form method="POST" action="parkChecker.php">
                    <input type="text" name="placa" id="placaId" placeholder="Ingrese la placa" maxlength="6"
                        minlength="6" onkeypress="return checkplaca(event);" required>
                    <label for="carro">Carro</label>
                    <input type="checkbox" name="type[]" id="carro" onclick="javascript:selects();" value="carro">
                    <label for="moto">Moto</label>
                    <input type="checkbox" name="type[]" id="moto" onclick="javascript:selects();" value="moto">
                    <input type="submit" value="Confirmar">
                </form>
                <p id="valorP"></p>
            </div>
        </div>
    </center>
</body>
<script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
<?php
    if ($_GET['v']!='x') {
        $valor = $_GET['v'];
        $valor = $desencriptar($valor);
        echo'
        <script>
            Swal.fire({
                title:"Parking Web",
                text:"El valor a pagar es $'.$valor.'\n Vuelva pronto",
                icon:"success",
                confirmButtonText:"Aceptar",
                confirmButtonColor:"#00ff00",
                footer: "Recuerda retirar lo antes posible el vehiculo despues de pagar",
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                stopKeydownPropagation: false,
                input: "checkbox",
                inputPlaceholder: "<br><label for=\'swal2-checkbox\'><img src=\'../sources/images/impresora.png\' style=\'width:50px; height:50px;\'></label>",
                inputAttributes: {
                    "type": "checkbox",
                    "id": "printButton",
                    "onclick": "reloadC(),window.location.href = \'printed.php?print='.$valor.'\'",
                    "style": "display:none; width: 20px; height: 20px;"
                }
            }).then(() =>{window.location.href="../index.php";});
        </script>';
    }
    if ($_GET['este']!='n') {
        echo'
        <script>
            Swal.fire({
                title: "!Felicidades¡",
                text: "Registro de placa realizado con exito.",
                icon: "success",
                showConfirmButton: false,
                timer: 2000,
                toast: true,
                position: "top-end"
            }).then(() =>{window.location.href="../index.php";});
        </script>
        ';
    }
    ?>
<script src="../js/functions.js"></script>

</html>