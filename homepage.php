<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Prescription System - Home</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f5;
        }
        header {
            background-color: #2b6777;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #c8d8e4;
            padding: 10px;
            display: flex;
            justify-content: center;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #2b6777;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        main {
            padding: 20px;
        }
        section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        footer {
            background-color: #2b6777;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Medical Prescription Upload System</h1>
        <p>Simple, Secure & Fast Prescription Management</p>
    </header>

    <nav>
        <a href="users/register.php">Register</a>
        <a href="index.php">Login</a>
        <a href="#company">Company</a>
        <a href="#contact">Contact</a>
    </nav>

    <main>
        <section id="welcome">
            <h2>Welcome to Our Platform</h2>
            <p>This system allows users to upload prescriptions and pharmacies to respond with quotations. It's a fast and convenient way to get your medical needs handled online.</p>
        </section>

        <section id="company">
            <h2>Company Overview</h2>
            <p><strong>Company Name:</strong> MediConnect Pvt Ltd</p>
            <p><strong>Mission:</strong> To streamline the prescription handling process digitally between users and pharmacies.</p>
            <p><strong>Founded:</strong> 2022</p>
            <p><strong>Location:</strong> Colombo, Sri Lanka</p>
        </section>

        <section id="contact">
            <h2>Contact Details</h2>
            <p><strong>Email:</strong> support@mediconnect.com</p>
            <p><strong>Phone:</strong> +94 77 123 4567</p>
            <p><strong>Address:</strong> No. 10, Galle Road, Colombo 03, Sri Lanka</p>
        </section>
    </main>

    <footer>
        &copy; 2025 MediConnect Pvt Ltd. All rights reserved.
    </footer>
</body>
</html>
