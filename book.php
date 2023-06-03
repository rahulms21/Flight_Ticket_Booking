<?php
session_start();
include('dbconnection.php');
$fnum = $_GET['target'];
// $nop = $_POST['nop'];
// $usertype = $_POST['usertype'];
$nop = substr($fnum, 0, 1);
$flight_num = substr($fnum, 1);
$_SESSION["flight_num"] = $flight_num;
$_SESSION["nop"] = $nop;
// echo "$nop";
// echo "$flight_num";

include "header1.php";

$sql = "select * from flight_list where flight_num = '$_SESSION[flight_num]'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$seat = $row['seat'];
if ($seat < $nop) {
    echo '<script>alert("NOT ENOUGH SEATS")</script>';
    echo "<script>document.location = 'ex.php'</script>";
}
?>
<html>

<head>
    <title>Gryffindor Airlines</title>
    <link rel="stylesheet" href="gryff.css">
</head>

<body>
    <div id="adform">
        <h2>Enter Passenger Details</h2>
        <form name="b1" action="val_book.php" method="POST">
            <p>
                <?php for ($i = 1; $i <= $nop; $i++) { ?>
                    <label><?php echo "Passenger $i:" ?>
                        <br>
                        <label>Enter Passenger Name &nbsp;</label>
                        <input type="text" id="pname<?php echo $i ?>" name="pname<?php echo $i ?>">
                        <br>
                        <label>Enter Age &nbsp;</label>
                        <br>
                        <input type="text" id="page<?php echo $i ?>" name="page<?php echo $i ?>">
                        <br>
                        <label>Enter Gender &nbsp;</label>
                        <input type="text" id="pgender<?php echo $i ?>" name="pgender<?php echo $i ?>">
                        <br>
                    <?php }
                    ?>
            </p>
            <p>
                <input type="submit" id="adsub" value="Confirm" />
            </p>
        </form>
    </div>
</body>

</html>