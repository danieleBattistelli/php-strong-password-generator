<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generatore di Password</title>
</head>

<body>
    <h1>Strong Password Generator</h1>
    <h2>Genera una password sicura</h2>
    <form method="GET" action="">
        <label for="length">Lunghezza della password:</label>
        <input type="number" id="length" name="length" min="1" required>
        <br>
        <label for="uppercase">Lettere maiuscole:</label>
        <input type="checkbox" id="uppercase" name="uppercase" value="1">
        <br>
        <label for="lowercase">Lettere minuscole:</label>
        <input type="checkbox" id="lowercase" name="lowercase" value="1">
        <br>
        <label for="numbers">Numeri:</label>
        <input type="checkbox" id="numbers" name="numbers" value="1">
        <br>
        <label for="symbols">Simboli:</label>
        <input type="checkbox" id="symbols" name="symbols" value="1">
        <br>
        <label for="allow_repeats">Consenti ripetizioni:</label>
        <input type="checkbox" id="allow_repeats" name="allow_repeats" value="1">
        <br>
        <button type="submit">Genera Password</button>
    </form>

    <?php
    include 'functions.php';

    if (isset($_GET['length'])) {
        $length = intval($_GET['length']);
        $uppercase = isset($_GET['uppercase']);
        $lowercase = isset($_GET['lowercase']);
        $numbers = isset($_GET['numbers']);
        $symbols = isset($_GET['symbols']);
        $allow_repeats = isset($_GET['allow_repeats']);

        if ($length > 0) {
            $password = generatePassword($length, $uppercase, $lowercase, $numbers, $symbols, $allow_repeats);
            $_SESSION['generated_password'] = $password;
            header('Location: result.php');
            exit();
        } else {
            echo "<p>Per favore, inserisci una lunghezza valida.</p>";
        }
    }
    ?>
</body>

</html>
<?php
ob_end_flush();
?>