<?php
session_start();
include("database.php");

// Assuming "database.php" contains the code to establish a MySQL connection
// Example: $conn = mysqli_connect("hostname", "username", "password", "database_name");
// Make sure to replace "hostname", "username", "password", and "database_name" with your actual database details.

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $manager_username = $_POST['manager_username'];
    $password = $_POST['password'];

    // Query the database to check if the credentials are valid
    $query = "SELECT * FROM Manager WHERE Username = '$manager_username' AND Password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // User authenticated successfully, set manager_username session variable
        $_SESSION['manager_username'] = $manager_username;

        // Redirect to home page or any other desired page
        header("Location: menu.php");
        exit;
    } else {
        // Authentication failed, display error message
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        background-color: #f2f2f2; /* Light gray background */
        font-family: Arial, sans-serif;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff; /* White background for the form */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle effect */
    }

    h1 {
        color: #333333; /* Dark gray header text */
    }

    label {
        display: block;
        margin: 10px 0;
        color: #555555; /* Medium gray label text */
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #cccccc; /* Light gray border */
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #3498db; /* Blue submit button */
        color: #ffffff; /* White text on the button */
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #2980b9; /* Darker blue on hover */
    }

    p {
        margin-top: 15px;
        color: #555555;
    }

    a {
        color: #e74c3c; /* Red link color */
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
<body>
    <form method="post">
        <h1><center>Login</center></h1>
        <label for="manager_username">Username:</label>
        <input type="text" id="manager_username" name="manager_username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
        <p>Don't have an account? <a href="signup.php">SignUp here</a></p>
    </form>
</body>
</html>
