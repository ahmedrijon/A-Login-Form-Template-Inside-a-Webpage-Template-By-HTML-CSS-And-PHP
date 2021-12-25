<?php
	$username = $_POST['username'];
	$Password = $_POST['password'];
	$retypepassword = $_POST['retypepassword'];
	$number = $_POST['number'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];

	// Database connection
	$conn = new mysqli('localhost','root','','Psychopath 4G');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into login(username, password, retypepassword, number, gender, email) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $username, $password, $retypepassword, $number, $gender, $email);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>