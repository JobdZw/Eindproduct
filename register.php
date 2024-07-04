<?php
include('connection.php');

if (isset($_POST['register'])) {
    $user = $_POST['Gebruikersnaam'];
    $pass = $_POST['wachtwoord'];
    $mail = $_POST['email'];

    
        $stmt = $conn->prepare("INSERT INTO users (Gebruikersnaam, wachtwoord, email) VALUES (:Gebruikersnaam, :wachtwoord, :email)");
        $stmt->bindParam(':Gebruikersnaam', $user);
        $stmt->bindParam(':wachtwoord', $pass);
        $stmt->bindParam(':email', $mail);

        $test = $stmt->execute();

        if ($test) {
            echo "Registratie succesvol!";
            header("Location: inlog.php");
            exit();
        }
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<h2>User Registration</h2>
<form action="register.php" method="post">
    <label for="Gebruikersnaam">Username:</label>
    <input type="text" id="username" name="Gebruikersnaam">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    <label for="wachtwoord">Password:</label>
    <input type="password" id="wachtwoord" name="wachtwoord">
    <input type="submit" name="register" value="Register">
</form>
</body>
</html>
