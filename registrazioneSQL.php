<?php
session_start();

include("connection.php");

// sentinella, diventa false se non può fare cose
$checkInput = true;

// Valori presi dai box
$nome = "";
$cognome = "";
$username = "";
$password = "";
$password2 = "";

// Controllo sugli input
// !VALORI VUOTI
// NOME
if (isset($_GET["nome"]) && $_GET["nome"] != "")
  $nome = $_GET["nome"];
else
  $checkInput = false;
// COGNOME
if (isset($_GET["cog"]) && $_GET["cog"] != "")
  $cognome = $_GET["cog"];
else
  $checkInput = false;
//USERNAME
if (isset($_GET["user"]) && $_GET["user"] != "")
  $username = $_GET["user"];
else
  $checkInput = false;
//PASSWORD
if (isset($_GET["pass"]) && $_GET["pass"] != "")
  $password = $_GET["pass"];
else
  $checkInput = false;
//PASSWORD2
if (isset($_GET["pass2"]) && $_GET["pass2"] != "")
  $password2 = $_GET["pass2"];
else
  $checkInput = false;

//PASS=PASS2
if ($password != $password2)
  $checkInput = false;

// Ogni username è unico 
$sqlUser = "SELECT username FROM utente";

$result = $conn->query($sqlUser);

if ($result->num_rows > 0) {

  echo $nome . "<br><br>";

  while ($row = $result->fetch_assoc()) {
    //echo $row["username"]; // prende tutti gli user
    $DBUser = $row["username"];
    echo $DBUser. "<br>";
    

    if($nome == $DBUser){ // se un nome è uguale
      $checkInput = false; 
    }
  }
}




// Prima di fare la query controllo che non ci siano caratteri strani(NO SQLInjection D:)
// Cioè inserimento di ' e " e ,
if (strpos($nome, '"') !== false || strpos($nome, ',') !== false || strpos($nome, "'") !== false) {
  $checkInput = false;
}
// QULIFICA
if (strpos($cognome, '"') !== false || strpos($cognome, ',') !== false || strpos($cognome, "'") !== false) {
  $checkInput = false;
}
//
if (strpos($username, '"') !== false || strpos($username, ',') !== false || strpos($username, "'") !== false) {
  $checkInput = false;
}
//
if (strpos($password, '"') !== false || strpos($password, ',') !== false || strpos($password, "'") !== false) {
  $checkInput = false;
}
//
if (strpos($password2, '"') !== false || strpos($password2, ',') !== false || strpos($password2, "'") !== false) {
  $checkInput = false;
}


if ($checkInput) { // Se non ha messo caratteri strani crea il record

  // TODO 
  // aggiungere anche il carrello, solo dopo aver creato questo VV, così IDCarello = IDUtente
  $sql = "INSERT INTO utente(Nome,Cognome,username,password) VALUES ('$nome','$cognome','$username','$password')";

  if ($conn->query($sql) === TRUE) {
    //header("location:index.php");  

    $sql1 = "SELECT * FROM utente";
  } else {
    //header("location:registrazione.php?Message=Errore  connessione D:");
  }

} else {
  // Altrimenti messaggio di errore 
  header("location:registrazione.php?Message=Valori non validi");
}
