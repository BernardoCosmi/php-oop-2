<?php

include_once __DIR__ . '/models/Product.php';
include_once __DIR__ . '/models/Category.php';
include_once __DIR__ . '/models/ProductType.php';

$products = [
    new Product('Cibo per gatti', 20.99, new Category('Gatti'), new ProductType('Cibo'), 'cibo_gatti.jpg'),
    new Product('Palla', 9.99, new Category('Cani'), new ProductType('Giochi'), 'palla_cani.jpg'),
    new Product('Cuccia per gatti', 34.99, new Category('Gatti'), new ProductType('Cucce'), 'cuccia_gatti.jpg'),
    new Product('Cuccia per cani', 49.99, new Category('Cani'), new ProductType('Cucce'), 'cuccia_cani.jpg'),
    new Product('Tiragraffi', 15.99, new Category('Gatti'), new ProductType('Giochi'), 'tiragraffi.jpg'),
    new Product('Osso masticabile', 5.99, new Category('Cani'), new ProductType('Giochi'), 'osso_masticabile.jpg'),
    new Product('Collare per gatti', 8.99, new Category('Gatti'), new ProductType('Accessori'), 'collare_gatti.jpg'),
    new Product('Guinzaglio per cani', 12.99, new Category('Cani'), new ProductType('Accessori'), 'guinzaglio_cani.jpg'),
    new Product('Spazzola ', 7.99, new Category('Gatti'), new ProductType('Cura'), 'spazzola_gatti.jpg'),
    new Product('Shampoo per cani', 11.99, new Category('Cani'), new ProductType('Cura'), 'shampoo_cani.jpg')
];
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

<div class="products-container d-flex flex-wrap">
    <?php foreach ($products as $product): ?>
        <div class='product-card card m-2' style="width: 18rem;">
            <img src='<?= $product->getImage() ?>' alt='<?= $product->getName() ?>' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title product-name'><?= $product->getName() ?></h5>
                <p class='card-text product-price'>€<?= $product->getPrice() ?></p>
                <p class='card-text product-category'>Categoria: <?= $product->getCategory()->getName() ?></p>
                <p class='card-text product-type'>Tipo: <?= $product->getType()->getType() ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>