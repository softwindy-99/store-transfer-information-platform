<?php
	$Id = $_POST['id'];
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = 'SELECT * FROM dinghaopu_image WHERE dinghaopu_image_id= ' . $Id;
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$name = $row['dinghaopu_image_url'];
		$name = str_replace("https://softwindy.com/test/dinghaopu/","../",$name);
		if(unlink($name)){
			$sql = 'DELETE FROM dinghaopu_image WHERE dinghaopu_image_id= ' . $Id;
			if($conn->query($sql)) {
				echo true;
			}
			else {
				echo false;
			}
		}
		else {
			echo false;
		}
	}
	else {
		echo false;
	}
	
?>