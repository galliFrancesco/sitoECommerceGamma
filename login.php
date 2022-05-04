<?php
    session_start(); 
    //$_SESSION["id"] = ""; 

    // L'ID verrà impostato di modo che: 
    // 1-> utente non loggato 
    // numero-> loggato 
    // oppure dovrei usare i cookie, che non ho la minima idea di come funzionino

    // Messaggio in alto per evnentuali errori 
    if(isset($_GET['Message'])){
        echo $_GET['Message'];
    }
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container prodotto">
        <form action="checkLogin.php" type="GET"> 
        
            <input type="text" name="user"> <br> 
            <input type="password" name="pass"> <br>

            <button type="submit"> LOGIN </button>
        </form>
        </div>

        
    </body>
</html>