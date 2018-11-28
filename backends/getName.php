<?php
require 'connect.php';
global $conn;
$namelist = array();

$sql = "SELECT * FROM Customer";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    array_push($namelist, $row);
}
$CName = $namelist[sizeof($namelist)-1]["Fname"]; 
?>