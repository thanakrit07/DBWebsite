<?php
require 'connect.php';
global $conn;
$Fname = $Lname = $Tel = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function reject($txt)
{
    global $conn;
    $conn->close();
    die($txt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!empty($_POST["data"])) {
        
        //test_input
        if (!empty($_POST["Fname"])){
            $Fname = test_input($_POST["Fname"]);
        }
        if (!empty($_POST["Lname"])){
            $Lname = test_input($_POST["Lname"]);
        }
        if (!empty($_POST["Tel"])){
            $Tel = test_input($_POST["Tel"]);
        }
    
        $sql = "SELECT * FROM Customer";
        if ($result = mysqli_query($conn, $sql)) {
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows($result);
            // Free result set
            mysqli_free_result($result);
        }

        $sqlIn = "INSERT INTO Customer (CID,Fname, Lname, Tel) 
        VALUES ('$rowcount','$Fname','$Lname','$Tel')";

        if ($conn->query($sqlIn) === false) {
            reject('{"success":false, "msg":"Insert error"}');
        } else {
            header('Location: /src/Homepage.php');
        }
    }
}
// if (isset($_POST['data'])) {
//     if($_POST['data'] == submit) {
//         echo "eiei";
//         if (empty($_POST["Fname"])) {
//             $FnameErr = "First Name is required";
//         } else {
//             $Fname = test_input($_POST["Fname"]);
//             // check if name only contains letters and whitespace
//             if (!preg_match("/^[a-zA-Z ]*$/", $Fname)) {
//                 $FnameErr = "Only letters and white space allowed";
//             }
//         }

//         if (empty($_POST["Lname"])) {
//             $LnameErr = "Last Name is required";
//         } else {
//             $Lname = test_input($_POST["Lname"]);
//             // check if name only contains letters and whitespace
//             if (!preg_match("/^[a-zA-Z ]*$/", $Lname)) {
//                 $LnameErr = "Only letters and white space allowed";
//             }
//         }

//         if (empty($_POST["tel"])) {
//             $telErr = "Telephone number is required";
//         } else {
//             $tel = test_input($_POST["tel"]);
//             // check if tel are in correct form
//             if (!preg_match("/^0[0-9]{9}$/", $tel)) {
//                 $telErr = "Please fill in form of 0812345678";
//             } else {
//                 $corr = true;
//             }

//         }

//         if (empty($_POST["agree"])) {
//             $agreeErr = "You must agree before submitting.";
//         } else {
//             $agree = test_input($_POST["agree"]);
//         }
//     } else {
//         echo 'eiei';
//     }
// }
