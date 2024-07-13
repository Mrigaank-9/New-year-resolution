<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$resolution = $_POST['resolution'];
$description = $_POST['description'];
$target_date = $_POST['target_date'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'resolutions');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO resolutions (firstName, lastName, gender, email, resolution, description, target_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $firstName, $lastName, $gender, $email, $resolution, $description, $target_date);
    $execval = $stmt->execute();
    echo $execval;
    echo "Resolution registered successfully...";

    $stmt->close();
    $conn->close();
    header("Location: get_info.php");
    exit();
}
?>
