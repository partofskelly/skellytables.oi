<?php
session_start();


if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>


<div class="sidebar">
    <h2>skelly tables</h2>

    <a href="#">Dashboard</a>
    <a href="#">My Profile</a>
    <a href="#">Projects</a>
    <a href="#">Settings</a>
    <a href="logout.php">Logout</a>
</div>


<div class="main">

   
    <div class="topbar">
        <div>
            <h1>Dashboard</h1>
            <p>Welcome back, <?php echo $_SESSION["username"]; ?> 👋</p>
        </div>
    </div>

 
    <div class="grid">

        
        <div class="card hero">
            <h2>Welcome Back 👋</h2>
            <p>This is your dev dashboard. Build, break, fix, repeat.</p>
            <span class="badge">System Online</span>
        </div>

       
        <div class="card">
            <h3>User ID</h3>
            <p><?php echo $_SESSION["user_id"]; ?></p>
        </div>

        <div class="card">
            <h3>Username</h3>
            <p><?php echo $_SESSION["username"]; ?></p>
        </div>

        
        <div class="card">
            <h3>Project Status</h3>
            <p>Login system complete ✔</p>
        </div>

        <div class="card">
            <h3>Next Build</h3>
            <p>E30Hub marketplace 🚗</p>
        </div>

        
        <div class="card">
            <h3>Activity</h3>
            <p>No recent activity yet.</p>
        </div>

    </div>

</div>

</body>
</html>