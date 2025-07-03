<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>Register</h2>
    <form action="../actions/register_action.php" method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

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
</body>
</html>
