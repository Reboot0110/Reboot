<?php
// Database connection settings
$host = 'localhost';
$db   = 'student_db';
$user = 'root';  // Your DB username
$pass = '';      // Your DB password

// Connect to the database
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the username from the POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];

    // Prepare SQL to fetch the user
    $stmt = $conn->prepare("SELECT * FROM students WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User exists, proceed with login
        echo json_encode(['status' => 'success', 'message' => 'Login successful']);
    } else {
        // Invalid username
        echo json_encode(['status' => 'error', 'message' => 'Invalid username']);
    }

    $stmt->close();
}
$conn->close();
?>
