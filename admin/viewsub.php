<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Airlines List</title>
	<link href="../quiz.css" rel="stylesheet" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="quiz.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rek="stylesheet" href="../gryff.css">
</head>

<body>
	<?php
	// include("../header.php");
	include("../admin/header.php");
	include("../dbconnection.php"); {
		$sql = mysqli_query($con, "select * from airlines_list");

		echo "<table class='table table-striped'>";
		echo "<tr><th><a class='btn btn-success' href='subadd.php'>Add Airlines</a></th></tr>";
		echo "<tr><th class='text-primary'>ID</th><th class='text-primary'>Name</th>
	<th class='text-primary'>Update</th>
	<th class='text-primary'>Delete</th></tR>";

		while ($result = mysqli_fetch_assoc($sql)) {
			$id = $result['id'];

			echo "<tr>";
			echo "<td>" . $result['id'] . "</td>";
			echo "<td>" . $result['airline'] . "</td>";
			echo "<td><a href='subupdate.php?airline_id=$id'><span class='glyphicon glyphicon-edit'></span></a></td>";
			echo "<td><a href='subdelete.php?airline_id=$id'><span class='glyphicon glyphicon-trash'></span></a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	?>
</body>

</html>