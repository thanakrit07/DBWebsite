<?php

require 'connect.php';

function reject($txt)
{
    global $conn;
    $conn->close();
    die($txt);
}

global $conn;
// if ($conn->ping()) {
//     printf("Our connection is ok!\n");
// } else {
//     printf("Error: %s\n", $mysqli->error);
// }
$sql = "SELECT * FROM Customer";
if ($result = mysqli_query($conn, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
    // Free result set
    mysqli_free_result($result);
}

$sqlIn = "INSERT INTO Customer (CID,Fname, Lname, Tel)
VALUES ('$rowcount','$Fname','$Lname','$tel')";

 if ($conn->query($sqlIn) === false) {
    reject('{"success":false, "msg":"Insert error"}');
 }else{
     echo "OK";
 }
?>