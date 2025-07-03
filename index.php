<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>User Login</h2>
    <form action="actions/login_action.php" method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <p>Don't have an account? <a href="users/register.php">Register here</a></p>
</body>
</html>
