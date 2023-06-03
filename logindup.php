<?php
include "header.php"
?>
<!DOCTYPE html>

<head>
    <title>Gryffindor Airlines</title>
    <link rel="stylesheet" href="gryff.css">
</head>

<body>
    <div id="adform">
        <h2>Invalid Credentials!!!!!!!!</h2>
        <h2>LOGIN</h2>
        <form name="f1" action="val_login.php" onsubmit="return validation()" method="POST">
            <p>
                <label>Username &nbsp;</label>
                <input type="text" id="aduser" name="aduser" />
            </p>
            <p>
                <label>Password &nbsp;</label>
                <input type="password" id="adpass" name="adpass" />
            </p>
            <p>
                <input type="radio" name="usertype" value="admin">Admin
                <input type="radio" name="usertype" value="customer">Customer
            </p>
            <p>
                <input type="submit" id="adsub" value="Login" />
            </p>
            <p>
                <label>Don't have an account? &nbsp; <a href="signup.php">Sign Up</a></label>
            </p>
        </form>
    </div>
    <script>
        function validation() {
            var id = document.f1.aduser.value;
            var ps = document.f1.adpass.value;
            var lg = document.f1.usertype.value;
            if (id.length == "" && ps.length == "" && lg.length == "") {
                alert("All fields are empty");
                return false;
            } else {
                if (id.length == "") {
                    alert("Username is empty");
                    return false;
                }
                if (ps.length == "") {
                    alert("Password is empty");
                    return false;
                }
                if (lg.length == "") {
                    alert("usertype is empty");
                    return false;
                }
            }
        }
    </script>
</body>

</html>