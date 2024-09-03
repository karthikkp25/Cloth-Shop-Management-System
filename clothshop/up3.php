<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Billings Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFDAB9; /* PeachPuff Background */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            color: #fff; /* White Text Color */
        }

        form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff; /* White */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333; /* Dark Gray Text Color */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc; /* Light Gray Border */
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #FFA07A; /* Light Salmon Color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #FF8C66; /* Darker Salmon Color on Hover */
        }

        .redirect-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #333; /* Dark Gray Button Background */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .redirect-button:hover {
            background-color: #555; /* Darker Gray Button Background on Hover */
        }
    </style>
</head>
<body>
    <a href="bill.php" class="redirect-button">Billings</a>

    <h2>Update Billings Record</h2>
    
    <?php
    include("database.php");

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get values from the form
        $billingID = $_POST["BillingID"];
        $managerID = $_POST["ManagerID"];
        $productID = $_POST["ProductID"];
        $saleDate = $_POST["SaleDate"];
        $quantity = $_POST["Quantity"];
        $totalAmount = $_POST["TotalAmount"];

        // Update query
        $sql = "UPDATE Billings SET 
                ManagerID = $managerID, 
                ProductID = $productID, 
                SaleDate = '$saleDate', 
                Quantity = $quantity, 
                TotalAmount = $totalAmount
                WHERE BillingID = $billingID";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>

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

        <input type="submit" value="Update Record">
    </form>
</body>
</html>
