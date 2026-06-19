<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $e = $_POST["email"] ?? '';
    $p = $_POST["password"] ?? '';

    // find user by email
    $res = $conn->query("SELECT * FROM users WHERE email='$e'");
    $user = $res->fetch_assoc();

    // user not found
    if (!$user) {
        $error = "No account found with that email.";
    }
    // password wrong
    elseif (!password_verify($p, $user["password"])) {
        $error = "Incorrect password.";
    }
    // login success
    else {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];

        header("Location: dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    

    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <?php if (!empty($error)): ?>
    <div class="error">
        <?php echo $error; ?>
    </div>
<?php endif; ?>

    <form method="POST">
        <input
    type="email"
    name="email"
    placeholder="Email"
    value="<?php echo htmlspecialchars($e ?? ''); ?>"
    required
>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p class="switch">
    Don't have an account?
    <a href="register.php">Create Account</a>
</p>
</div>

</body>
</html>