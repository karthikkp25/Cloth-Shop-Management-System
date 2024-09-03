<?php
include("database.php"); // Assuming you have a database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $productID = $_POST["ProductID"];
    $name = $_POST["Name"];
    $description = $_POST["Description"];
    $price = $_POST["Price"];
    $quantity = $_POST["Quantity"];
    $managerID = $_POST["ManagerID"];
    $category = $_POST["Category"];

    // SQL to insert a new record
    $insertSQL = "INSERT INTO Inventory (ProductID, Name, Description, Price, Quantity, ManagerID, Category)
                  VALUES ($productID, '$name', '$description', $price, $quantity, $managerID, '$category')";

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
    <title>Insert New Inventory Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0fff0; /* Light green */
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
            background-color: #008000; /* Dark green */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #006400; /* Darker green on hover */
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
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <h2>Insert New Inventory Item</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="ProductID">Product ID:</label>
        <input type="text" name="ProductID" required>

        <label for="Name">Name:</label>
        <input type="text" name="Name" required>

        <label for="Description">Description:</label>
        <textarea name="Description" required></textarea>

        <label for="Price">Price:</label>
        <input type="text" name="Price" required>

        <label for="Quantity">Quantity:</label>
        <input type="text" name="Quantity" required>

        <label for="ManagerID">Manager ID:</label>
        <input type="text" name="ManagerID" required>

        <label for="Category">Category:</label>
        <select name="Category" required>
            <option value="Men">Men</option>
            <option value="Women">Women</option>
            <option value="Child">Child</option>
        </select>

        <button type="submit">Insert Record</button>
    </form>

    <div class="redirect-btn">
        <a href="inv.php">Inventory Page</a>
    </div>
</body>
</html>
