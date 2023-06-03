<?php

// $showAlert = false;
// $showError = false;
// $exists=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Include file which makes the
	// Database Connection.
	include 'dbconnection.php';

	$username = $_POST["aduser"];
	$password = $_POST["adpass"];
	// $cpassword = $_POST["cpassword"];
	$name = $_POST["adname"];
	$mob = $_POST["admobile"];


	$sql = "select * from customer_det where username='$username'";

	$result = mysqli_query($con, $sql);

	$num = mysqli_num_rows($result);

	// This sql query is use to check if
	// the username is already present
	// or not in our Database
	if ($num == 0) {
		// if(($password == $cpassword) && $exists==false) {

		// 	$hash = password_hash($password,
		// 						PASSWORD_DEFAULT);

		// Password Hashing is used here.
		$sql = "INSERT INTO customer_det (username,password,name,mobile) VALUES ('$username',
				'$password', '$name','$mob')";

		$result = mysqli_query($con, $sql);

		header("location: login.php");

		// if ($result) {
		// 	$showAlert = true;
		// }
		// }
		// else {
		// 	$showError = "Passwords do not match";
		// }	
	} // end if

	if ($num > 0) {
		$exists = "Username not available";
		header("location: signup.php");
	}
} //end if

?>

</body>

</html>