<?php include('delete product.php'); 
include('update product.php');
include('createproduct.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>create product</h2>
<form action="createproduct.php" method="post">
    <label for="createn">Productnaam:</label>
    <input type="text" id="createn" name="createn">
    <label for="omschrijving">Omschrijving:</label>
    <textarea id="omschrijving" name="omschrijving"></textarea>
    <label for="prijs">Prijs:</label>
    <input type="number" id="prijs" name="prijs">
    <label for="categorie">Categorie:</label>
    <input type="text" id="categorie" name="categorie">
    <input type="submit" name="register" value="Voeg toe">
</form><br><br>

<h2>Product Management</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Productnaam</th>
                <th>Omschrijving</th>
                <th>Prijs</th>
                <th>Categorie</th>
                <th>Update</th>
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
                        <form action="update product.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <input type="text" name="productnaam" value="<?php echo $product['productnaam']; ?>">
                            <input type="text" name="omschrijving" value="<?php echo $product['omschrijving']; ?>">
                            <input type="text" name="prijs" value="<?php echo $product['prijs']; ?>">
                            <input type="text" name="categorie" value="<?php echo $product['categorie']; ?>">
                            <input type="submit" value="Update">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?><br><br>
        
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

