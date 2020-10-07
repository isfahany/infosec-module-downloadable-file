<?php
    include("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['name'];
	$password = $_POST['pass'];
	$query = "select id from user where username = '$username' and password = '$password'";
	$data = mysqli_query($conn,  $query) or die (mysqli_error($conn));
	$ret = mysqli_fetch_array($data, MYSQLI_ASSOC);
	if(isset($ret) && $ret){
            header("location: admin.php");
        } else{
            die("Sequel is injectable, so is No Sequel");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQLi Login</title>
</head>
<body>
    <form action="index.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="pass">Pass:</label>
        <input type="password" id="pass" name="pass"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
