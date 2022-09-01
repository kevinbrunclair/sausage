<?php

function selectAllProducts(PDO $mysqlConnection): array
{
    $query = "SELECT * FROM products";
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
    $query = "INSERT INTO `orders`( `customer_id`, `date`) VALUES ($customer_id, '2015');";
    $result = $mysqlConnection->query($query);
    echo "command passé";
}

// add order_product
function addOrderProduct(PDO $mysqlConnection, $product_id, $quantity)
{
    $query = "INSERT INTO `order_product`(`order_id`, `product_id`, `quantity`) VALUES (2,$product_id,$quantity);";
    $result = $mysqlConnection->query($query);
    echo "command passé";
}


