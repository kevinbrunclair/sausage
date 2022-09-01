<?php
session_start();
include 'inc/database.php';
include 'my-functions.php';
include 'inc/connect.php';
$mysqlConnection = databaseConnect();
?>

<a href="index.php">Continuer vos achats</a>

<?php
// Initialiser le panier dans la session la première fois
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}
// On ajoute le produit au panier
$product_id = $_POST['product_id'];
$quantity = intval($_POST['quantity']);

// On retire du panier si 0
if ($quantity == 0) {
    unset($_SESSION["cart"][$product_id]);
    // Déjà dans le panier, mise à jour de la quantité
} elseif (isset($_SESSION["cart"][$product_id])) {
    $_SESSION["cart"][$product_id]["quantity"] += $quantity;
    // Ajout au panier
} else {
    $_SESSION["cart"][$product_id] = [
        'quantity' => $quantity,
        'id' => $product_id,
    ];
}
?>

<form method="post" action="confirmation.php">

    <?php foreach ($_SESSION["cart"] as $key => $val) {
        $quantity = $_POST['quantity'];
        if ($val['id'] == $product_id) {
            $_SESSION["cart"][$key]["quantity"] += $val['quantity'];
        }


        $id = intval($_SESSION["cart"][$key]["id"]); // passe mon id de string a int //
        $products = getProductById($mysqlConnection, $id);

        ?>

        <?php foreach ($products as $keys => $item) { // affiche les produit du panier via l'id de la base donnée // ?>
            <div class="col-md-6 col-sm-6 col-xs-12 d-flex">
                <h1>Article : <?= $item['name'] ?></h1>
                <img src="<?= $item['image'] ?> ">
                <h2>Prix : <?= formatPrice($item['price']) ?></h2>
                <h2>Quantity : <?= $quantity ?></h2>
                <!--                <h2>poids : --><? //= total($item['weight'], $quantity) ?><!-- Kg</h2>-->
                <!--                <h2>Total : --><? //= formatPrice(total($item['price'], $quantity)) ?><!--</h2>-->

            </div>


        <?php } ?>

    <?php } ?>


    <label class="justify-content-center">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="quantity" value="<?= $quantity ?>">
        <br>
        <div class="d-flex flex-column mt-4 ">
            <button style="width: 50%" class="btn btn-primary btn-sm" type="submit">Valider mon panier</button>
        </div>
</form>






