<?php
include("database.php"); // Assuming you have a database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $feedbackID = $_POST["FeedbackID"];
    $managerID = $_POST["ManagerID"];
    $customerID = $_POST["CustomerID"];
    $productID = $_POST["ProductID"];
    $rating = $_POST["Rating"];
    $comment = $_POST["Comment"];
    $feedbackDate = $_POST["FeedbackDate"];

    // SQL to insert a new record
    $insertSQL = "INSERT INTO Feedback (FeedbackID, ManagerID, CustomerID, ProductID, Rating, Comment, FeedbackDate)
                  VALUES ($feedbackID, $managerID, $customerID, $productID, $rating, '$comment', '$feedbackDate')";

    // Execute the query
    if ($conn->query($insertSQL) === TRUE) {
        echo "New record has been inserted successfully.";
    } else {
        echo "Error inserting record: " . $conn->error;
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
    <title>Insert New Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffa07a; /* Light Salmon Color */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            color: #fff; /* White text color */
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff; /* White */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
            color: #333; /* Dark gray text color */
        }

        input, select {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        button {
            padding: 10px 20px;
            background-color: #ff8c66; /* Darker Salmon Color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ff704d; /* Lighter Darker Salmon Color on hover */
        }

        .redirect-btn {
            margin-top: 15px;
        }

        .redirect-btn a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #fff; /* White */
            color: #ff8c66; /* Darker Salmon Color */
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .redirect-btn a:hover {
            background-color: #ff8c66; /* Darker Salmon Color on hover */
            color: white;
        }
    </style>
</head>
<body>
    <h2>Insert New Feedback</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="FeedbackID">Feedback ID:</label>
        <input type="text" name="FeedbackID" required>

        <label for="ManagerID">Manager ID:</label>
        <input type="text" name="ManagerID" required>

        <label for="CustomerID">Customer ID:</label>
        <input type="text" name="CustomerID" required>

        <label for="ProductID">Product ID:</label>
        <input type="text" name="ProductID" required>

        <label for="Rating">Rating:</label>
        <input type="text" name="Rating" required>

        <label for="Comment">Comment:</label>
        <textarea name="Comment" rows="4" required></textarea>

        <label for="FeedbackDate">Feedback Date:</label>
        <input type="text" name="FeedbackDate" required>

        <button type="submit">Insert Record</button>
    </form>

    <div class="redirect-btn">
        <a href="menu.php">Feedback Page</a>
    </div>
</body>
</html>
