<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="../sources/images/carLogo.ico">
    <link rel="stylesheet" href="../css/style.css">

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
<script src="../js/functions.js"></script>

</html>