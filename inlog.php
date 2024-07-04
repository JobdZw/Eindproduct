<?php
include 'Connection.php';

if(isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord'])) {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE Gebruikersnaam = :gebruikersnaam AND wachtwoord = :wachtwoord");
    $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
    $stmt->bindParam(':wachtwoord', $wachtwoord); 
    $stmt->execute();

    $data = $stmt->fetch();

    if($data) {
        // Start de sessie
        session_start();
        
        $_SESSION['user'] = $data['Gebruikersnaam'];
        
        if($gebruikersnaam == 'admin' && $wachtwoord == 'admin') {
            header("Location: adminlogin.php");
            exit(); 
        } else {
            header("Location: index.php");
          
            echo "Inloggen gelukt! Welkom, " . $_SESSION['user'];
        }
    } else {
      
        echo "Ongeldige gebruikersnaam of wachtwoord";
    }
}
?>
