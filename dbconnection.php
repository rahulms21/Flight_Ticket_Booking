<?php
$host ="localhost";
$user ="root";
$password="";
$db_name="gryffdb";
$con = mysqli_connect($host,$user,$password,$db_name);
if(mysqli_connect_errno()){
    die("Failed to connect to MySQL: ".mysqli_connect_error());
}
