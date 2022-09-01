<?php

function formatPrice(int $price): void
{
    $price = ($price / 100);
    echo number_format($price, 2) . " € ";
}


function priceExcludingVAT(int $priceTTC, int $TVA = 20): int
{
    return ($priceTTC * 100) / ($TVA + 100);

}

function discountedPrice(int $selling_price, int $discount_price): int
{
    return $selling_price - ($selling_price * $discount_price / 100);

}
