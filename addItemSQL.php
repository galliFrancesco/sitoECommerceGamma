<?php
    session_start(); 
    include("connection.php");

    $IDSession = 1; 

    if (isset($_SESSION["id"])) {
        $IDSession = $_SESSION["id"];
    }

    // prende le cose dalla main page e lo mette nella tabella del carrello
    // magari passo le cose tramite session o query

    $IDA = $_GET['idArticolo']; // prende l'ID della casa passato tramite il link
    //echo $IDA; // gli passa il numero dell'articolo

    
    $sql= "INSERT INTO contiene (IDProdotto, IDCarrello) VALUES ($IDA, $IDSession)";

    if ($conn->query($sql) === TRUE) {
        header("location:index.php");  
    }

?>