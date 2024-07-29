<?php
// Including the database configuration file (Make sure to configure this file)
include 'koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password']; // Password is directly hashed so no need to sanitize
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // Validate inputs
    if (empty($username) || empty($password) || empty($email)) {
        echo "Please fill in all fields.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } else {
        try {
            // Establish database connection using PDO
            $con = new PDO("mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME", $DATABASE_USER, $DATABASE_PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare SQL and bind parameters
            $stmt = $con->prepare("INSERT INTO tbllogin (username, password, email) VALUES (:username, :password, :email)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $passwordHash);
            $stmt->bindParam(':email', $email);

            // Hash password
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Execute the query
            $stmt->execute();

            // Check if insertion was successful
            if ($stmt->rowCount() > 0) {
                echo "Registration successful! You can now login.";
            } else {
                echo "Registration failed. Please try again.";
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close connection
        $conn = null;
    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
header('location: ../index.php')
?>
