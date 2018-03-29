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
//$sql = "SELECT o.*, om.* FROM orders o JOIN orders_meta om ON o.id = om.oid LIMIT 0,200"; 
$sql = "SELECT u.*, p.*
FROM users u
JOIN users_meta p ON u.id = p.uid LIMIT 0,200";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
//while($row = $result->fetch_obj()) {
print_r($row);
echo "<br />";
}
?>
