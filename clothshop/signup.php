<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $mid = $_POST['ManagerID'];
    $manager_name = $_POST['ManagerName'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $contact_number = $_POST['ContactNumber'];

    if (!empty($username) && !empty($password)) {
        // Fix SQL syntax error and add the missing quote in the VALUES section
        $query = "INSERT INTO Manager (ManagerID, Name, Username, Password, ContactNumber) 
                  VALUES ('$mid', '$manager_name', '$username', '$password', '$contact_number')";
        mysqli_query($conn, $query);

        header("location: login.php");  // Redirect to the home page or any desired page after signup
        die;
    } else {
        echo "<script type='text/javascript'>alert('Please enter valid input')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manager Signup Page</title>
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
        background-color: #4caf50; /* Green submit button */
        color: #ffffff; /* White text on the button */
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049; /* Darker green on hover */
    }

    p {
        margin-top: 15px;
        color: #555555;
    }

    a {
        color: #3498db; /* Blue link color */
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <form method="post">
        <h1><center>Manager Sign Up</center></h1>
        <label for="ManagerID">Manager ID:</label>
        <input type="text" id="ManagerID" name="ManagerID" required><br>

        <label for="ManagerName">Manager Name:</label>
        <input type="text" id="ManagerName" name="ManagerName" required><br>

        <label for="Username">Username:</label>
        <input type="text" id="Username" name="Username" required><br>

        <label for="Password">Password:</label>
        <input type="password" id="Password" name="Password" required><br>

        <label for="ContactNumber">Contact Number:</label>
        <input type="tel" id="ContactNumber" name="ContactNumber" required><br>

        <input type="submit" value="Submit">

        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>
