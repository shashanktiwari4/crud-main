<!DOCTYPE html>
<html>
<head>
	<title>MySQL Table Viewer</title>
</head>
<body>
	<h1>MySQL Table Viewer</h1>
	<?php
		// Define database connection variables
		$servername = "glmysqlserver02.mysql.database.azure.com";
		$username = "mbadmin";
		$password = "Samveda@2024";
		$dbname = "empdb";

		// Create database connection
                $conn = mysqli_init();
                mysqli_ssl_set($con,NULL,NULL, "/home/shashank", NULL, NULL);
                mysqli_real_connect($conn, "glmysqlserver02.mysql.database.azure.com", "mbadmin", "Samveda@2024", "empdb", 3306, MYSQLI_CLIENT_SSL);
		//$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Query database for all rows in the table
		$sql = "SELECT * FROM employees";
		$result = $conn->query($sql);
               echo "<script>console.log('this is a $result: " . $result. "' );</script>";

		if ($result->num_rows > 0) {
			// Display table headers
			echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
			// Loop through results and display each row in the table
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}

		// Close database connection
		$conn->close();
	?>
</body>
</html>
