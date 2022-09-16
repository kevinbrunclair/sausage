<?php

class Catalogue
{
    private array $items;

    function __construct()
    {
        $mysqlConnection = databaseConnect();
        $products = selectAllProducts($mysqlConnection);
        $this->setItems($products);

    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        foreach ($items as $item) {
            $this->items[] = new Item($item);
        }
    }


}