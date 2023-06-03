<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Quiz List</title>
	<link href="../quiz.css" rel="stylesheet" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="quiz.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
	<?php
	//include("header.php");
	include("../admin/header.php");
	include("../dbconnection.php"); {
		$sql = mysqli_query($con, "select * from airport_list");

		echo "<table class='table table-striped'>";
		echo "<tr><th><a class='btn btn-success' href=\"testadd.php\"> Add Airport</a></th></tr>";
		echo "<tr><th class='text-primary'>ID</th>
	
	<th class='text-primary'>Airport</th>
	<th class='text-primary'>Location</th>
	</tR>";

		while ($result = mysqli_fetch_assoc($sql)) {
			$id = $result['id'];
			echo "<tr>";
			echo "<td>" . $result['id'] . "</td>";
			echo "<td>" . $result['airport'] . "</td>";
			echo "<td>" . $result['location'] . "</td>";
			echo "<td><a href='testupdate.php?airport_id=$id'><span class='glyphicon glyphicon-edit'></span></a></td>";
			echo "<td><a href='testdelete.php?airport_id=$id'><span class='glyphicon glyphicon-trash'></span></a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	?>
</body>

</html>