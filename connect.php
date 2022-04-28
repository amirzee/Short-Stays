<?php
session_start();
?>
<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];
	$address=$_POST['address'];

	$pass = password_hash($password, PASSWORD_BCRYPT);

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, email, password, number, address) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiis", $firstName, $lastName, $email, $pass, $number, $address);
		
		$execval = $stmt->execute();

		echo $execval;
		echo "Registration successfully...";
		header('location:signin.php');
		$stmt->close();
		$conn->close();
	}
?>