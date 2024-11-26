<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'data_handler.php';
require_once 'bestellingen.php';

class Bestelling
{
    private $id;
    private $klant_naam;
    private $datum;

    public function __construct(int $id, string $klant_naam, DateTime $datum)
    {
        $this->id = $id;
        $this->klant_naam = $klant_naam;
        $this->datum = $datum;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getKlant_naam(): string
    {
        return $this->klant_naam;
    }

    public function getDatum(): DateTime
    {
        return $this->datum;
    }
}


/* SQL CONTENT
--
 Table structure for table `bestellingen`
--

CREATE TABLE `bestellingen` (
  `id` int(11) NOT NULL,
  `broodjeId` int(11) NOT NULL,
  `gebruikerId` int(11) NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;--

--
-- Dumping data for table `bestellingen`
--

INSERT INTO `bestellingen` (`id`, `broodjeId`, `gebruikerId`, `datum`) VALUES
(5, 6, 3, '2023-01-12 11:52:52'),
(6, 4, 4, '2023-01-12 12:01:35');

-- --------------------------------------------------------
*/