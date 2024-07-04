<?php
include('connection.php'); 

if (isset($_POST['register'])) {
    $createn = $_POST['createn'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $categorie = $_POST['categorie'];


        $stmt = $conn->prepare("INSERT INTO producten (productnaam, omschrijving, prijs, categorie) VALUES (:productnaam, :omschrijving, :prijs, :categorie)");
   
        $stmt->bindParam(':productnaam', $createn);
        $stmt->bindParam(':omschrijving', $omschrijving);
        $stmt->bindParam(':prijs', $prijs);
        $stmt->bindParam(':categorie', $categorie);

        
        $success = $stmt->execute();

        if ($success) {
            echo "Product succesvol toegevoegd!";
          
            header("Location: bestel.php");
            exit();
        } 
}
?>
