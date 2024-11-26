<?php

 declare(strict_types=1);


error_reporting(E_ALL);
ini_set('display_errors', '1');

    require_once 'broodje.php';
    require_once 'data_handler.php';

    class addBroodje
    {
        private $id;
        private $naam;
        private $omschrijving;
        private $prijs;

        public function __construct(string $naam, string $omschrijving, float $prijs)
        {
            $this->naam = $naam;
            $this->omschrijving = $omschrijving;
            $this->prijs = $prijs;
        }

        public function getNaam(): string
        {
            return $this->naam;
        }

        public function getOmschrijving(): string
        {
            return $this->omschrijving;
        }

        public function getPrijs(): float
        {
            return $this->prijs;
        }

}
?>