<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'data_handler.php';
require_once 'add_broodje.php';


// Create an instance of DataHandler
$dataHandler = new DataHandler();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $klantNaam = $_POST['klant_naam'] ?? '';
    $broodjeId = $_POST['broodje_id'] ?? 0;

    if (!empty($klantNaam) && $broodjeId > 0) {
        $success = $dataHandler->addBestelling($klantNaam, (int)$broodjeId);

        if ($success) {
            // Redirect to the main page with a success message
            header("Location: broodjes_bar.php?success=1");
            exit;
        } else {
            echo "<p>Fout bij het toevoegen van de bestelling.</p>";
        }
    } else {
        echo "<p>Alle velden zijn verplicht!</p>";
    }
}

// Fetch broodjes to display
$broodjes = $dataHandler->getBroodjes();

// Determine the success or error message
$message = '';
if (isset($_GET['success'])) {
    if ($_GET['success'] == '1') {
        $message = '<p style="color: green;">De bestelling is succesvol toegevoegd!</p>';
    } elseif ($_GET['success'] == '0') {
        $message = '<p style="color: red;">Er is een fout opgetreden bij het toevoegen van de bestelling. Probeer opnieuw.</p>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broodjes Bar</title>
</head>
<body>
    <h1>Broodjes Bar</h1>

        <!-- Success or Error Message -->
        <?php if (!empty($message)): ?>
        <div class="message <?php echo ($_GET['success'] == '1') ? 'success' : 'error'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>


        <!-- Button to navigate to bestellingen.php -->
        <div style="margin-bottom: 20px;">
        <a href="bestellingen.php">
            <button type="button">Ga naar Bestellingen</button>
        </a>
    </div>
    
    <table border="1">
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>Omschrijving</th>
        <th>Prijs</th>
    </tr>
    <?php if (!empty($broodjes)): ?>
        <?php foreach ($broodjes as $broodje): ?>
            <tr>
                <?php foreach (['ID', 'Naam', 'Omschrijving', 'Prijs'] as $field): ?>
                    <td><?php echo htmlspecialchars($broodje[$field]); ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">0 results</td>
        </tr>
    <?php endif; ?>
</table>



<form method="POST" action="broodjes_bar.php">
    <label for="klant_naam">Klant Naam:</label>
    <input type="text" id="klant_naam" name="klant_naam" required>
    <br>
    <label for="broodje_id">Select Broodje:</label>
    <select name="broodje_id" id="broodje_id" required>
        <option value="">Select a Broodje</option>
        <?php if (!empty($broodjes)): ?>
            <?php foreach ($broodjes as $broodje): ?>
                <option value="<?php echo htmlspecialchars($broodje['ID']); ?>">
                    <?php echo htmlspecialchars($broodje['Naam']); ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="">No Broodjes Available</option>
        <?php endif; ?>
    </select>
    <br>
    <button type="submit">Bestelling Toevoegen</button>
</form>


</body>
</html>