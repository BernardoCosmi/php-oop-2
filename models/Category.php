<?php

// Definisco la classe Category.
class Category {
    
    // Proprietà privata: nome della categoria.
    private $name;    

    // Inizializzo la categoria con il nome fornito.
    public function __construct($name) {
        $this->name = $name;
    }

    // Fornisco il nome della categoria.
    public function getName() {
        return $this->name;
    }
}

?>