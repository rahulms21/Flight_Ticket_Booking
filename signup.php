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
        <h2>SIGN UP</h2>
        <form name="f1" action="val_signup.php" onsubmit="return validation()" method="POST">
            <p>
                <label>Username/E-Mail &nbsp;</label>
                <input type="text" id="aduser" name="aduser" />
            </p>
            <p>
                <label>Password &nbsp;</label>
                <br>
                <input type="password" id="adpass" name="adpass" />
            </p>
            <p>
                <label>Confirm Password &nbsp;</label>
                <br>
                <input type="password" id="adpassc" name="adpassc" />
            </p>
            <p>
                <label>Name &nbsp;</label>
                <br>
                <input type="text" id="adname" name="adname" />
            </p>
            <p>
                <label>Mobile &nbsp;</label>
                <br>
                <input type="text" id="admobile" name="admobile" />
            </p>
            <p>
                <input type="submit" id="adsub" value="Sign-up" />
            </p>
        </form>
    </div>
    <script>
        function validation() {
            var id = document.f1.aduser.value;
            var ps = document.f1.adpass.value;
            var pd = document.f1.adpassc.value;
            var lg = document.f1.adname.value;
            var mb = document.f1.admobile.value;
            if (id.length == "" && ps.length == "" && pd.length == "" && lg.length == "" && mb.length == "") {
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
                    alert("name is empty");
                    return false;
                }
                if (mb.length == "") {
                    alert("mobile number is empty");
                    return false;
                }
                if (ps.length != pd.length) {
                    alert("Passwords don't match");
                    return false;
                }
            }
        }
    </script>
</body>

</html>