<?php
include "dbconnection.php";
include "header1.php";
session_start();
?>
<html>

<head>
    <title>Ticket List</title>
    <link href="quiz.css" rel="stylesheet" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="quiz.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/admin/css/bootstrap.min.css" />
    <link rek="stylesheet" href="gryff.css">
</head>

<body>
    <br>
    <?php
    //session_start();
    // include('dbconnection.php');

    echo "<table class='table table-striped'>
    <tr><th class='text-primary'>PNR</th>
    <th class='text-primary'>Name</th>
    <th class='text-primary'>Age</th>
    <th class='text-primary'>Gender</th>
	<th class='text-primary'>Flight_Num</th>
    <th class='text-primary'>FROM</th>
    <th class='text-primary'>TO</th>
	<th class='text-primary'>d_date</th>
	<th class='text-primary'>d_time</th>
	<th class='text-primary'>a_date</th>
	<th class='text-primary'>a_time</th>
    <th class='text-primary'>&nbsp</th>
    </tR>";

    $uid = $_SESSION["uid"];

    //$sql = "select f.* from flight_list f inner join airport_list a on a.dept = '$dept' and a.dept = f.dept and a.arr = '$arr' and a.arr = f.arr and f.d_date = '$date' " ;
    $sql = "select * from tickets where uid='$uid'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr>";
        $r = $row['flight_id'];
        $s = "select * from flight_list where id ='$r'";
        $res = mysqli_query($con, $s);
        $res1 = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $sam="select * from airport_list where id = '$res1[dept]'";
        $re = mysqli_query($con, $sam);
        $sam1 = mysqli_fetch_array($re, MYSQLI_ASSOC);
        echo "<td>" . $row['pnr'] . "</td>";
        $pnr = $row['pnr'];
        echo "<td>" . $row['p_name'] . "</td>";
        echo "<td>" . $row['p_age'] . "</td>";
        echo "<td>" . $row['p_gender'] . "</td>";
        echo "<td>" . $res1['flight_num'] . "</td>";
        echo "<td>" . $sam1['location'] . "</td>";
        $sam="select * from airport_list where id = '$res1[arr]'";
        $re = mysqli_query($con, $sam);
        $sam1 = mysqli_fetch_array($re, MYSQLI_ASSOC);
        echo "<td>" . $sam1['location'] . "</td>";
        echo "<td>" . $res1['d_date'] . "</td>";
        echo "<td>" . $res1['d_time'] . "</td>";
        echo "<td>" . $res1['a_date'] . "</td>";
        echo "<td>" . $res1['a_time'] . "</td>";
        echo "<td><a href='cancel_ticket.php?pnr=$pnr'><strong>CANCEL</strong></a></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>

</html>