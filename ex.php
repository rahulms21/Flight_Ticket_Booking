<?php
include("header1.php");
?>
<?php
include("dbconnection.php");
$sql = "select * from airport_list";
$result = mysqli_query($con, $sql);
$list = mysqli_fetch_all($result, MYSQLI_ASSOC);
//$uid=$_GET['uid'];

?>
<!DOCTYPE html>

<head>
    <title>Gryffindor Airlines</title>
    <link rel="stylesheet" href="gryff.css">
</head>

<body>
    <div id="adform">
        <h2 class="headtag">SEARCH FLIGHT</h2>
        <form name="sf" action="val_search.php" onsubmit="" method="POST">

            <p>
                <label for=""> FROM &nbsp </label>
                <select name="dept" id="dept">
                    <?php foreach ($list as $airport) { ?>
                        <option value=<?php echo $airport['id']; ?>> <?php echo $airport['airport']; ?> </option>
                    <?php } ?>
                    <option value=""></option>

                </select>
            </p>
            <p>
                <label for=""> TO &nbsp &nbsp &nbsp &nbsp </label>
                <select name="arr" id="arr">
                    <?php foreach ($list as $airport) { ?>
                        <option value=<?php echo $airport['id']; ?>> <?php echo $airport['airport']; ?> </option>
                    <?php } ?>
                    <option value=""></option>

                </select>
            </p>
            <p>
                <label for="">DEPARTURE DATE </label>
                <input type="date" name="date" id="date">
            </p>
            <p>
                <input type="submit" value="Find Flights">
            </p>
        </form>
    </div>
</body>

</html>