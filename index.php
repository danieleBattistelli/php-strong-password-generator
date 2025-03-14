<?php
session_start();
require_once 'functions.php';

if (isset($_GET['length'])) {
    $length = intval($_GET['length']);
    $letters = isset($_GET['letters']);
    $numbers = isset($_GET['numbers']);
    $symbols = isset($_GET['symbols']);
    $allow_repeats = isset($_GET['allow_repeats']) && $_GET['allow_repeats'] == '1';

    if ($length > 0) {
        $password = generatePassword($length, $letters, $numbers, $symbols, $allow_repeats);
        $_SESSION['generated_password'] = $password;
        header('Location: password.php');
        exit();
    } else {
        $error_message = "Per favore, inserisci una lunghezza valida.";
    }
}
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore di Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="centered-block">
        <h1>Strong Password Generator</h1>
        <h2>Genera una password sicura</h2>
        <div class="form-container">
            <form method="GET" action="">

                <label for="length">Lunghezza della password:</label>
                <input type="number" id="length" name="length" min="5" max="20" required>
                <br>
                <label for="allow_repeats">Consenti ripetizioni di uno o più caratteri:</label>
                <br>
                <input type="radio" id="allow_repeats_yes" name="allow_repeats" value="1" checked>
                <label for="allow_repeats_yes">Sì</label>
                <input type="radio" id="allow_repeats_no" name="allow_repeats" value="0">
                <label for="allow_repeats_no">No</label>
                <br>
                <label for="letters">Lettere:</label>
                <input type="checkbox" id="letters" name="letters" value="1">
                <br>
                <label for="numbers">Numeri:</label>
                <input type="checkbox" id="numbers" name="numbers" value="1">
                <br>
                <label for="symbols">Simboli:</label>
                <input type="checkbox" id="symbols" name="symbols" value="1">
                <br>
                <button type="submit" class="btn btn-primary">Invia</button>

                <button type="reset" class="btn btn-secondary">Annulla</button>

            </form>
        </div>
        <?php
        if (isset($error_message)) {
            echo "<p>$error_message</p>";
        }
        ?>
    </div>
</body>

</html>