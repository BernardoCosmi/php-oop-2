<?php

include_once 'Item.php';
include_once 'Category.php';
include_once 'ProductType.php';
include_once 'OutOfStock.php';

// Aggiunta del trait 'Discountable' per consentire la gestione degli sconti sui prodotti
trait Discountable {
    private $discount = 0; // Percentuale di sconto applicata al prodotto

    // Imposta uno sconto per il prodotto
    public function setDiscount($discount) {
        $this->discount = $discount;
    }

    // Restituisce lo sconto attualmente applicato al prodotto
    public function getDiscount() {
        return $this->discount;
    }

    // Calcola il prezzo del prodotto dopo l'applicazione dello sconto
    public function applyDiscount() {
        // Calcola il prezzo scontato e formatta il risultato con due cifre decimali
        return number_format($this->price - ($this->price * $this->discount / 100), 2, '.', '');
    }
}

// Definisco la classe Product estendendo Item.
class Product extends Item {
    use Discountable; // Uso il trait Discountable per applicare sconti ai prodotti

    // Proprietà aggiuntive specifiche del prodotto.
    private $category;
    private $type;
    private $image;

    // Modifica del costruttore per includere lo stock.
    public function __construct($name, $price, Category $category, ProductType $type, $image, $stock = 0) {
        
        parent::__construct($name, $price);
        $this->category = $category;
        $this->type = $type;
        $this->image = $image;
        $this->stock = $stock; // Inizializza lo stock
    }


    // Metodo per "acquistare" il prodotto
    public function buy($quantity = 1) {
        if ($this->stock < $quantity) {
            throw new OutOfStockException("Siamo spiacenti, il prodotto ". '"'. $this->getName().'"' . " risulta esaurito");
        }
        $this->stock -= $quantity; // Riduci lo stock
    }

    // Restituisce la categoria del prodotto
    public function getCategory() {
        return $this->category;
    }

    // Restituisce il tipo del prodotto
    public function getType() {
        return $this->type;
    }

    // Restituisce l'immagine del prodotto
    public function getImage() {
        return $this->image;
    }
}

?>