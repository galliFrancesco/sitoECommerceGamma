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

            <br> Nome <input type="text" name="nome">
            <br> Cognome <input type="text" name="cog">
            <br> Username <input type="text" name="user">
            <br> Password <input type="password" name="pass">
            <br> Ripeti Password <input type="password" name="pass2">
            
            <br><br><button type="submit">INSERISCI UTENTE </button>
            <p> TORNA ALLA HOME <a href="index.php"> qui </a></p>
    </div>
    </form>
</body>