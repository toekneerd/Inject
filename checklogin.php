<?php

echo("Hello!");
echo "<br><br>";
// MySQL Connection
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con,"login");

// POST variables
$user=$_POST['user'];
$pass=$_POST['pass'];

// MD5 hash
//$pass=md5($pass);

// Query "login" table
$result = mysqli_query($con,"SELECT * FROM login WHERE user = '$user' AND pass = '$pass'");
$rowcount=mysqli_num_rows($result);
// Login validation
if($rowcount != 0) {
    $row = mysqli_fetch_array($result);
    echo "<font color='blue'>Welcome, ".$row['user']."!</font>";
}
else {
    echo "Wrong username or password!";
}

// Query highlight
echo "<br><br>";
echo "SELECT * FROM login WHERE user = '";
echo "<font color='red'>".$user."</font>' AND pass = '<font color='red'>".$pass."</font>';";

?>