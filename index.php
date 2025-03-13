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
        <button type="submit">Genera Password</button>
    </form>

    <?php
    function generatePassword($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
        $charactersLength = strlen($characters);
        $randomPassword = '';
        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomPassword;
    }

    if (isset($_GET['length'])) {
        $length = intval($_GET['length']);
        if ($length > 0) {
            $password = generatePassword($length);
            echo "<p>Password generata: <strong>$password</strong></p>";
        } else {
            echo "<p>Per favore, inserisci una lunghezza valida.</p>";
        }
    }
    ?>
</body>

</html>