<?php
include_once("include/config.php");

session_start();

if(isset($_POST["username"]) && trim($_POST["username"]) != "") {
    // username and password sent from Form
    $myusername=addslashes($_POST['username']);

    $sql = "SELECT user_id FROM users WHERE username='$myusername'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);

    // If result matched $myusername, table should have at least 1 row
    if(mysql_num_rows($result) == 0) {
        // If we did not find a user then let's add to the DB
        $sql = sprintf("INSERT INTO users(username) VALUES ('%s')", $myusername);
        $result = mysql_query($sql);
    }
    $_SESSION["login_user"] = $myusername;

    header("location: places.php");
    exit;
}

?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="navbar">
        <div class="navbar-inner">
            <label class="brand">UserName :</label>
            <ul class="nav">
                <li>
                    <form class="navbar-form pull-left" action="" method="post">
                        <input type="text" name="username" />
                        <button type="submit" class="btn" value="submit">Submit</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>