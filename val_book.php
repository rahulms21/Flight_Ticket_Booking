<?php
session_start();
include "dbconnection.php";
include "header1.php";
$nop = $_SESSION['nop'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    for ($i = 1; $i <= $nop; $i++) {

        $pname = $_POST['pname' . strval($i)];
        $page = $_POST['page' . strval($i)];
        $pgender = $_POST['pgender' . strval($i)];
        $sql = "select * from flight_list where flight_num = '$_SESSION[flight_num]'";
        $result1 = mysqli_query($con, $sql);
        $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
        $id = $row1['id'];
        mysqli_query($con, "insert into tickets(uid,p_name,p_age,p_gender,flight_id) values ('$_SESSION[uid]','$pname','$page','$pgender','$id')") or die(mysqli_error());
        $sql1 = "update flight_list set seat = seat -1 where id = $id";
        mysqli_query($con, $sql1);
        //echo "<h4 align=center class='text-success'>Subject  <b> \"$airline \"</b> Added Successfully.</h4>";
        $submit = "";
    }

    // echo "<h1 color='yellow'>BOOKED SUCCESSFULLY</h1>";
    echo "<button onclick=\"window.location.href='/gryffindor/payment.php'\">CLICK HERE TO PAY</button>";
}
