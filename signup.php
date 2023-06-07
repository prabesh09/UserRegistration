<?php
// Step 1: Collect User Sign Up Credentials
$signup_username = $_POST['signup_username'];
$signup_password = $_POST['signup_password'];

// Step 2: Sanitize User Input
$signup_username = filter_var($signup_username, FILTER_SANITIZE_STRING);
$signup_password = filter_var($signup_password, FILTER_SANITIZE_STRING);

// Step 3: Hash the Password
$hashed_password = password_hash($signup_password, PASSWORD_DEFAULT);

// Step 4: Store User Information in the Database
// Assuming you have a MySQL database connection, adjust the following variables with your database details
$host = 'localhost';
$dbname = 'userInfoDB';
$username = 'root';
$password = '';

try {
    // Establish the database connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set the error mode to exceptions for easier error handling
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the INSERT statement
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");

    // Bind the parameters
    $stmt->bindParam(':username', $signup_username);
    $stmt->bindParam(':password', $hashed_password);

    // Execute the query
    $stmt->execute();

    // Redirect to Sign In Page
    header("Location: success.php");
    exit;
} catch (PDOException $e) {
    // Display error message or handle the error accordingly
    echo "Error: " . $e->getMessage();
}
?>