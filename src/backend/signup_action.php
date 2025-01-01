<?php
// Include the database connection file
include 'db_connection.php'; // Assuming the database connection is in this file

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the form inputs
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT); // Hash the password
    $contact = htmlspecialchars(trim($_POST["contact"]));

    // Simple validation
    if (!empty($username) && !empty($email) && !empty($password) && !empty($contact) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Prepare the SQL statement to insert the data
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, contact) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password, $contact);

        // Execute the SQL statement
        if ($stmt->execute()) {
            echo "<h2>Thank you for signing up, $username!</h2>";
            echo "<p>Your account has been created successfully.</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "<p>Error: Please fill in all the fields correctly.</p>";
    }
}

// Close the database connection
$conn->close();
?>
