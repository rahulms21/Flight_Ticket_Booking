<?php
session_start();
include "dbconnection.php";
include "header1.php";
$nop = $_SESSION['nop'];
$fnum = $_SESSION['flight_num'];
$sql = "select * from flight_list where flight_num= '$fnum'";
$result = mysqli_query($con, $sql);
$row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
$price = $row1['price'];
$total = (int)$nop * (int)$price;
// echo "$total";
?>
<style>
    div#myBox {
  margin-left:40%;
  margin-top: 35px;
}
    .one {
        color: yellow;
        font-weight: bold;
    }
    
</style>
<html>

<body>
    <div id="myBox">
    <h1 class="one">Ticket Payment</h1>
    <h4 class="one">Cost of Each Ticket = <?php echo "$price" ?><br>
        <h4 class="one">Number of Passengers = <?php echo "$nop" ?><br>
            <h4 class="one">Total Cost = <?php echo "$total" ?><br>
                <button onclick="window.location.href='/gryffindor/success.php'">CONFIRM PAYMENT</button>

</div>
</body>

</html>