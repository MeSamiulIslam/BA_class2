<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Update with your database password if it's set
$dbname = "ba_adminlte";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Escape user inputs for security
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // Add other form fields as needed
    
    // SQL query to insert data into the database
    $sql = "INSERT INTO students (id, name, email, phone) VALUES ('$id', '$name', '$email', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        // If data is inserted successfully, redirect to student_information.php
        header("Location: student_information.php");
        exit();
    } else {
        // If an error occurs, display an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
