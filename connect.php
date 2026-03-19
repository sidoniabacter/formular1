<?php
	$nume = $_POST['nume'];
	$prenume = $_POST['prenume'];
    $cnp = $_POST['cnp'];
	$sex = $_POST['sex'];
	$email = $_POST['email'];
	$telefon = $_POST['tel'];
	$adresa = $_POST['adresa'];
	$sectie = $_POST['sectie'];

	// Database connection
	$conn = new mysqli('localhost','root','','formular1');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into pacient(nume, prenume, cnp, sex, email, telefon, adresa, sectie) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssss", $nume, $prenume, $cnp, $sex, $email, $telefon, $adresa, $sectie);
		  if ($stmt->execute()) {
        // Redirecționare către pagina ta
        header("Location: programari.html"); // aici pui pagina următoare
        exit(); // obligatoriu după header
    } else {
        echo "Eroare la salvare: " . $stmt->error;
    }
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>