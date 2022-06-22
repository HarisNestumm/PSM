<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "preschoollearningsystem";

// $servername = "remotemysql.com";
// $username = "eD8koDsOxv";
// $password = "N2M8xFsX3l";
// $dbname = "eD8koDsOxv";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
define('DB_SERVER', 'remotemysql.com');////////mysqlremote
define('DB_USERNAME', 'eD8koDsOxv');
define('DB_PASSWORD', 'N2M8xFsX3l');
define('DB_NAME', 'eD8koDsOxv');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
