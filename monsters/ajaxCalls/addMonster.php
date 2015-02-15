<?php
$conn = new mysqli("localhost", "root", "", "phpprojects");
if ($conn->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$firstName = mysql_real_escape_string($_POST['firstName']);
$lastName = mysql_real_escape_string($_POST['lastName']);
$birthDate = mysql_real_escape_string($_POST['birthDate']);

$sql = "INSERT INTO monsters (firstName, lastName, birthDate) VALUES ('$firstName','$lastName','$birthDate')";
 
$rs = $conn->query($sql);
  
if($rs === false) {
  $results = trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
} else {
	
	$sql = 'SELECT * FROM monsters ORDER BY firstName ASC';
                             
	$rs = $conn->query($sql);
	  
	if($rs === false) {
	  echo trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
	} else {
	  while($r = mysqli_fetch_assoc($rs)) {
		  $id = $r['id'];
		  $firstName = $r['firstName'];
		  $lastName = $r['lastName'];
		  
		  echo "<option value='".$id."'>".$firstName. " " .$lastName. "</option>";
	  }
	}
}


?>