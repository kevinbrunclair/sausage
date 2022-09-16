<?php

class Colorsitems extends Item
{
    //  attribuer les propriétés de la classe itembleu
    public ?string $color;

    function __construct(array $item)
    {
        $this->color = $item['color'];
        parent::__construct($item);
    }


}