<?php

include 'inc/connect.php';
include 'inc/database.php';

$db = databaseConnect();

var_dump($_POST);

$id = $_POST['id'];
$quantity = $_POST['quantity'];

addOrder($db);
addOrderProduct($db, $id, $quantity);