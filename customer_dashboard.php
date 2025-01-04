<?php
include('db.php'); // Include database connection

// Fetch available packages
$query = "SELECT * FROM packages";
$result = $conn->query($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $package_id = $_POST['package_id'];
    $customer_id = 1; // Assuming customer_id is set. Replace with actual value from session or user data.

    // Insert selected package into the customer_packages table
    $insertQuery = "INSERT INTO customer_packages (customer_id, package_id) VALUES (?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ii", $customer_id, $package_id);
    $stmt->execute();

    // Redirect to a success message page
    header("Location: success.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #f7faf6;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #115521;
            color: white;
            padding: 20px;
            box-sizing: border-box;
            position: fixed;
            left: -250px;
            top: 0;
            transition: 0.3s ease;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: bold;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            display: block;
            transition: background 0.3s, transform 0.3s;
        }

        .sidebar a:hover {
            background-color: #0c7023;
            transform: scale(1.05);
        }

        .sidebar-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s;
            z-index: 1000;
        }

        .sidebar-toggle:hover {
            background-color: #218838;
        }

        .main {
            margin-left: 20px;
            padding: 20px;
            width: 100%;
            transition: margin-left 0.3s;
        }

        .main.active {
            margin-left: 270px;
        }

        .main h2 {
            text-align: center;
            font-size: 28px;
            color: #28a745;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        td {
            color: #333;
        }

        tr:hover td {
            background-color: #e8f5e9;
        }

        .select-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .select-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <button class="sidebar-toggle" onclick="toggleSidebar()">☰ Menu</button>
    <div class="sidebar" id="sidebar">
        <h2>Customer</h2>
        <a href="/cancel_package.php">Cancel Package</a>
        <a href="/homepage.php">Homepage</a>
        <a href="/signout.php">Sign Out</a>
    </div>

    <div class="main" id="main-content">
        <h2>Available Packages</h2>
        <table>
            <tr>
                <th>Package Name</th>
                <th>Places</th>
                <th>Price</th>
                <th>Days</th>
                <th>Food Options</th>
                <th>Hotels</th>
                <th>Jeep Services</th>
                <th>Action</th>
            </tr>
            <?php if ($result): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['package_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['places']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?></td>
                        <td><?php echo htmlspecialchars($row['days']); ?></td>
                        <td><?php echo htmlspecialchars($row['food_options']); ?></td>
                        <td><?php echo htmlspecialchars($row['hotels']); ?></td>
                        <td><?php echo htmlspecialchars($row['jeep_services']); ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="package_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="select-button">Select</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="8">No packages available.</td></tr>
            <?php endif; ?>
        </table>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('active');
        }
    </script>

</body>
</html>
