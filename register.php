<?php
session_start();
include "db.php";

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $u = $_POST["username"] ?? '';
    $e = $_POST["email"] ?? '';
    $p = $_POST["password"] ?? '';

    if (empty($u) || empty($e) || empty($p)) {
        $error = "All fields are required.";
    } else {

        $hash = password_hash($p, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password)
                VALUES ('$u', '$e', '$hash')";

        if ($conn->query($sql)) {

    header("Location: login.php");
    exit;

} else {
    $error = "Error: " . $conn->error;
}
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>

<div class="container">

    <h2>Register</h2>

    <?php if (!empty($success)): ?>
        <div class="success">
            <?php echo $success; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <input type="text" name="username" placeholder="Username" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Register</button>

    </form>

    <p class="switch">
        Already have an account?
        <a href="login.php">Login</a>
    </p>

</div>

</body>
</html>