<?php

include_once 'Item.php';
include_once 'Category.php';
include_once 'ProductType.php';

// Definisco la classe Product estendendo Item.
class Product extends Item {

    // Proprietà aggiuntive specifiche del prodotto.
    private $category;
    private $type;
    private $image;

    // Modifica del costruttore per utilizzare anche le proprietà della classe base.
    public function __construct($name, $price, Category $category, ProductType $type, $image) {
        
        // Chiama il costruttore della classe base
        parent::__construct($name, $price); 
        $this->category = $category;
        $this->type = $type;
        $this->image = $image;
    }

    // Metodi specifici del prodotto.
    public function getCategory() {
        return $this->category;
    }

    public function getType() {
        return $this->type;
    }

    public function getImage() {
        return $this->image;
    }
}

?>