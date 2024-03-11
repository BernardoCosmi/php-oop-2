<?php

class OutOfStockException extends Exception {
    public function __construct($message = "Siamo spiacenti, il prodotto", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
?>