<?php
$conn = new mysqli("localhost", "root", "", "phpprojects");
if ($conn->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$monsterid = $_POST['monsterid'];

$sql = 'SELECT * FROM monsters WHERE id = '. $monsterid;
 
$rs = $conn->query($sql);
  
if($rs === false) {
  $results = trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
} else {
  while($r = mysqli_fetch_assoc($rs)) {
	  $birthDate = $r['birthDate'];
	  $firstName = $r['firstName'];
	  $lastName = $r['lastName'];
	  $date = new DateTime($birthDate);
	  $newdate = date_format($date, 'F jS, Y');
	  $results = $firstName . " " . $lastName . ";" . $newdate;
  }
}
echo $results;

?>

