<?php
include("dbconnection.php");
$sql = "SELECT * FROM airport_list";
$result = mysqli_query($con, $sql);
mysqli_close($con);
?>
<?php
include("header.php");
?>
<!DOCTYPE html>

<head>
        <title>Gryffindor Airlines</title>
        <link rel="stylesheet" href="gryff.css">
</head>

<body>
        <?php
        require_once 'process.php';
        ?>
        <div class="adnav">
                <a href="airport.php">Airports</a>
                <br>
                <a href="airline.php">Airlines</a>
                <br>
                <a href="flight.php">Flights</a>
                <br>
                <a class="pecu" href="tickets.php">Tickets</a>
                <br>
        </div>
        <div class="tablet">
                <table>
                        <tr>
                                <th>Airport Name</th>
                                <th>Airport Location</th>

                        </tr>
                        <?php
                        while ($rows = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                        <td><?php echo $rows['airport']; ?></td>
                                        <td><?php echo $rows['location']; ?></td>
                                </tr>
                        <?php
                        }
                        ?>
                </table>
        </div>
        <div id="adform">
                <form action="process.php" method="POST">
                        <p>
                                <label>Airport Name &nbsp</label>
                                <input type="text" name="aname" value="Enter airport name">
                        </p>
                        <p>
                                <label>Airport Location &nbsp</label>
                                <input type="text" name="alname" value="Enter Airport Location">
                        </p>
                        <button type="submit" name="save">Save</button>
                </form>
        </div>
</body>

</html>