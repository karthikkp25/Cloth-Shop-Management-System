<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloth Shop Management System</title>
    <style>
        body {
            background-color: #e6e6e6; /* Light gray background */
            color: #333333; /* Dark text color */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure the page takes at least the full viewport height */
        }

        header {
            background-color: #333333; /* Dark gray header background */
            padding: 20px;
            color: #ffffff; /* White header text color */
        }

        h1 {
            margin-bottom: 20px;
            color: #555555; /* Darker title color */
        }

        p {
            margin: 20px 0;
            color: #555555; /* Darker paragraph text color */
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            flex-grow: 1; /* Grow to take remaining space */
            align-items: center; /* Center content vertically */
        }

        .cta-buttons a {
            display: inline-block;
            padding: 15px 30px;
            margin: 0 10px;
            background-color: #333333; /* Dark button background */
            color: #e6e6e6; /* Light button text color */
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .cta-buttons a:hover {
            background-color: #555555; /* Darker background on hover */
        }

        footer {
            background-color: #333333; /* Dark gray footer background */
            padding: 10px;
            color: #e6e6e6; /* Light footer text color */
            margin-top: auto; /* Push the footer to the bottom */
        }
    </style>
</head>
<body>

    <header>
        <h1>Cloth Shop Management System</h1>
        <p>Opening Time: 9 AM | Closing Time: 10 PM</p>
    </header>

    <div class="cta-buttons">
        <a href="login.php">Login</a>
        <a href="signup.php">Signup</a>
    </div>

    <footer>
        <p>&copy; 2024 Cloth Shop Management System</p>
    </footer>

</body>
</html>
