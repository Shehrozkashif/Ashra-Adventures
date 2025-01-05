<?php
session_start();
include('db.php');

if (!isset($_SESSION['email'])) {
    echo "<script>alert('You must be logged in to create a package.'); window.location.href = 'login.php';</script>";
    exit();
}

$user_email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $packageName = $_POST['packageName'];
    $places = $_POST['places'];
    $price = $_POST['price'];
    $days = $_POST['days'];
    $food = $_POST['food'];
    $hotels = $_POST['hotels'];
    $jeep = $_POST['jeep'];

    if (!is_numeric($price) || !is_numeric($days)) {
        echo "<script>alert('Price and days must be valid numbers');</script>";
    } else {
        $sql = "INSERT INTO packages (package_name, places, price, days, food_options, hotels, jeep_services, user_email) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdissss", $packageName, $places, $price, $days, $food, $hotels, $jeep, $user_email);

        if ($stmt->execute()) {
            echo "<script>alert('Package created successfully!'); window.location.href = 'admin_dashboard.php';</script>";
        } else {
            echo "<script>alert('Error: Unable to create package. Please try again.');</script>";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Package</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #a8e063, #56ab2f);
            overflow-x: hidden;
        }

        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #2b7a4b;
            color: white;
            padding: 20px;
            box-sizing: border-box;
            position: fixed;
            left: -250px;
            top: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 600;
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
            background-color: #3da369;
            transform: scale(1.05);
        }

        .sidebar-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #3da369;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 16px;
            transition: background 0.3s;
            z-index: 1000;
        }

        .sidebar-toggle:hover {
            background-color: #2b7a4b;
        }

        .main {
            margin-left: 20px;
            padding: 20px;
            transition: margin-left 0.5s;
        }

        .form-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 30px;
            max-width: 900px;
            margin: 50px auto;
            opacity: 0;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-weight: 600;
            font-size: 16px;
            color: #2b7a4b;
        }

        input, select, textarea {
            width: 90%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            background: #f7f9f8;
            box-shadow: inset 0px 1px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s, border-color 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            box-shadow: 0px 0px 8px rgba(43, 122, 75, 0.5);
            border-color: #2b7a4b;
            outline: none;
        }

        button {
            background: linear-gradient(to right, #56ab2f, #a8e063);
            color: white;
            border: none;
            padding: 15px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
        }

        .form-container .full-width {
            grid-column: span 2;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
</head>
<body>

        <button class="sidebar-toggle" onclick="toggleSidebar()">☰ Menu</button>
    <div class="sidebar" id="sidebar"><br><br><br>
        <h2>Admin</h2>
        <a href="create_package.php">Customize Package</a>
        <a href="http://localhost:5173/">Homepage</a>
        <a href="login.php">Sign Out</a>
    </div>
    <div class="main" id="main-content">
        <h2 style="text-align: center; color: #2b7a4b;">Customize Package</h2>
        <form class="form-container" id="form-container" method="POST" action="">
            <div class="form-group">
                <label for="packageName">Package Name:</label>
                <input type="text" id="packageName" name="packageName" required>
            </div>
            <div class="form-group">
                <label for="places">Places:</label>
                <select id="places" name="places" required>
                    <option value="Islamabad">Islamabad</option>
                    <option value="Naran">Naran</option>
                    <option value="Shogran">Shogran</option>
                    <option value="Kashmir">Kashmir</option>
                    <option value="Swat">Swat</option>
                    <option value="TaoBat">TaoBat</option>
                    <option value="Malam Jabba">Malam Jabba</option>
                </select>
            </div>
            <div class="form-group full-width">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="days">Number of Days:</label>
                <input type="number" id="days" name="days" required>
            </div>
            <div class="form-group">
                <label for="food">Food Options:</label>
                <textarea id="food" name="food" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="hotels">Hotels:</label>
                <textarea id="hotels" name="hotels" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="jeep">Jeep Services:</label>
                <textarea id="jeep" name="jeep" rows="3" required></textarea>
            </div>
            <div class="form-group full-width">
                <button type="submit" id="submit-button">Create Package</button>
            </div>
        </form>
    </div>



    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const isOpen = sidebar.style.left === "0px";

            gsap.to(sidebar, { left: isOpen ? "-250px" : "0px", duration: 0.5, ease: "power3.out" });
            gsap.to(mainContent, { x: isOpen ? 0 : 250, duration: 0.5, ease: "power3.out" });
        }

        gsap.to("#form-container", { opacity: 1, duration: 1.5, ease: "power3.out" });

        gsap.from(".form-group", { opacity: 0, y: 30, stagger: 0.2, duration: 1.2, delay: 0.5, ease: "power3.out" });

        const submitButton = document.getElementById("submit-button");
        submitButton.addEventListener("mouseenter", () => {
            gsap.to(submitButton, { scale: 1.1, duration: 0.2 });
        });

        submitButton.addEventListener("mouseleave", () => {
            gsap.to(submitButton, { scale: 1, duration: 0.2 });
        });
    </script>
</body>
</html>
