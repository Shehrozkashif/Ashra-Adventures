<?php
session_start();
include('db.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_package'])) {
    $package_id = $_POST['delete_package'];
    
    $delete_sql = "DELETE FROM packages WHERE id = '$package_id' AND user_email = '$email'";
    if ($conn->query($delete_sql) === TRUE) {
        $message = "Package deleted successfully.";
    } else {
        $error = "Error deleting package: " . $conn->error;
    }
}

$sql = "SELECT * FROM packages WHERE user_email = '$email'";
$result = $conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.1/gsap.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #f6fff5;
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
            background-color: #0c7023;
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
            background-color: #115521;
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

        .message {
            text-align: center;
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

        .delete-button {
            background-color: #ff4757;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .delete-button:hover {
            background-color: #e84118;
        }

        .edit-button {
            background-color:rgb(33, 194, 105);
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .edit-button:hover {
            background-color:rgb(21, 110, 13);
        }
    </style>
</head>
<body>
    <button class="sidebar-toggle" onclick="toggleSidebar()">☰ Menu</button>
    <div class="sidebar" id="sidebar"><br><br>
        <h2>Admin</h2>
        <a href="create_package.php">Create Package</a>
        <a href="http://localhost:5173/">Homepage</a>
        <a href="login.php">Sign Out</a>
    </div>

    <div class="main" id="main-content">
        <h2>Created Packages</h2>
        <?php if (isset($message)): ?>
            <div class="message" style="color: green;"><?php echo $message; ?></div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <div class="message" style="color: red;"><?php echo $error; ?></div>
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
                            <form action="" method="post" style="display: inline;">
                                <input type="hidden" name="delete_package" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="delete-button">Delete</button>
                            </form>
                            <a class="edit-button" href="edit.php?id=<?php echo $row['id']; ?>" style="margin-left: 10px;">Edit</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No packages found.</td>
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
