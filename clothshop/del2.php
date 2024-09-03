<?php
include("database.php"); // Assuming you have a database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if OfferID is provided
    if (isset($_POST["OfferID"]) && !empty($_POST["OfferID"])) {
        $offerID = $_POST["OfferID"];

        // SQL to delete the record based on OfferID
        $deleteSQL = "DELETE FROM Offers WHERE OfferID = $offerID";

        // Execute the query
        if ($conn->query($deleteSQL) === TRUE) {
            echo "Record with OfferID $offerID has been deleted successfully.";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "OfferID is required.";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Offers Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #87ceeb; /* Light Sky Blue */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        header {
            background-color: #4682b4; /* Steel Blue Header Background */
            color: white;
            padding: 10px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        h1 {
            margin: 0;
        }

        .top-right {
            margin-right: 20px;
        }

        .container {
            max-width: 600px;
            margin: 80px auto; /* Increased margin for spacing below fixed header */
            padding: 20px;
            background-color: #ffffff; /* White */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-container {
            text-align: center;
        }

        .btn {
            background-color: #4682b4; /* Steel Blue */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #4169e1; /* Royal Blue on Hover */
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            background-color: #4682b4; /* Steel Blue */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4169e1; /* Royal Blue on Hover */
        }
    </style>
</head>
<body>
    <header>
        <h1>Delete Offers Record</h1>
        <div class="top-right">
            <a href="off.php" class="btn">Offers Page</a>
        </div>
    </header>

    <div class="container">
        <form method="post" action="">
            <label for="OfferID">Enter OfferID to delete:</label>
            <input type="number" name="OfferID" required>
            <button type="submit">Delete Record</button>
        </form>
    </div>
</body>
</html>
