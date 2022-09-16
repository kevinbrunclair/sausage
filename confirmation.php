<?php

require_once 'inc/connect.php';
require_once 'inc/database.php';

$db = databaseConnect();

var_dump($_POST);

$id = $_POST['id'];
$quantity = $_POST['quantity'];

addOrder($db);
$order_id = getLastOrderId($db)[0]['id'];
var_dump($order_id);
createOrderProduct($db, $order_id, $id, $quantity);