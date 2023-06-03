<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>Airlines Update</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link href="../quiz.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
  <?php
  include("../admin/header.php");
  //include("../header.php");
  include("../dbconnection.php");
  extract($_REQUEST);
  $id = $_GET['airline_id'];
  $q = mysqli_query($con, "select * from airlines_list where id='$id'");
  $res = mysqli_fetch_assoc($q);


  if (isset($update)) {

    $query = "update airlines_list SET airline='$airline' where id='$id'";
    mysqli_query($con, $query);
    echo "<h2 class='text-success'>Records updated!</h2>";
    $q = mysqli_query($con, "select * from airlines_list where id='$id'");
    $res = mysqli_fetch_assoc($q);
    header("location: viewsub.php");
  }



  ?>
  <h1 class='text-center bg-primary'>UPDATE Airlines</h1>
  <title>Add Airlines</title>
  <form name="form1" method="post" onSubmit="return check();">
    <table class="table table-striped">
      <tr>
        <td>
          <div align="left"><strong>Enter Airline Name </strong></div>
        </td>
        <td width="2%" height="5">
        <td width="53%" height="32">
          <input class="form-control" value="<?php echo $res['airline']; ?>" name="airline" placeholder="enter language name" type="text" id="airlines">
      <tr>
        <td height="26"></td>
        <td>&nbsp;</td>
        <td><input class="btn btn-primary" type="submit" name="update" value="Update"></td>
      </tr>
    </table>
  </form>
  <p>&nbsp; </p>
</body>

</html>