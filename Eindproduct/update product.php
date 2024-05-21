<?php

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['id']; 
    $product_naam = $_POST['productnaam'];
    $product_omschrijving = $_POST['omschrijving'];
    $product_prijs = $_POST['prijs'];
    $product_categorie = $_POST['categorie']; 

    $pdo = "UPDATE producten SET productnaam=?, omschrijving=?, prijs=?, categorie=? WHERE id=?";

    $stmt = $conn->prepare($pdo);

    $stmt->bindParam(1, $product_naam);
    $stmt->bindParam(2, $product_omschrijving);
    $stmt->bindParam(3, $product_prijs);
    $stmt->bindParam(4, $product_categorie);
    $stmt->bindParam(5, $product_id);

    if ($stmt->execute()) {
        echo "Product geüpdatet succesvol";
    } else {
        echo "Error updating product: " . $stmt->errorInfo()[2]; 
    }
}

$stmt = $conn->query("SELECT * FROM producten");
$products = $stmt->fetchAll();

?>
