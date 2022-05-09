<?php
session_start();
include("connection.php");

$IDSession = 1;

if (isset($_SESSION["id"])) {
    $IDSession = $_SESSION["id"];

$IDA = $_GET['idArticolo']; // Prende l'id giusto (ID in contiene)

//prende id prodotto
$sqlIDProd = "SELECT IDProdotto FROM `contiene` WHERE IDCont = $IDA"; 
$result = $conn->query($sqlIDProd);
$rowID = $result->fetch_assoc();

$idProd = $rowID["IDProdotto"];
echo $idProd;  // <- Prende l'IDProdotto
echo "<br>".$IDA;

// prende la quantità attuale
 
$sqlQuant = "SELECT Quantità FROM articoli WHERE IDProdotto = $idProd"; 
$result = $conn->query($sqlQuant);
$row = $result->fetch_assoc();

$quantita = $row["Quantità"];  // <- GIUSTO 


$quantita ++; 
echo "<br>".$quantita;

$sqlUpdate = "UPDATE `articoli` SET `Quantità` = '$quantita' WHERE `articoli`.`IDProdotto` = $idProd"; 
$conn->query($sqlUpdate);

$sql = "DELETE FROM `contiene` WHERE IDCont = $IDA"; 
$conn->query($sql);

header("location:index.php");
}