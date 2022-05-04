<?php
    session_start(); 

    include("connection.php"); 
    // add Item aggiunge le cose nel carrello 


    $idarticolo = 0;
    if(isset($_GET['idArticolo'])){
        //echo $_GET['idArticolo'];
        $idarticolo = $_GET["idArticolo"];
    }

    //echo $idarticolo; 

    // ID*, IDProdotto, IDCarrello, Quantità
    // id carrello è da prelevare
    $sql = "INSERT INTO contiene (IDProdotto) VALUES ($idarticolo)"; 


?>

