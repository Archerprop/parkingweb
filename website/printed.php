<?php
if ($_GET['print'] || $_GET['print']!="") {
    $print = $_GET['print'];
} else {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <h1>Recibo</h1>
    <h1>valor total parqueadero: $<?php echo $print;?></h1>
    <script>
    window.print();

    function redirect() {
        window.location.href = "../index.php";
    }
    setTimeout("redirect()", 2000);
    </script>
</body>


</html>