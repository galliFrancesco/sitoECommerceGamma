<?php
session_start();

// Messaggio in alto per evnentuali errori 
if (isset($_GET['Message'])) {
    echo $_GET['Message'];
}

// se l'ID è settato puoi rimanere
if (isset($_SESSION["id"]) && $_SESSION["id"] == "") {
    header("location:index.php?Message=Devi effettuare il login!");
}
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container prodotto">
        <form action="registrazioneSQL.php" type="GET">

            <!-- nome, cognome, username, password  -->

            <br>Nome <input type="text">
            <br> Cognome <input type="text">
            <br> Username <input type="text">
            <br> Password <input type="password">
            <br> Ripeti Password <input type="password">
            
            <br><br><button type="submit">INSERISCI DIPENDENTE </button>
            <p> TORNA ALLA HOME <a href="home.php"> qui </a></p>
    </div>
    </form>
</body>