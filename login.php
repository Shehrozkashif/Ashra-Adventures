<?php
$servername = "localhost";
$username = "root"; 
$password = "";        
$database = "ashra";       

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to the ashra database";

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(45deg, #ff6f61, #ffb3a7, #f7b7a3, #f1e7d6, #90b3b0, #ff9b9b);
            background-size: 400% 400%;
            animation: gradientAnimation 6s ease infinite;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
            opacity: 0;
            transform: translateY(-50px);
        }

        .container h2 {
            color: #19681f;
            font-size: 24px;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #0e440c;
            border-radius: 5px;
            opacity: 0;
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
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
</head>
<body>
    <div class="container" id="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.html">Sign up here</a></p>
    </div>

    <script>
        gsap.to("#login-container", { opacity: 1, y: 0, duration: 1, ease: "bounce.out" });
        gsap.to("input", {
            opacity: 1,
            y: 0,
            stagger: 0.1,
            duration: 0.8,
            ease: "power3.out",
            delay: 0.5
        });
        gsap.to("button", {
            opacity: 1,
            scale: 1.1,
            duration: 0.5,
            ease: "bounce.out",
            delay: 1
        });

        const button = document.querySelector("button");
        button.addEventListener("mouseenter", () => {
            gsap.to(button, { scale: 1.2, duration: 0.2 });
        });

        button.addEventListener("mouseleave", () => {
            gsap.to(button, { scale: 1, duration: 0.2 });
        });
    </script>
</body>
</html>
