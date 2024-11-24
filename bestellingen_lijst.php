<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'data_handler.php';
require_once 'bestelling.php';

class BestellingenLijst
{
    private $klant_naam;
    private $broodje_id;
    private $datum;


    public function __construct(string $klant_naam, int $broodje_id, DateTime $datum)
    {
        $this->klant_naam = $klant_naam;
        $this->broodje_id = $broodje_id;
        $this->datum = $datum;
    }

    public function getKlantNaam(): string
    {
        return $this->klant_naam;
    }

    public function getBroodjeId(): int
    {
        return $this->broodje_id;
    }

    public function getDatum(): DateTime
    {
        return $this->datum;
    }


}