<?php

class Client
{
    //  attribuer les propriétés de la classe Client
    public ?string $first_name, $last_name, $address, $postal_code, $city;
    public int $id;

    //  créer le constructeur de la classe Client
    public function __construct($customers)
    {
        $this->first_name = $customers['first_name'];
        $this->last_name = $customers['last_name'];
        $this->address = $customers['address'];
        $this->postal_code = $customers['postal_code'];
        $this->city = $customers['city'];
        $this->id = $customers['id'];
    }

}