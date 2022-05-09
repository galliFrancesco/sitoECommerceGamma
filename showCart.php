<?php
session_start();

include("connection.php");

$IDSession = 1;

//Magari se non ha fatto la login fa mettere gli articoli e basta in base al session ID
if (isset($_SESSION["id"])) {
    $IDSession = $_SESSION["id"];
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="navBar">

        <p><a href="index.php">TORNA INDIETRO</a></p>

        <?php

        if ($IDSession == 0) { // admin
            echo "<br>Buongiorno ADMIN";
        }

        ?>
    </div>
    <?php



    // qui andrebbe fatta una join per mostrare tutti gli oggetti  
    // ma non funziona

    //$sql = "SELECT carrello.Titolo FROM (contiene INNER JOIN carrello ON contiene.IDProdotto = carello.IDProdotto) ";
    //$sql = "SELECT * FROM (contiene INNER JOIN articoli ON contiene.IDProdotto = articoli.IDProdotto)";
    //$sql = "SELECT * FROM ((contiene INNER JOIN articoli ON contiene.IDProdotto = articoli.IDProdotto)INNER JOIN carrello ON contiene.IDCarrello = carrello.ID)";


    $sql = "SELECT * FROM ((contiene INNER JOIN articoli ON contiene.IDProdotto = articoli.IDProdotto)INNER JOIN carrello ON contiene.IDCarrello = carrello.ID ) WHERE carrello.ID =" . $IDSession;

    $result = $conn->query($sql);

    // TODO // 
    // Aggiungere un bottone/link per rimuovere il prodotto dal carrello 
    // DELETE FROM `carrello` WHERE `carrello`.`ID` = 0 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo "<div class='container articolo'>";
            echo $row["Titolo"];

            echo "<p class='desc'>" . $row["Descrizione"] . "</p>";

            // Chiave primaria di "Contiene"
            $id = $row["IDCont"];

            echo "<br><a href='removeItemSQL.php?idArticolo=$id'> Rimuovi Articolo </a>";
            echo "</div><br>";
        }
    } else {
        echo "Nessun articolo nel carrello D:";
    }

    //$sql1 = "INSERT INTO articoli(Titolo) VALUES('Banana')"; 
    //$result1 = $conn->query($sql1);


    ?>

</body>

</html>