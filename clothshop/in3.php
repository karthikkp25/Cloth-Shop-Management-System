<?php
include("database.php"); // Assuming you have a database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $billingID = $_POST["BillingID"];
    $managerID = $_POST["ManagerID"];
    $productID = $_POST["ProductID"];
    $saleDate = $_POST["SaleDate"];
    $quantity = $_POST["Quantity"];
    $totalAmount = $_POST["TotalAmount"];

    // SQL to insert a new record
    $insertSQL = "INSERT INTO Billings (BillingID, ManagerID, ProductID, SaleDate, Quantity, TotalAmount)
                  VALUES ($billingID, $managerID, $productID, '$saleDate', $quantity, $totalAmount)";

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
    <title>Insert New Billing Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffebcd; /* Light orange */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            color: #333; /* Dark gray text color */
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
            background-color: #ff4500; /* Dark orange */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ff6347; /* Darker orange on hover */
        }

        .redirect-btn {
            margin-top: 15px;
        }

        .redirect-btn a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #ff8c00; /* Orange color */
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .redirect-btn a:hover {
            background-color: #ffa500; /* Darker orange on hover */
        }
    </style>
</head>
<body>
    <h2>Insert New Billing Record</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="BillingID">Billing ID:</label>
        <input type="text" name="BillingID" required>

        <label for="ManagerID">Manager ID:</label>
        <input type="text" name="ManagerID" required>

        <label for="ProductID">Product ID:</label>
        <input type="text" name="ProductID" required>

        <label for="SaleDate">Sale Date:</label>
        <input type="text" name="SaleDate" required>

        <label for="Quantity">Quantity:</label>
        <input type="text" name="Quantity" required>

        <label for="TotalAmount">Total Amount:</label>
        <input type="text" name="TotalAmount" required>

        <button type="submit">Insert Record</button>
    </form>

    <div class="redirect-btn">
        <a href="bill.php">Billing Page</a>
    </div>
</body>
</html>
