<?php
session_start();
    include('dbconnection.php');
    include('header1.php');
    $username = $_POST['aduser'];
    $password = $_POST['adpass'];
    $usertype = $_POST['usertype'];

    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $usertype = stripcslashes($usertype);
    /*
    $username = mysqli_real_escape_string($con,$username);
    $username = mysqli_real_escape_string($con,$password);
 */
if($usertype == "admin")
{

    $sql = "select *from admin_det where username = '$username' and password = '$password'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
        if($count == 1){
                            echo "<h1>Login Successful</h1>";
                            header("location: admin/header.php");
                        }
        else{
                echo "<h1>Login Failed.Invalid Username or Password</h1>";
                header("location: logindup.php");
            }
}
else
{
    $sql = "select *from customer_det where username = '$username' and password = '$password'";
    $result1 = mysqli_query($con,$sql);
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $id=$row1['id'];
    echo "$id";
    $count1 = mysqli_num_rows($result1);

            if($count1 == 1){
                                echo "<h1>Login Successful</h1>";
                                //echo "<a href='ex.php?uid=$id'>CLICK HERE</a>";
                                $_SESSION['uid']=$id;
                                header("location: ex.php");
                            }
            else{
                                echo "<h1>Login Failed.Invalid Username or Password</h1>";
                                header("location: logindup.php");
                }
}
