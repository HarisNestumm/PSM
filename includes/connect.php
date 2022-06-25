<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "preschoollearningsystem";

$servername = "remotemysql.com";
$username = "cSFHLhICll";
$password = "vwVIuO1p9J";
$dbname = "cSFHLhICll";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
define('DB_SERVER', 'remotemysql.com');////////mysqlremote
define('DB_USERNAME', 'cSFHLhICll');
define('DB_PASSWORD', 'vwVIuO1p9J');
define('DB_NAME', 'cSFHLhICll');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
