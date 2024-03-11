<?php

// Classe base generica per vari tipi di articoli.
class Item {
    // Proprietà protette, comuni a tutti gli oggetti che estendono questa classe.
    protected $name;
    protected $price;

    // Costruttore generico per la classe base.
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    // Metodi accessori comuni.
    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }
}

?>