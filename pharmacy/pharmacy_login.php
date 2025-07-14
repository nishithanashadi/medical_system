<!DOCTYPE html>
<html>
<head>
    <title>Pharmacy Login</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="form-container">
        <h2>Pharmacy Login</h2>
        <form action="../actions/pharmacy_login_action.php" method="POST">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <p><a href="../index.php">Back to Home</a></p>
    </div>
</body>
</html>
