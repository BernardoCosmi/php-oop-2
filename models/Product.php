<?php

include_once 'Category.php';
include_once 'ProductType.php';

// Definisco la classe Product.
class Product {
    
    // Proprietà private del prodotto.
    private $name;    
    private $price;   
    private $category; 
    private $type;     
    private $image;    

    // Inizializzo il prodotto con i dettagli specificati.
    public function __construct($name, $price, Category $category, ProductType $type, $image) {
        $this->name = $name;         
        $this->price = $price;       
        $this->category = $category; 
        $this->type = $type;         
        $this->image = $image;       
    }

    // Fornisco il nome del prodotto.
    public function getName() {
        return $this->name;
    }

    // Fornisco il prezzo del prodotto.
    public function getPrice() {
        return $this->price;
    }

    // Fornisco la categoria del prodotto.
    public function getCategory() {
        return $this->category;
    }

    // Fornisco il tipo del prodotto.
    public function getType() {
        return $this->type;
    }

    // Fornisco l'immagine del prodotto.
    public function getImage() {
        return $this->image;
    }
}

?>