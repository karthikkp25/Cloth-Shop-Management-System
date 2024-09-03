<?php
include("database.php"); // Assuming you have a database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $offerID = $_POST["OfferID"];
    $productID = $_POST["ProductID"];
    $discountPercentage = $_POST["DiscountPercentage"];
    $startDate = $_POST["StartDate"];
    $endDate = $_POST["EndDate"];

    // SQL to insert a new record
    $insertSQL = "INSERT INTO Offers (OfferID, ProductID, DiscountPercentage, StartDate, EndDate)
                  VALUES ($offerID, $productID, $discountPercentage, '$startDate', '$endDate')";

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
    <title>Insert New Offer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #87cefa; /* Light Sky Blue */
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
            background-color: #4682b4; /* Steel Blue */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4169e1; /* Royal Blue on hover */
        }

        .redirect-btn {
            margin-top: 15px;
        }

        .redirect-btn a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4CAF50; /* Green color */
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .redirect-btn a:hover {
            background-color: #45a049; /* Darker Green on hover */
        }
    </style>
</head>
<body>
    <h2>Insert New Offer</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="OfferID">Offer ID:</label>
        <input type="text" name="OfferID" required>

        <label for="ProductID">Product ID:</label>
        <input type="text" name="ProductID" required>

        <label for="DiscountPercentage">Discount Percentage:</label>
        <input type="text" name="DiscountPercentage" required>

        <label for="StartDate">Start Date:</label>
        <input type="text" name="StartDate" required>

        <label for="EndDate">End Date:</label>
        <input type="text" name="EndDate" required>

        <button type="submit">Insert Record</button>
    </form>

    <div class="redirect-btn">
        <a href="off.php">Offers Page</a>
    </div>
</body>
</html>
