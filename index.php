<?php

include_once __DIR__ . '/models/Product.php';
include_once __DIR__ . '/models/Category.php';
include_once __DIR__ . '/models/ProductType.php';
include_once __DIR__ . '/models/OutOfStockException.php';

$products = [
    new Product('Cibo per gatti', 20.99, new Category('Gatti'), new ProductType('Cibo'), 'cibo_gatti.jpg', 10),
    new Product('Palla', 9.99, new Category('Cani'), new ProductType('Giochi'), 'palla_cani.jpg', 10),
    new Product('Cuccia per gatti', 34.99, new Category('Gatti'), new ProductType('Cucce'), 'cuccia_gatti.jpg', 10),
    new Product('Cuccia per cani', 49.99, new Category('Cani'), new ProductType('Cucce'), 'cuccia_cani.jpg', 0),
    new Product('Tiragraffi', 15.99, new Category('Gatti'), new ProductType('Giochi'), 'tiragraffi.jpg', 10),
    new Product('Osso masticabile', 5.99, new Category('Cani'), new ProductType('Giochi'), 'osso_masticabile.jpg', 10),
    new Product('Collare per gatti', 8.99, new Category('Gatti'), new ProductType('Accessori'), 'collare_gatti.jpg', 0),
    new Product('Guinzaglio per cani', 12.99, new Category('Cani'), new ProductType('Accessori'), 'guinzaglio_cani.jpg', 10),
    new Product('Spazzola ', 7.99, new Category('Gatti'), new ProductType('Cura'), 'spazzola_gatti.jpg', 10),
    new Product('Shampoo per cani', 11.99, new Category('Cani'), new ProductType('Cura'), 'shampoo_cani.jpg', 0)
];

// Applico uno sconto del 30% a tutti i prodotti della categoria 'Gatti' (Gatti>>>Cani)
foreach ($products as $product) {
    if ($product->getCategory()->getName() == 'Gatti') {
        $product->setDiscount(30);
    }
}

// Tentativo di acquistare un prodotto
$purchaseMessage = ''; // Inizializzo il messaggio di acquisto come una stringa vuota
if (isset($_GET['buy'])) {
    $productIndex = $_GET['buy'];
    try {
        $products[$productIndex]->buy(1);
        $purchaseMessage = 'Acquisto riuscito! L\'ordine sarà spedito entro 2 giorni lavorativi.';
    } catch (OutOfStockException $e) {
        $purchaseMessage = '' . $e->getMessage(); // Mostro messaggio di errore se il prodotto è esaurito
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-oop-2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<h1 class="text-uppercase text-center mt-5 m-3 fw-bold">
    pet shop
</h1>

<!-- Pulsante di ricarica -->
<a href="/php-oop-2/" class="btn btn-primary d-block mx-auto" style="width: 200px;">Ricarica la pagina</a>

<div class="products-container d-flex flex-wrap m-auto gap-2 justify-content-center" style="width: 85%;">
    <?php foreach ($products as $index => $product): ?>
        <div class='product-card card m-3 col-2 d-flex flex-column'>
            <img src='./assets/<?= $product->getImage() ?>' alt='<?= $product->getName() ?>' class='card-img-top'>
            <div class='card-body d-flex flex-column text-center'> 
                <h5 class='card-title product-name mb-2'><?= $product->getName() ?></h5>
                <p class='card-text product-price mb-2'>€<?= $product->applyDiscount() ?>
                    <?php if ($product->getDiscount() > 0): ?>
                        <small><del>€<?= $product->getPrice() ?></del></small>
                    <?php endif; ?>
                </p>
                <p class='card-text product-category mb-2'>Categoria: <?= $product->getCategory()->getName() ?></p>
                <p class='card-text product-type mb-3'>Tipo: <?= $product->getType()->getType() ?></p>
                <a href="?buy=<?= $index ?>" class="btn btn-primary mt-auto">Acquista</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    
<script>
    // Verifico se esiste un messaggio di acquisto e mostro l'alert
    <?php if (!empty($purchaseMessage) && isset($_GET['buy'])): ?>
    alert('<?= addslashes($purchaseMessage) ?>');
    <?php endif; ?>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>