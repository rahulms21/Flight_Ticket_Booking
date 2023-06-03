<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>Test Update</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link href="../quiz.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
  <?php
  //include("header.php");
  include("../dbconnection.php");
  extract($_POST);
  $id = $_GET['airport_id'];
  $q = mysqli_query($con, "select * from airport_list where id='$id'");
  $res = mysqli_fetch_assoc($q);


  if (isset($update)) {

    $query = "update airport_list SET airport='$airport',location='$location' where id='$id'";
    mysqli_query($con, $query);
    echo "<h2 class='text-success'>Records updated!</h2>";
    $q = mysqli_query($con, "select * from airport_list where id='$id'");
    $res = mysqli_fetch_assoc($q);
  }



  ?>
  <form name="form1" method="post" action="">
    <h2 class='text-center bg-primary'>UPDATE AIRPORT</h2>
    <table class="table table-striped">

      <tr>
        <td height="26">
          <div align="left"><strong> Enter Airport </strong></div>
        </td>
        <td><input class="form-control" value="<?php echo $res['airport']; ?>" name="airport" type="text" id="airport"></td>
      </tr>
      <tr>
        <td height="26">
          <div align="left"><strong>Enter location </strong></div>
        </td>
        <td><input class="form-control" value="<?php echo $res['location']; ?>" name="location" type="text" id="location"></td>
      </tr>
      <tr>
        <td height="26"></td>
        <td><input class="btn btn-primary" type="submit" name="update" value="Update"></td>
      </tr>
    </table>
  </form>
  <p>&nbsp; </p>
</body>

</html>