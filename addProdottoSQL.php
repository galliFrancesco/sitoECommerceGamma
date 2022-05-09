<?php
    session_start(); 
    include("connection.php");

    $IDSession = 1; 

    if (isset($_SESSION["id"]) && $_SESSION["id"]!=0) {
        header("location:index.php"); 
    }

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //echo $target_file ; // <---- PRENDE IL NOME DEL FILE
    // FINE FILE //

    // prende le altre cose 
    $titolo = ""; 
    $descrizione = ""; 
    $venditore = 0;  
    $prezzo = 0;  
    $quantita = 0;

    if(isset($_POST["titolo"]))
        $titolo = $_POST["titolo"];
    
    if(isset($_POST["descrizione"]))
        $descrizione = $_POST["descrizione"];

    if(isset($_POST["venditore"]))
        $venditore = $_POST["venditore"];

    if(isset($_POST["prezzo"]))
        $prezzo = $_POST["prezzo"];

    if(isset($_POST["quantita"]))
        $quantita = $_POST["quantita"];




    echo $titolo . "<br>" . $descrizione . "<br>" .$venditore. "<br>" . $prezzo. "<br>" . $quantita. "<br>" . $target_file. "<br>"  ;
    // ------------------
    // TODO //
    // CONTROLLO CHE I CAMPI NON SIANO VUOTI, ALTRIMENTI MANDA DI NUOVO ALL'AGGIUNTA
    // ------------------

    // INSERT INTO articoli (Titolo, Descrizione, Venditore, Prezzo, Quantità, imagePath) VALUES ("CIAO", "un ciao", 2 , 30, 2, "immagina")
    $sql= "INSERT INTO articoli (Titolo) VALUES ($titolo)";
    
    if ($conn->query($sql) === TRUE) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            header("location:index.php"); 
            //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            echo "tutto a post"; 
        }
        header("location:addItem.php");  
        echo "quasi"; 
    }
    echo "no"; 


    //if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //header("location:index.php"); 
        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    //}
