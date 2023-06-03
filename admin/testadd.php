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
echo "<h1 class='text-center bg-primary'>ADD AIRPORT</h1>";

echo "<table width=100%>";
echo "<tr><td align=center></table>";
// if($_POST[submit]=='Add')
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $rs = mysqli_query($con, "select * from airport_list where airport='$airport'");
  if (mysqli_num_rows($rs) > 0) {
    echo "<div class=head1>Airport already exists</div>";
  } else {
    mysqli_query($con, "insert into airport_list(airport,location) values ('$airport','$location')") or die(mysqli_error());
    echo "<h4 align=center class='text-success'>Subject  <b> \"$airport \"</b> Added Successfully.</h4>";
    $submit = "";
    header("location: testview.php");
  }
}
?>
<SCRIPT LANGUAGE="JavaScript">
  function check() {
    mt = document.form1.airport.value;
    if (mt.length < 1) {
      alert("Please Enter Airport Name");
      document.form1.airport.focus();
      return false;
    }
    return true;
  }
</script>

<title>Add Airport</title>
<form name="form1" method="post" onSubmit="return check();">
  <table class="table table-striped">
    <tr>
      <td width="45%" height="32">
        <div align="left"><strong>Enter Airport Name </strong></div>
      </td>

      <td width="53%" height="32">
        <input class="form-control" name="airport" type="text" id="airport">
      </td>
    </tr>
    <tr>
      <td>
        <div align="left"><strong>Enter Location </strong></div>
      </td>
      <td width="53%" height="32">
        <input class="form-control" name="location" type="text" id="location">
      </td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" name="submit" value="Add"></td>
    </tr>
  </table>
</form>