<?php

// Definisco la classe ProductType.
class ProductType {
    
    // Proprietà privata: tipo del prodotto.
    private $type;    

    // Inizializzo il tipo di prodotto.
    public function __construct($type) {
        $this->type = $type;
    }

    // Fornisco il tipo di prodotto.
    public function getType() {
        return $this->type;
    }
}

?>