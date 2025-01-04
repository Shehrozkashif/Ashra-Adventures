<?php

include('db.php'); // Ensure db.php defines $conn properly

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and validate user inputs
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $user_type = $conn->real_escape_string($_POST['user_type']);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red; text-align: center;'>Invalid email format.</p>";
        exit;
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert query
    $sql = "INSERT INTO users (username, email, password, contact, user_type) 
            VALUES ('$username', '$email', '$hashed_password', '$contact', '$user_type')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green; text-align: center;'>Registered Successfully! <a href='login.php'>Login here</a>.</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error: " . $conn->error . "</p>";
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
    <title>Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(45deg, #ff6f61, #ffb3a7, #f7b7a3, #f1e7d6, #90b3b0, #ff9b9b);
            background-size: 600% 600%;
            animation: gradientAnimation 6s ease infinite;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .container h2 {
            color: #555;
            font-size: 24px;
        }

        input, select {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            color: #28a745;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup</h2>
        <form action="signup.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="contact" placeholder="Contact" required>
            <select name="user_type" required>
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
