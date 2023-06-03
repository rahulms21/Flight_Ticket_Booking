<?php
include("header1.php");
include("dbconnection.php");
 $pnr=$_GET['pnr'];
 $sql = "select * from tickets where pnr='$pnr'";
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$flight_id=$row['flight_id'];
$sql=mysqli_query($con,"delete from tickets where pnr='$pnr'");
$sql1="update flight_list set seat = seat + 1 where id = $flight_id";
mysqli_query($con,$sql1);
header('location:view_ticket.php');
