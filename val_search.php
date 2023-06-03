<?php
include "header1.php"
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Airlines List</title>
    <link href="quiz.css" rel="stylesheet" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="quiz.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/admin/css/bootstrap.min.css" />
    <link rek="stylesheet" href="gryff.css">
    <style>
        .book {
            margin-left: 47%;
            background-color: whitesmoke;
            font-size: 25;
        }
        </style>
</head>

<body>
    <br>
    <?php
    //session_start();
    include('dbconnection.php');

    echo "<table class='table table-striped'>";
    echo "<tr><th class='text-primary'>airline</th>
	<th class='text-primary'>flight_num</th>

	<th class='text-primary'>seat</th>
	<th class='text-primary'>price</th>
	<th class='text-primary'>d_date</th>
	<th class='text-primary'>d_time</th>
	<th class='text-primary'>a_date</th>
	<th class='text-primary'>a_time</th>
    <th class='text-primary'>&nbsp</th>
    </tr>";

    $dept = $_POST['dept'];
    $arr = $_POST['arr'];
    $date = $_POST['date'];

    $dept = stripcslashes($dept);
    $arr = stripcslashes($arr);
    $date = stripcslashes($date);
    /*
    $username = mysqli_real_escape_string($con,$username);
    $username = mysqli_real_escape_string($con,$password);
 */

    $sql = "select * from flight_list where dept='$dept' and arr='$arr' and d_date='$date' and seat >0";
    $result = mysqli_query($con, $sql);
    $i=1;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr>";
        $r = $row['airline'];
        $s = "select * from airlines_list where id ='$r'";
        $res = mysqli_query($con, $s);
        $res1 = mysqli_fetch_array($res, MYSQLI_ASSOC);
        echo "<td>" . $res1['airline'] . "</td>";
        $flight_num = $row['flight_num'];
        echo "<td>" . $row['flight_num'] . "</td>";
        echo "<td>" . $row['seat'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['d_date'] . "</td>";
        echo "<td>" . $row['d_time'] . "</td>";
        echo "<td>" . $row['a_date'] . "</td>";
        echo "<td>" . $row['a_time'] . "</td>";
        echo "<td><input type=\"radio\" name=\"fnum\" value=\"$flight_num\"></td>";
        echo "</tr>";
        $i=$i+1;
    }
    echo "</table>";
    echo "<br>";
    echo "<input type =\"button\" onclick=\"return seats()\" value=\"BOOK\" class=\"book\">";
   
    ?>

    <script>
        function seats() {
            // var fnum = "<?php 
            //         if (isset($fnum))
            //         {
            //             echo 'checked';
            //         }
            //     ?>";
             var ele = document.getElementsByName('fnum');
              var flag=0;
              for(i = 0; i < ele.length; i++) {
                  if(ele[i].checked)
                  {
                        var fnum=ele[i].value;
                        flag=1;
                  }
              }
              if(flag==0)
              {
                  prompt("Pls select a flight");
                  return;
              }
            var nop = prompt("Enter the number of passengers: ", "Type here(max 6)");
            document.location = 'book.php?target=' + nop + fnum;
            //  document.location = 'book.php?target=' + fnum;
            //  alert(fnum);
        }
    </script>
</body>

</html>