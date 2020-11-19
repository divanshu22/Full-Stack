<?php
	$Name = $_POST['Name'];
	$email = $_POST['email'];
	$contactnumber = $_POST['contactnumber'];
	$streetname = $_POST['streetname'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];
	$state = $_POST['state'];
	$country = $_POST['country'];	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(Name, email, contactnumeber, streetname, city, pincode, state, country) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $Name, $email, $contactnumber, $streetname, $city, $pincode, $state, $country);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>