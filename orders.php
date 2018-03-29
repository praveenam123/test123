<?php
$servername = "localhost";
$username = "root";
$password = "Praveena@01";
$dbname = "leftwhlx_aug15";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected sucessfully";
//$sql="select * from users LIMIT 0,10";
$sql = "SELECT `username`,`key`,`value` FROM `users_meta` INNER JOIN users ON users.id = users_meta.uid";
//$sql = "SELECT `id` FROM `orders` INNER JOIN users ON users.id = orders.uid  LIMIT 0,200";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
//while($row = $result->fetch_obj()) {
print_r($row);
echo "<br />"
}
?>
