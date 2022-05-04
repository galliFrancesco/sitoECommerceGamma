<?php
    session_start(); 
    include("connection.php");

    // Imposta l'ID iniziale
    //$_SESSION["id"] = ""; <- Lo fa già da solo 
    //unset($_SESSION['id']);
    

    $username = $_GET["user"];
    $password = $_GET["pass"];

    // sentinella, diventa false se non si può effettuare il login
    $checkInput = true; 

    // prima di fare la query controllo che non ci siano caratteri strani 
    // cioè inserimento di ' o " o ,
    if (strpos($username, '"') !== false || strpos($username, ',') !== false || strpos($username, "'") !== false) {
      $checkInput = false; 
    }
    // anche sulla password
    if (strpos($password, '"') !== false || strpos($password, ',') !== false || strpos($password, "'") !== false) {
      //header("location:login.php?Message=Caratteri non validi!");
      $checkInput = false; 
    }

    if($checkInput){ //Se non ha messo caratteri strani fa la login
      $sql = "SELECT * FROM utente WHERE username = '$username' AND password = '$password'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($row["password"] == $password){ //LOGIN ESATTA         
          // metto in sessione L'ID
          $_SESSION["id"] = $row["IDUtente"]; 

          header("location:index.php"); 
        }
        
      } else {
        // la login non è giusta, quindi il record non esiste
        $_SESSION["id"] = ""; 
        header("location:login.php?Message=Dati errati!");  
        //header("location:index.php");
      } 

    } else {
      header("location:login.php?Message=Caratteri non validi!");
    }
