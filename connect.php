<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$movie_name = $_POST['movie_name'];
	$movie_Discp = $_POST['movie_Discp'];
	$Release_details = $_POST['Release_details'];
	$img_url = $_POST['img_url'];

	// Database connection
	$conn = new mysqli('localhost','root','','registration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, movie_name, movie_Discp , Release_details ,img_url) values(?, ?, ?, ?, ? ,? ,? ,? ,?)");
		$stmt->bind_param("sssssssss", $firstName, $lastName, $gender, $email, $password ,$movie_name , $movie_Discp , $Release_details ,$img_url);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		
		$stmt->close();
		$conn->close();
		header("Location: get_info.php");
    	exit();
	}

?>
