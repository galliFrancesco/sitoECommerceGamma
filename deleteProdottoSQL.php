<?php
    session_start();
    include("connection.php");

    $IDA = $_GET['idArticolo']; // Passato da link 

    echo $IDA; 

    // DELETE FROM `articoli` WHERE IDProdotto = 0
    $sql = "DELETE FROM `articoli` WHERE IDProdotto = $IDA";
    $conn->query($sql);

    header("location:index.php"); 
?>