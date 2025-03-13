<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generata</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .centered-block {
            background-color: black;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .centered-block h1 {
            color: grey;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="centered-block">
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
        <a href="index.php" class="btn btn-primary mt-3">Torna indietro</a>
    </div>
</body>

</html>