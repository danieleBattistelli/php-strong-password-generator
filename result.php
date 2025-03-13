<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generata</title>
</head>

<body>
    <h1>Password Generata</h1>
    <?php
    if (isset($_SESSION['generated_password'])) {
        $password = htmlspecialchars($_SESSION['generated_password']);
        echo "<p>La tua password generata è: $password</p>";
        unset($_SESSION['generated_password']); // Rimuove la password dalla sessione dopo averla mostrata
    } else {
        echo "<p>Nessuna password generata.</p>";
    }
    ?>
    <a href="index.php">Torna indietro</a>
</body>

</html>