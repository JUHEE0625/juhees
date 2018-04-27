<?php
$servername = "mysql.hostinger.kr";
$database = "u375181454_hotel";
$username = "u375181454_juhee";
$password = "dst1738";
// Create connection
$dbConnect = mysqli_connect($servername, $username, $password, $database);
 echo "Connect Succeed";
// Check connection
if (!$dbConnect) {
    echo "Connect failed";
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($dbConnect);
?>
