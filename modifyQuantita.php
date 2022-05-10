<?php
session_start();

$IDA = $_GET["idArticolo"];
// echo $IDA; 

$_SESSION["IDA"] = $IDA; 

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="modifyQuantitaSQL.php" method="GET">

        <br><input type="number" name="quant">


        <br><button type="submit"> Modifica quantità</button>
    </form>
</body>

</html>