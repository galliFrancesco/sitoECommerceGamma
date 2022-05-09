<?php
session_start();

include("connection.php");

// ADDPRODOTTO -> pagina per l'admin
$IDSession = 1;

//Magari se non ha fatto la login fa mettere gli articoli e basta in base al session ID
if (isset($_SESSION["id"]) && $_SESSION["id"]!=0) {
    header("location:index.php"); 
} else {
    echo "Buongiorno admin, davvero una bella giornata per aggiungere delle cose al DB"; 
    $IDSession = 0; 
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <br><form action="addProdottoSQL.php" method="post" enctype="multipart/form-data">

        <br>Titolo<input type="text" name="titolo">
        <br>Descrizione oggetto<input type="text" name="descrizione">
        <br>Venditore<input type="number" name="venditore">
        <br>Prezzo<input type="number" name="prezzo">
        <br>Quantità<input type="number" name="quantita"> 

        <br>Select image to upload:<input type="file" name="fileToUpload" id="fileToUpload">
        <br><br><input type="submit" value="Aggiungi oggetto" name="submit">
    </form>
</body>

</html>