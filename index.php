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

        <a href="login.php">LOGIN</a>
        <a href="registrazione.php">REGISTRAZIONE</a>
        <a href="showCart.php"> CARRELLO </a>

        <?php

        echo "<br> Buongiorno "; 
        if ($IDSession == 0) { // admin
            echo "ADMIN";
            echo '<br><a href="addProdotto.php">Aggiungi cose</a>';
            // Link per aggiungere oggetti disponibile solo all'admin
        }
        ?>
    </div>

    <?php

    $sql = "SELECT * FROM articoli";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            echo "<div class='container articolo'>";

            echo $row["Titolo"];

            $titolo = $row["imagePath"];

            // uploads\Legosi.jpg

            echo "<br><img class='immagine' src='uploads/" . $titolo . "'> ";

            echo '<p class="desc">' . $row["Descrizione"] . "</p>";

            $id = $row["IDProdotto"]; 

            // TODO //
            // VEDERE SE HO I FILE NELLA CHIAVETTA, SENNò LO DEVO FARE DA CAPO
            echo "<a href='addItemSQL.php?idArticolo=$id'> Aggiungi al carrello" . "</a>";
            echo "</div>";
        }
    } else {
        echo '<div class="container articolo">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda officiis, qui reiciendis quae laboriosam quam dolorem esse, magni, error dignissimos eaque ad aut ut modi commodi delectus facere ullam pariatur.</p>
        </div>';
    }
    ?>

    <!-- GRAZIE TITA <3-->
    <div class="ty">
        Grazie @Tita_Croft :3
    </div>
</body>

</html>