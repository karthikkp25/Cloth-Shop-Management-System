<?php
include("database.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $productID = $_POST["ProductID"];
    $name = $_POST["Name"];
    $description = $_POST["Description"];
    $price = $_POST["Price"];
    $quantity = $_POST["Quantity"];
    $managerID = $_POST["ManagerID"];
    $category = $_POST["Category"];

    // Update query
    $sql = "UPDATE Inventory SET 
            Name = '$name', 
            Description = '$description', 
            Price = $price, 
            Quantity = $quantity, 
            ManagerID = $managerID, 
            Category = '$category' 
            WHERE ProductID = $productID";

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Inventory Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa; /* Light Blue Background */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            color: #333; /* Dark Gray Text Color */
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
            background-color: #4CAF50; /* Green Color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Darker Green Color on Hover */
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
    <a href="inv.php" class="redirect-button">Inventory</a>

    <h2>Update Inventory Record</h2>
    
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="ProductID">Product ID:</label>
        <input type="text" name="ProductID" required>
        <label for="Name">Name:</label>
        <input type="text" name="Name" required>
        <label for="Description">Description:</label>
        <input type="text" name="Description" required>
        <label for="Price">Price:</label>
        <input type="text" name="Price" required>
        <label for="Quantity">Quantity:</label>
        <input type="text" name="Quantity" required>
        <label for="ManagerID">Manager ID:</label>
        <input type="text" name="ManagerID" required>
        <label for="Category">Category:</label>
        <input type="text" name="Category" required>

        <input type="submit" value="Update Record">
    </form>
</body>
</html>
