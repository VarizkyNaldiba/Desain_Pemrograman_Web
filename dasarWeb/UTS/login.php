<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="login.php" method="post">
  <div class="row g-3 align-items-center">
    <div class="col-auto">
      <label for="inputPassword6" class="col-form-label">Your Code !</label>
    </div>
    <div class="col-auto">
      <div class="input-group">
        <input type="password" id="inputPassword6" name="kode" class="form-control" aria-describedby="passwordHelpInline" style="text-align: center;">
      </div>
    </div>
    <div class="col-auto"><button type="submit" class="btn btn-secondary">Enter</button></div>
  </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["kode"] == "12345") {
        header("Location: tatib.php");
    } else {
        echo "<script>alert('Kode Salah !');</script>";
    }
}
?>
</body>
</html>

