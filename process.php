<?php

// $showAlert = false;
// $showError = false;
// $exists=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Include file which makes the
	// Database Connection.
	include 'dbconnection.php';

	$airname = $_POST["aname"];
	$airloc = $_POST["alname"];
	// $cpassword = $_POST["cpassword"];


	$sql = "select * from airport_list where airport='$airname'";

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
		$sql = "INSERT INTO airport_list (airport,location) VALUES ('$airname',
				'$airloc')";

		$result = mysqli_query($con, $sql);

		header("location: dashboard.php");

		// if ($result) {
		// 	$showAlert = true;
		// }
		// }
		// else {
		// 	$showError = "Passwords do not match";
		// }	
	} // end if

	if ($num > 0) {
		$exists = "airport already exists";
		header("location: dashboard.php");
	}
} //end if

?>

</body>

</html>