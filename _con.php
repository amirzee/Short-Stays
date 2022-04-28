<?php
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Phone = $_POST['phone'];
	$Message=$_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into con(name, email, phone, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $Name, $Email, $Phone, $Message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Feedback sent successfully...";
		header('location:contact.php');
		$stmt->close();
		$conn->close();
	}
?>