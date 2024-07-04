<?php

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; 
    $productnaam = $_POST['productnaam'];
    $omschrijving = $_POST['omschrijving'];
    $prijs = $_POST['prijs'];
    $categorie = $_POST['categorie']; 

    $pdo = "UPDATE producten SET productnaam = :productnaam, omschrijving = :omschrijving, prijs = :prijs, categorie = :categorie WHERE id = :id";

    $stmt = $conn->prepare($pdo);

    $stmt->bindParam(:productnaam, $productnaam);
    $stmt->bindParam(:omschrijving, $omschrijving);
    $stmt->bindParam(:prijs, $prijs);
    $stmt->bindParam(:categorie, $categorie);
    $stmt->bindParam(:id, $id);

    if ($stmt->execute()) {
        echo "Product geüpdatet succesvol";
    } else {
        echo "Error updating product: " . $stmt->errorInfo()[2]; 
    }
}

$stmt = $conn->query("SELECT * FROM producten");
$products = $stmt->fetchAll();

?>
