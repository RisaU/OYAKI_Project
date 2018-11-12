<?php 
	function doDB() {
		global $mysqli;
		$host = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'oyaki';
		
		
		// connect to server and select database
		$mysqli = mysqli_connect($host, $username, $password, $dbname);
		
		// if connect fail, stop script execution
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			
			exit();
    }
    return $mysqli;
	}
?>