<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="../assets/register.css">
</head>
<body>
    <header class="site-header">
        <div class="header-text">
        <h1>Medical Prescription Upload System</h1>
        <p>Simple, Ssecure & Fast Prescription Management</p>
         </div>
        <img src="../assets/logo.jpg" alt="Logo" class="logo-img">
    </header>

    <nav>
        <a href="../users/register.php">Register</a>
        <a href="../index.php">Login</a>
        <a href="#company">Company</a>
        <a href="#contact">Contact</a>
        <a href="../homepage.php">Home Page</a>
    </nav>
    <main>
        <div class="background"></div>
        <div class="form-container">
            <h2>Register</h2>
            <form action="../actions/register_action.php" method="POST">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label>Password:</label><br>
                <input type="password" name="password" required><br><br>

                <label>Address:</label><br>
                <textarea name="address" required></textarea><br><br>

                <label>Contact No:</label><br>
                <input type="text" name="contact" required><br><br>

                <label>Date of Birth:</label><br>
                <input type="date" name="dob" required><br><br>

                <label>User Type:</label><br>
                <select name="user_type" required>
                    <option value="user">User</option>
                    <option value="pharmacy">Pharmacy</option>
                </select><br><br>

                <input type="submit" value="Register">
            </form>
        </div>
    </main>
    <footer>
        &copy; 2025 MediConnect Pvt Ltd. All rights reserved.
    </footer>
</body>
</html>
