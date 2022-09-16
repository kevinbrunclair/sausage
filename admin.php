<?php
require_once 'inc/connect.php';
require_once 'inc/database.php';
$mysqlConnection = databaseConnect();
$products = selectAllProducts($mysqlConnection);
var_dump($_POST);

?>

<?php
if (isset($_POST['add'])) {
    addProduct($mysqlConnection);
    echo "Product added successfully";
}


if (isset($_POST['delete'])) {
    deleteProduct($mysqlConnection, $_POST['id']);
    echo "Product deleted successfully";

    var_dump($_POST['name']);



}

?>
<form method="post">
    <select name="product" id="product_id">
        <?php foreach ($products as $product) { ?>
        <option value="<?php echo $product['id'] ?>"><?php echo $product['name'] ?></option>
        <?php } ?>
        <input type="submit" value="ajouter" name="add"/>
</form>


<form method="post">
    <select name="product_id" id="product_id">
        <?php foreach ($products as $product) { ?>
        <option value="<?php echo $product['id'] ?>"><?php echo $product['name'] ?></option>
        <?php } ?>
        <input type="submit" value="Supprimer" name="delete"/>
</form>

