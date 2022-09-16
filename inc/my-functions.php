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


function displayItem(Item $item): void
{
    ?>
    <div>
        <h3><?= $item->getName() ?></h3>
        <?php if ($item->getDiscount() == null) { ?>
            <p>Price : <?php formatPrice($item->getPrice()) ?></p>
            <?php
        } else { ?>
            <p>Discount : <?php echo $item->getDiscount() . " % " ?></p>
            Price : <span style="text-decoration: line-through red"><?php formatPrice($item->getPrice()) ?></span>
            <br><br><span><?php formatPrice(discountedPrice($item->getPrice(), $item->getDiscount())) ?></span>
            <?php
        } ?>
        <p>Price HT : <?php formatPrice(priceExcludingVAT($item->getPrice(), $item->getTva())) ?></p>
        <p>Weight : <?= $item->getWeight() ?></p>
        <!-- Début du formulaire -->
        <form action="../cart.php" method="POST">
            <!-- Zones de texte -->
            <label for="nom"> Quantité :
                <!-- Liste déroulante -->
                <input type="number" name="quantity" min="1" max="5">
                <input type="hidden" name="product_id" value="<?= $item->getId() ?>">
                <input type="hidden" name="delivery" value="0">
                <!-- Bouton -->
                <input type="submit" value="COMMANDER">
        </form> <!-- Fin du formulaire -->
        <br><br>
        <img src="<?= $item->getImage() ?>" alt="#">
    </div>
<?php }

function displayCatalogue(Catalogue $catalogue): void
{
    foreach ($catalogue->getItems() as $item) {
        displayItem($item);
    }
}

function displayClient(Client $customers): void
{
    ?>
    <div>
        <h3><?= $customers->first_name . " " . $customers->last_name ?></h3>
        <p>Address : <?= $customers->address ?></p>
        <p>Postal code : <?= $customers->postal_code ?></p>
        <p>City : <?= $customers->city ?></p>
    </div>
<?php }

function displayClientslist(ClientsList $clientsList): void

{
    foreach ($clientsList->getClients() as $customers) {
        displayClient($customers);
    }
}

