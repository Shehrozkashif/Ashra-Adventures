<?php
session_start();
include('db.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['select_package'])) {
    $package_id = $_POST['package_id'];

    // Check if the package is already selected
    $check_sql = "SELECT * FROM customer_packages WHERE package_id = '$package_id' AND user_email = '$email'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        $error = "You have already selected this package.";
    } else {
        // Add to customer_packages table
        $insert_sql = "INSERT INTO customer_packages (user_email, package_id) VALUES ('$email', '$package_id')";
        if ($conn->query($insert_sql) === TRUE) {
            $message = "Package selected successfully.";
        } else {
            $error = "Error selecting package: " . $conn->error;
        }
    }
}

$sql = "SELECT * FROM packages";
$result = $conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Packages</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.1/gsap.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6fff5;
            display: flex;
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

        .container {
            margin-left: 270px;
            padding: 20px;
            width: 100%;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
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
            background-color: #0c7023;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .select-button:hover {
            background-color: #28a745;
        }

        .error {
            color: red;
            text-align: center;
        }

        .success {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>

    <button class="sidebar-toggle" onclick="toggleSidebar()">☰ Menu</button>
    <div class="sidebar" id="sidebar"><br><br>
        <h2>Customer</h2>
        <a href="select_package.php">Select Package</a>
        <a href="http://localhost:5173/">Homepage</a>
        <a href="login.php">Sign Out</a>
    </div>

    <div class="container">
        <h2>Select a Package</h2>

        <?php if (isset($message)): ?>
            <div class="message success"><?php echo $message; ?></div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="message error"><?php echo $error; ?></div>
        <?php endif; ?>

        <table>
            <tr>
                <th>Package Name</th>
                <th>Places</th>
                <th>Price</th>
                <th>Days</th>
                <th>Food Options</th>
                <th>Hotels</th>
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
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="package_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="select_package" class="select-button">Select</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No packages available.</td>
                </tr>
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
