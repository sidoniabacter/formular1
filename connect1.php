<?php
	$medici = $_POST['medici'];
	$data_programarii = $_POST['data_programarii'];
	$ora_programarii = $_POST['ora_programarii'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','formular1');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into medici_programari(medici, data_programarii, ora_programarii) values(?, ?, ?)");
		$stmt->bind_param("sss", $medici, $data_programarii, $ora_programarii);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>