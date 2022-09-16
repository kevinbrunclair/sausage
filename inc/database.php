<?php

function selectAllProducts(PDO $mysqlConnection): array
{
    $query = "SELECT * FROM products";
    $result = $mysqlConnection->query($query);
    return $result->fetchAll();
}

function selectAllcustomers(PDO $mysqlConnection): array
{
    $query = "SELECT * FROM customers";
    $result = $mysqlConnection->query($query);
    return $result->fetchAll();
}


function getProductById(PDO $mysqlConnection, int $id): array
{
    $query = "SELECT * FROM products WHERE id = $id";
    $result = $mysqlConnection->query($query);
    return $result->fetchAll();


}

// add order by product id
function addOrder(PDO $mysqlConnection)
{
    $customer_id = rand(1, 3);
    $query = "INSERT INTO `orders`( `customer_id`, `date`) VALUES ($customer_id, CURDATE());";
    $mysqlConnection->query($query);
    echo "command passé";
}

function createOrderProduct(PDO $mysqlConnection, $order_id, $product_id, $quantity)
{
    $query = "INSERT INTO order_product (order_id, product_id, quantity) VALUES ($order_id, $product_id, $quantity)";
    $mysqlConnection->query($query);
    echo "Order_product created successfully";
}

function getLastOrderId(PDO $mysqlConnection)
{
    $query = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
    $result = $mysqlConnection->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

//function to delete a product from the database

function deleteProduct(PDO $mysqlConnection, $product_id){
    $query = "DELETE FROM products WHERE id = $product_id";
    $mysqlConnection->query($query);
}

//function to add a product to the database

function addProduct(PDO $mysqlConnection, $name, $price, $quantity) {
    $query = "INSERT INTO products (`name`, `price`, `quantity`) VALUES ($name, $price, $quantity)";
    $mysqlConnection->query($query);
}



