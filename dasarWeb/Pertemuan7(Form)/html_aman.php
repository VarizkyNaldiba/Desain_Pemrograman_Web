<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Aman</title>
</head>
<body>
    <h2>Form Input</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="input">Masukkan teks:</label>
        <input type="text" id="input" name="input">
        <br><br>
        <label for="email">Masukkan email:</label>
        <input type="email" id="email" name="email">
        <br><br>
        <input type="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi dan sanitasi input teks
        $input = $_POST["input"];
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        echo "<p>Input yang aman: " . $input . "</p>";

        // Validasi email
        if (!empty($_POST["email"])) {
            $email = $_POST["email"];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<p>Email yang valid: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</p>";
            } else {
                echo "<p>Email tidak valid!</p>";
            }
        } else {
            echo "<p>Email tidak boleh kosong!</p>";
        }
    }
    ?>
</body>
</html>