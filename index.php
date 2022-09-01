<?php

//include 'header.php';
//include 'footer.php';
require_once 'inc/connect.php';
require_once 'my-functions.php';
require_once 'inc/database.php';
global $products;
$db = databaseConnect();
$products = selectallproducts($db);

?>


<!doctype html>

<html lang="fr">
<head>
    <title>Sausage Party</title>
    <meta charset="UTF-8">
</head>
<body>


<?php
foreach ($products as $product) {
    ?>

    <div>
        <h3><?= $product['name'] ?></h3>
        <?php if ($product["discount"] == null) { ?>
            <p>Price : <?php formatPrice($product["price"]) ?></p>
            <?php
        } else { ?>
            <p>Discount : <?php echo $product["discount"] . " % " ?></p>
            Price : <span style="text-decoration: line-through red"><?php formatPrice($product['price']) ?></span>
            <br><br><span><?php formatPrice(discountedPrice($product["price"], $product["discount"])) ?></span>
            <?php
        } ?>
        <p>Price HT : <?php formatPrice(priceExcludingVAT($product["price"], $product["tva"])) ?></p>
        <p>Weight : <?= $product["weight"] ?></p>
        <!-- Début du formulaire -->
        <form action="cart.php" method="POST">
            <!-- Zones de texte -->
            <label for="nom"> Quantité :
                <!-- Liste déroulante -->
                <input type="number" name="quantity" min="1" max="5">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <input type="hidden" name="delivery" value="0">
                <!-- Bouton -->
                <input type="submit" value="COMMANDER">
        </form> <!-- Fin du formulaire -->
        <br><br>
        <img src="<?= $product['image'] ?>" alt="#">
    </div>
    <?php
}
?>
</body>
</html>



