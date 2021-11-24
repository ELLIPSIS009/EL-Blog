<?PHP
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "maindb";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn->set_charset('utf8');
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>
