<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'data_handler.php';
require_once 'bestelling.php';
require_once 'broodje.php';

// Create a DataHandler instance
$dataHandler = new DataHandler();

// Fetch the list of bestellingen
$bestellingen = $dataHandler->getBestellingen();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Bestellingen</title>
</head>
<body>
    <h1>Overzicht Bestellingen</h1>
    <table border="1">
        <tr>
            <th>Bestel ID</th>
            <th>Broodje</th>
            <th>Klant Naam</th>
            <th>Datum</th>
        </tr>
        <?php if (!empty($bestellingen)): ?>
    <?php foreach ($bestellingen as $bestelling): ?>
        <tr>
            <?php foreach (['id', 'broodje_naam', 'klant_naam', 'datum'] as $field): ?>
                <td><?php echo htmlspecialchars($bestelling[$field]); ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="4">Geen bestellingen gevonden</td>
    </tr>
<?php endif; ?>
    </table>

    <!-- Back to Broodjes Bar Button -->
    <div style="margin-top: 20px;">
        <a href="broodjes_bar.php">
            <button type="button">Terug naar Broodjes Bar</button>
        </a>
    </div>
</body>
</html>