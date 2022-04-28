<?php
// Database connection
$conn = new mysqli('localhost','root','','test')or die($conn->connect_error);

if(isset($_POST['submit'])){

    $name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$massage=$_POST['massage'];

	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		
        $insertquery = " insert into massage('name', 'email', 'phone', 'massage') values('$name', '$email', '$phone', '$massage')";

        $conn->query($insertquery)or die($conn->connect_error);
		if ($conn) {
			echo "Registration successfully...";
			header('location:contact.php');
		}else {
			echo "Failed";
		}
        	
	}

}
	
?>