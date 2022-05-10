<?php
session_start();
include("connection.php");

$quant = 0;

if (isset($_GET["quant"]))
    $quant = $_GET["quant"];

$IDA = $_SESSION["IDA"];


//UPDATE `articoli` SET `Quantità`='1' WHERE `IDProdotto`=1;
$sql = "UPDATE `articoli` SET `Quantità`=$quant WHERE`IDProdotto`=$IDA";
$conn->query($sql);

header("location:index.php");
