<?php
session_start();
require("../dbconnection.php");
//include("../header.php");
error_reporting(1);
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" />
<?php

extract($_POST);

echo "<BR>";
// if (!isset($_SESSION['alogin']))
// {
// 	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
// 	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
// 	exit();
// }
echo "<h1 class='text-center bg-primary'>ADD FLIGHTS</h1>";

echo "<table width=100%>";
echo "<tr><td align=center></table>";
// if($_POST[submit]=='Add')
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $rs = mysqli_query($con, "select * from flight_list where flight_num ='$flight_num'");
  if (mysqli_num_rows($rs) > 0) {
    echo "<div class=head1><strong>Flight already exists</strong></div>";
  } else {
    $sql = "INSERT INTO flight_list (airline,flight_num,dept,arr,seat,price,d_date,a_date,d_time,a_time) VALUES ('$airline','$flight_num','$dept','$arr','$seat','$price','$d_date','$a_date','$d_time','$a_time')";
    mysqli_query($con, $sql);

    echo "<h4 align=center class='text-success'>FLight<b> \"$flight_num \"</b> Added Successfully.</h4>";
    //$submit = "";
    header("location: questionview.php");
  }
}
?>
<SCRIPT LANGUAGE="JavaScript">
  function check() {
    mt = document.form1.flight_num.value;
    if (mt.length < 1) {
      alert("Please Enter Flight num");
      document.form1.airport.focus();
      return false;
    }
    return true;
  }
</script>

<title>Add Flight</title>
<form name="form1" method="post" onSubmit="return check();">
  <table class="table table-striped">
    <tr>
      <td width="45%" height="32">
        <div align="left"><strong>Enter Airline </strong></div>
      </td>

      <td width="53%" height="32">
        <input class="form-control" name="airline" type="text" id="airline">
      </td>
    </tr>
    <tr>
      <td width="45%" height="32">
        <div align="left"><strong>Enter Flight num </strong></div>
      </td>

      <td width="53%" height="32">
        <input class="form-control" name="flight_num" type="text" id="flight_num">
      </td>
    </tr>
    <tr>
      <td>
        <div align="left"><strong>Enter dept </strong></div>
      </td>
      <td width="53%" height="32">
        <input class="form-control" name="dept" type="text" id="dept">
      </td>
    </tr>
    <tr>
      <td width="45%" height="32">
        <div align="left"><strong>Enter arr</strong></div>
      </td>

      <td width="53%" height="32">
        <input class="form-control" name="arr" type="text" id="arr">
      </td>
    </tr>
    <tr>
      <td width="45%" height="32">
        <div align="left"><strong>Enter seat </strong></div>
      </td>

      <td width="53%" height="32">
        <input class="form-control" name="seat" type="text" id="seat">
      </td>
    </tr>
    <tr>
      <td width="45%" height="32">
        <div align="left"><strong>Enter price </strong></div>
      </td>

      <td width="53%" height="32">
        <input class="form-control" name="price" type="text" id="price">
      </td>
    </tr>
    <tr>
      <td width="45%" height="32">
        <div align="left"><strong>Enter d_date </strong></div>
      </td>

      <td width="53%" height="32">
        <input class="form-control" name="d_date" type="date" id="d_date">
      </td>
    </tr>
    <tr>
      <td width="45%" height="32">
        <div align="left"><strong>Enter a_date </strong></div>
      </td>

      <td width="53%" height="32">
        <input class="form-control" name="a_date" type="date" id="a_date">
      </td>
    </tr>
    <tr>
      <td width="45%" height="32">
        <div align="left"><strong>Enter d_time </strong></div>
      </td>

      <td width="53%" height="32">
        <input class="form-control" name="d_time" type="time" id="d_time">
      </td>
    </tr>
    <tr>
      <td width="45%" height="32">
        <div align="left"><strong>Enter a_time </strong></div>
      </td>

      <td width="53%" height="32">
        <input class="form-control" name="a_time" type="time" id="a_time">
      </td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" name="submit" value="Add"></td>
    </tr>
  </table>
</form>