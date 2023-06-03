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
		$sql = mysqli_query($con, "select * from flight_list");

		echo "<table class='table table-striped'>";
		echo "<tr><th><a class='btn btn-success' href='questionadd.php'>Add Flight</a></th></tr>";
		echo "<tr><th class='text-primary'>ID</th>
	<th class='text-primary'>airline</th>
	<th class='text-primary'>flight_num</th>
	<th class='text-primary'>dept</th>
	<th class='text-primary'>arr</th>
	<th class='text-primary'>seat</th>
	<th class='text-primary'>price</th>
	<th class='text-primary'>d_date</th>
	<th class='text-primary'>a_date</th>
	<th class='text-primary'>d_time</th>
	<th class='text-primary'>a_time</th></tR>";

		while ($result = mysqli_fetch_assoc($sql)) {
			$id = $result['id'];

			echo "<tr>";
			echo "<td>" . $result['id'] . "</td>";
			echo "<td>" . $result['airline'] . "</td>";
			echo "<td>" . $result['flight_num'] . "</td>";
			echo "<td>" . $result['dept'] . "</td>";
			echo "<td>" . $result['arr'] . "</td>";
			echo "<td>" . $result['seat'] . "</td>";
			echo "<td>" . $result['price'] . "</td>";
			echo "<td>" . $result['d_date'] . "</td>";
			echo "<td>" . $result['a_date'] . "</td>";
			echo "<td>" . $result['d_time'] . "</td>";
			echo "<td>" . $result['a_time'] . "</td>";
			//echo "<td><a href='subupdate.php?airline_id=$id'><span class='glyphicon glyphicon-edit'></span></a></td>";
			echo "<td><a href='quedelete.php?airline_id=$id'><span class='glyphicon glyphicon-trash'></span></a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	?>
</body>

</html>