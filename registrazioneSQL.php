<?php
session_start(); 

include("connection.php");

// sentinella, diventa false se non può fare cose
$checkInput = true; 

// Valori presi dai box
$cognome = "";
$qualifica = "";
$livello = "";
$anno = "";
$codice = "";


// Controllo sugli input
// !VALORI VUOTI
if(isset($_GET["cogn"]) && $_GET["cogn"] != "")
  $cognome = $_GET["cogn"];
else 
  $checkInput = false; 

// Qualifica
if(isset($_GET["quali"]) && $_GET["quali"] != "")
  $qualifica = $_GET["quali"];
else 
  $checkInput = false; 
// LIVELLO
if(isset($_GET["liv"]) && $_GET["liv"] != "")
  $livello = $_GET["liv"];
else 
  $checkInput = false; 

  // Anno Promozione
if(isset($_GET["anno"]) && $_GET["anno"] != "")
  $anno = $_GET["anno"];
else 
  $checkInput = false; 

  // Codice Reparto
if(isset($_GET["cod"]) && $_GET["cod"] != "")
  $codice = $_GET["cod"];
else 
  $checkInput = false; 


// Prima di fare la query controllo che non ci siano caratteri strani(NO SQLInjection D:)
// Cioè inserimento di ' e " e ,
if (strpos($cognome, '"') !== false || strpos($cognome, ',') !== false || strpos($cognome, "'") !== false) {
  $checkInput = false; 
}
// QULIFICA
if (strpos($qualifica, '"') !== false || strpos($qualifica, ',') !== false || strpos($qualifica, "'") !== false) {
  $checkInput = false; 
}
//
if (strpos($livello, '"') !== false || strpos($livello, ',') !== false || strpos($livello, "'") !== false) {
  $checkInput = false; 
}
//
if (strpos($anno, '"') !== false || strpos($anno, ',') !== false || strpos($anno, "'") !== false) {
  $checkInput = false; 
}
//
if (strpos($codice, '"') !== false || strpos($codice, ',') !== false || strpos($codice, "'") !== false) {
  $checkInput = false; 
}

if($checkInput){ // Se non ha messo caratteri strani crea il record

  $sql = "INSERT INTO dipendente(Cognome, Qualifica, Livello, AnnoPromozione, CodiceReparto) VALUES ('$cognome','$qualifica','$livello','$anno','$codice')"; 

  if ($conn->query($sql) === TRUE) {
      header("location:home.php?Message=I Dati sono stati inseriti!");  
    } else {
      header("location:registrazione.php?Message=Errore  connessione D:");
  }
} else { 
  // Altrimenti messaggio di errore 
  header("location:registrazione.php?Message=Valori non validi");
}
?>