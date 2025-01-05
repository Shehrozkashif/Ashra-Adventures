<?php
session_start(); 

include('db.php');

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$user_email = $_SESSION['email']; 

$query = "
    SELECT packages.* 
    FROM packages 
    JOIN customer_packages ON packages.id = customer_packages.package_id
    WHERE customer_packages.user_email = ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user_email); 
$stmt->execute();
$result = $stmt->get_result();

if (isset($_POST['remove_package'])) {
    $package_id = $_POST['package_id'];

    $delete_query = "DELETE FROM customer_packages WHERE user_email = ? AND package_id = ?";
    $delete_stmt = $conn->prepare($delete_query);
    $delete_stmt->bind_param("si", $user_email, $package_id);
    if ($delete_stmt->execute()) {
        echo "<script>alert('Package removed successfully!');</script>";
    } else {
        echo "<script>alert('Error removing package!');</script>";
    }
    $delete_stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.1/gsap.min.js"></script>

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

        .remove-btn {
            background-color: #ff4d4d;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.3s;
        }

        .remove-btn:hover {
            background-color: #e60000;
        }
    </style>
</head>
<body>

    <button class="sidebar-toggle" onclick="toggleSidebar()">☰ Menu</button>
    <div class="sidebar" id="sidebar"><br><br><br>
        <h2>Customer</h2>
        <a href="select_package.php">Select Package</a>
        <a href="http://localhost:5173/">Homepage</a>
        <a href="login.php">Sign Out</a>
    </div>

    <div class="main" id="main-content">
        <h2>Availed Packages</h2>
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
            <?php if ($result->num_rows > 0): ?>
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
                            <form method="POST">
                                <input type="hidden" name="package_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="remove_package" class="remove-btn">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="8">You have not availed any packages yet.</td></tr>
            <?php endif; ?>
        </table>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const sidebarToggle = document.querySelector('.sidebar-toggle');

            sidebar.classList.toggle('active');
            mainContent.classList.toggle('active');

            if (sidebar.classList.contains('active')) {
                gsap.to(sidebar, { left: 0, duration: 0.5 });
                gsap.to(sidebarToggle, { rotate: 180, duration: 0.3 });
            } else {
                gsap.to(sidebar, { left: '-250px', duration: 0.5 });
                gsap.to(sidebarToggle, { rotate: 0, duration: 0.3 });
            }
        }

        gsap.from('.sidebar', { x: -250, opacity: 0, duration: 1 });
        gsap.from('.main', { x: 100, opacity: 0, duration: 1 });
    </script>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>