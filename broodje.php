<?php

declare(strict_types=1);

require_once 'data_handler.php';
require_once 'add_broodje.php';

$dataHandler = new DataHandler();
$dataHandler->getBroodjes();

class Broodje
{
    private $id;
    private $naam;
    private $omschrijving;
    private $prijs;

    public function __construct(int $id, string $naam, string $omschrijving, float $prijs)
    {
        $this->id = $id;
        $this->naam = $naam;
        $this->omschrijving = $omschrijving;
        $this->prijs = $prijs;
    }

    public function getId(): int
    {
        return $this->id;
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

/* SQL CONTENT
    CREATE TABLE `broodjes` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(50) NOT NULL,
  `Omschrijving` varchar(500) NOT NULL,
  `Prijs` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `broodjes`
--

INSERT INTO `broodjes` (`ID`, `Naam`, `Omschrijving`, `Prijs`) VALUES
(1, 'Kaas', 'Broodje met jonge kaas', '1.90'),
(2, 'Ham', 'Broodje met natuurham', '1.90'),
(3, 'Kaas en ham', 'Broodje met kaas en ham', '2.10'),
(4, 'Fitness kip', 'kip natuur, yoghurtdressing, perzik, tuinkers, tomaat en komkommer', '3.50'),
(5, 'Broodje Sombrero', 'kip natuur, andalousesaus, rode paprika, maïs, sla, komkommer, tomaat, ei en ui ', '3.70'),
(6, 'Broodje americain-tartaar', 'americain, tartaarsaus, ui, komkommer, ei en tuinkers ', '3.50'),
(7, 'Broodje Indian kip', 'kip natuur, ananas, tuinkers, komkommer en curry dressing', '4.00'),
(8, 'Grieks broodje', 'feta, tuinkers, komkommer, tomaat en olijventapenade', '3.90'),
(9, 'Tonijntino', 'tonijn pikant, ui, augurk, martinosaus en (tabasco)', '2.60'),
(10, 'Wrap exotisch', 'kip natuur, cocktailsaus, sla, tomaat, komkommer, ei en ananas', '3.70'),
(11, 'Wrap kip/spek', 'Kip natuur, spek, BBQ saus, sla, tomaat en komkommer', '4.00');

-- --------------------------------------------------------

*/