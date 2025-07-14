<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/loginstyle.css">
     
</head>
<body>
    <div>
    <header class="site-header">
        <div class="header-text">
        <h1>Medical Prescription Upload System</h1>
        <p>Simple, Ssecure & Fast Prescription Management</p>
         </div>
        <img src="assets/logo.jpg" alt="Logo" class="logo-img">
    </header>
    
    <nav>
        <a href="users/register.php">Register</a>
        <a href="index.php">Login</a>
        <a href="#company">Company</a>
        <a href="#contact">Contact</a>
        <a href="homepage.php">Home Page</a>
    </nav>
    </div>
    <main>
    <div class="background"></div>
    <div class="form-container">
        <h2>Login</h2>
        <form action="actions/login_action.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Login">
        </form>

        <p style="text-align:center; margin-top: 15px;">Don't have an account? <a href="users/register.php">Register here</a></p>
    </div>
    </main>
    <footer>
        &copy; 2025 MediConnect Pvt Ltd. All rights reserved.
    </footer>
</body>
</html>
