<?php include('Connection.php'); ?>
<html>
<head>
    <link rel="stylesheet" href="css/style.css" >
</head>
<body>
<header>
<?php include('header.php') ?>
</header>
<main>
<div class="product-container">
    <table class="product-table">
        <tr>
            <?php
            $sql = "SELECT * FROM producten";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();

            $count = 0;
            foreach ($result as $product){
                if ($count % 3 == 0 && $count != 0) {
                    echo '</tr><tr>'; 
                }
                echo '<td>';
                echo '<div class="product-wrapper">';
                echo '<div class="product">';
                echo '<h2 class="product-name">'. $product['productnaam'] .'</h2>';
                echo '<p class="product-oms">'. $product['omschrijving'] .'</p>';
                echo '<p class="product-price">Prijs: €'. $product['prijs'] .'</p>';
                echo '<p class="product-cat">Categorie: '. $product['categorie'] .'</p>';
                echo '<form class="product-form" action="bestel.php" method="POST">';
                echo '<input type="hidden" name="product_id" value="'. $product['id'] . '">';
                echo '<input type="number" name="quantity" value="1" min="1" class="product-quantity">';
                echo '<input type="submit" value="Toevoegen" class="add-to-cart-btn">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</td>';

                $count++;
            }
            ?>
        </tr>
    </table>
</div>
        </main>
<?php //include('footer.php') ?>

</body>
</html>
