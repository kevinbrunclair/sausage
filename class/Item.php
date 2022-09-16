<?php

class Item
{
    //  attribuer les propriétés de la classe Item
    private ?string $name, $description, $image;
    private ?int $price, $weight, $available, $category_id, $quantity, $discount, $tva, $id;

    //  créer le constructeur de la classe Item
    function __construct(array $item)
    {
        $this->name = $item['name'];
        $this->description = $item['description'];
        $this->price = $item['price'];
        $this->image = $item['image'];
        $this->weight = $item['weight'];
        $this->quantity = $item['quantity'];
        $this->available = $item['available'];
        $this->id = $item['id'];
        $this->tva = $item['tva'];
        $this->discount = $item['discount'];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getAvailable()
    {
        return $this->available;
    }

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getTva()
    {
        return $this->tva;
    }

    public function getId()
    {
        return $this->id;
    }

}








