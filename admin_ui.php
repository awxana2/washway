<html>

<head>
    <title>admin </title>
</head>

<body>
    <?php
// Include the database connection file
require_once("koneksi.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
		
	// Check for empty fields
	if (empty($email) || empty($password)) {
		if (empty($email)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($password)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        echo "<script>console.log('gagal')</script>";

	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($connect, "INSERT INTO user (`email`, `password`) VALUES ('$email', '$password')");
		
		// Display success message
		header("location: admin_dasboard.php");
	}
}
?>
</body>

</html>