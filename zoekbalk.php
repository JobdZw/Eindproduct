<?php
include('connection.php');

if (isset($_GET['zoekterm'])) {
    $zoekterm = '%' . $_GET['zoekterm'] . '%';
    $stmt = $conn->prepare("SELECT * FROM producten WHERE productnaam LIKE :zoekterm OR categorie LIKE :zoekterm");
    $stmt->execute([':zoekterm' => $zoekterm]);
    $products = $stmt->fetchAll();
} else {
    $stmt = $conn->query("SELECT * FROM producten");
    $products = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Zoekresultaten</title>
<body>
    <h2>Zoekresultaten</h2>
    <a href="index.php">Terug naar Zoeken</a>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Productnaam</th>
                <th>Omschrijving</th>
                <th>Prijs</th>
                <th>Categorie</th>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
