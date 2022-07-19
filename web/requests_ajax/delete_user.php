<?php
	$Id = $_POST['id'];
	require "../database.php";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = 'DELETE FROM dinghaopu_user WHERE dinghaopu_user_id= ' . $Id;
	if($conn->query($sql)) {
		echo true;
	}
	else {
		echo false;
	}
	
?>