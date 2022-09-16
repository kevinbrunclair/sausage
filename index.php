<?php

//include 'header.php';
//include 'footer.php';
require_once 'inc/connect.php';
require_once 'inc/my-functions.php';
require_once 'inc/database.php';
require_once 'class/Item.php';
require_once 'class/client.php';
require_once 'class/ClientsList.php';


$db = databaseConnect();
$products = selectallproducts($db);
$customers = selectallcustomers($db);
$items = [];
$clients = [];

foreach ($customers as $customer) {
    $clients[] = new Client($customer);

}
$Clientlist = new ClientsList($clients);


foreach ($products as $product) {
    $items [] = new Item($product);
}
?>
<pre>
<?php
//var_dump($Clientlist);
?>
</pre>

<!doctype html>

<html lang="fr">
<head>
    <title>Sausage Party</title>
    <meta charset="UTF-8">
</head>
<body>

<?php
foreach ($items as $item) {
    displayItem($item);
}
?>


</body>
</html>



