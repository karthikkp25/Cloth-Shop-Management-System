<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billings Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe4b5; /* Light Orange Background */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            background-color: #ff8c00; /* Dark Orange Color */
            padding: 10px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            color: white;
        }

        nav {
            display: flex;
            gap: 15px;
        }

        nav a {
            padding: 8px 16px;
            background-color: #ff8c00; /* Dark Orange Color */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ff751a; /* Darker Orange Color on Hover */
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #ff8c00; /* Dark Orange Color */
            color: white;
        }

        input[type="text"] {
            padding: 8px;
            margin-right: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 8px 16px;
            background-color: #ff8c00; /* Dark Orange Color */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ff751a; /* Darker Orange Color on Hover */
        }
    </style>
</head>
<body>
    <header>
        <h1>Billings Management</h1>
        <nav>
            <a href="menu.php">MENU</a>
            <a href="up3.php">UPDATE</a>
            <a href="del3.php">DELETE</a>
            <a href="in3.php">INSERT</a>
        </nav>
    </header>

    <div>
        <input type="text" id="billingsSearchInput" placeholder="Search by Product Name">
        <button onclick="searchBillings()">Search</button>
    </div>

    <?php
    include("database.php");

    $sql = "SELECT * FROM Billings";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Billing ID</th>
                    <th>Manager ID</th>
                    <th>Product ID</th>
                    <th>Sale Date</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["BillingID"]."</td>
                    <td>".$row["ManagerID"]."</td>
                    <td>".$row["ProductID"]."</td>
                    <td>".$row["SaleDate"]."</td>
                    <td>".$row["Quantity"]."</td>
                    <td>".$row["TotalAmount"]."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <script>
        function searchBillings() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("billingsSearchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
