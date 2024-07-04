<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Delete'])) {
    $id = $_POST['delete'];

   
    $stmt = $conn->prepare("DELETE FROM producten WHERE id = :id");
    $stmt->bindParam(':id', $id);
    

    $stmt->execute();

   

   

 
}

$stmt = $conn->query("SELECT * FROM producten");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h2>Product Management</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Productnaam</th>
                <th>Omschrijving</th>
                <th>Prijs</th>
                <th>Categorie</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['productnaam']; ?></td>
                    <td><?php echo $product['omschrijving']; ?></td>
                    <td><?php echo $product['prijs']; ?></td>
                    <td><?php echo $product['categorie']; ?></td>
                    <td>
                        <form action="delete product.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <input type="text" name="productnaam" value="<?php echo $product['productnaam']; ?>">
                            <input type="text" name="omschrijving" value="<?php echo $product['omschrijving']; ?>">
                            <input type="text" name="prijs" value="<?php echo $product['prijs']; ?>">
                            <input type="text" name="categorie" value="<?php echo $product['categorie']; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

