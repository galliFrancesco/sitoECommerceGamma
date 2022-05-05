<?php
    session_start(); 

    include("connection.php");

    $IDUser = 0; 
    $user = $_SESSION["username"];
    
    $sqlID = "SELECT * FROM Utente"; 

    $result = $conn->query($sqlID);
    // faccio scorrere il vettore dei nomi e vedo qual'è
    if ($result->num_rows > 0) {  
      while ($row = $result->fetch_assoc()) {
        //echo $row["username"]; // prende tutti gli user
        $userDB = $row["username"];

        if($userDB==$user){
            $IDUser = $row["IDUtente"];
            $_SESSION["id"] = $IDUser; 
        }
        
        //echo $IDUser."<br>";
      }
    }

    // SQL per impostare il carrello

    $sqlCart = "INSERT INTO carrello (ID, IDUtente, Data) VALUES ($IDUser, $IDUser, NOW())"; 
    if ($conn->query($sqlCart) === TRUE) { 
        
        header("location:index.php");  
    } else 
        header("location:index.php"); 
?>