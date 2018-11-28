<?php
require 'connect.php';
global $conn;
$Fname = $Lname = $Tel = $Religion = $Allergy = "";
$ShopName = $menuItem = "";
$menu = $shop = $menuInfo = $review = $queue = array();
$queue = $customer = array();
$next1 = $next2 = true;

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
        if (!empty($_POST["Fname"])) {
            $Fname = test_input($_POST["Fname"]);
        }
        if (!empty($_POST["Lname"])) {
            $Lname = test_input($_POST["Lname"]);
        }
        if (!empty($_POST["Tel"])) {
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
            //add Cart
            $CID = $rowcount;

            //gen QID
            $sql = "SELECT * FROM OrderQueue";
            if ($result = mysqli_query($conn, $sql)) {
                // Return the number of rows in result set
                $rowcount = mysqli_num_rows($result);
                // Free result set
                mysqli_free_result($result);
            }
            $QID = $rowcount + 5;

            //CreateCart
            $sql = "call addOrderQueue('$QID','$CID','2222222220')";
            if ($conn->query($sql) === false) {
                reject('{"success":false, "msg":"Insert error"}');
            }

            header('Location: /src/Homepage.php');
        }
    } else if (!empty($_POST["getShop"])) {

        //test_input
        $ShopName = $_POST["getShop"];

        //getShopID
        $sql = "SELECT SID FROM Shop WHERE Sname = '$ShopName'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            array_push($shop, $row);
        }
        $ShopID = $shop[0]["SID"];
        $menu = array();

        //get menu list
        $sqlmenu = "call getMenu('$ShopID')";
        $resultmenu = $conn->query($sqlmenu);

        while ($row = mysqli_fetch_array($resultmenu)) {
            array_push($menu, $row);
        }
    } else if (!empty($_POST["getMenu"])) {

        //test_input
        $menuName = $_POST["getMenu"];
        $ShopName = $_POST["getSName"];

        //getShopID
        $sql = "SELECT SID FROM Shop WHERE Sname = '$ShopName'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            array_push($shop, $row);
        }
        $ShopID = $shop[0]["SID"];

        //get menu info
        $sqlmenu = "call getFoodinfo('$ShopID','$menuName')";
        $resultmenu = $conn->query($sqlmenu);

        while ($row = mysqli_fetch_array($resultmenu)) {
            array_push($menuInfo, $row);
        }

        //get review
        // echo $ShopID.' '.$menuName;
        // $sqlreview = "call getReview('$ShopID','$menuName')";
        // $resultreview = $conn->query($sqlreview) or die($mysqli->error);

        // while ($row = mysqli_fetch_array($resultreview)) {
        //     array_push($review, $row);
        // }

    } else if (!empty($_POST["OK"])) {

        //test_input
        if (!empty($_POST["editFname"])) {
            $Fname = test_input($_POST["editFname"]);
            $next1 = false;
        }
        if (!empty($_POST["editLname"])) {
            $Lname = test_input($_POST["editLname"]);
            $next1 = false;
        }
        if (!empty($_POST["editTel"])) {
            $Tel = test_input($_POST["editTel"]);
            $next1 = false;
        }
        if (!empty($_POST["editReligion"])) {
            $Religion = test_input($_POST["editReligion"]);
            $next1 = false;
        }

        $sql = "SELECT * FROM Customer";
        if ($result = mysqli_query($conn, $sql)) {
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows($result);
            // Free result set
            mysqli_free_result($result);
        }
        $CID = $rowcount - 1;

        $sqlEdit = "UPDATE Customer SET Fname = '$Fname', Lname = '$Lname', Religion = '$Religion', Tel = '$Tel' WHERE CID = '$CID';";
        if ($conn->query($sqlEdit) === false) {
            reject('{"success":false, "msg":"Update error"}');
        } else {
            $next1 = true;
        }

        //Allergy
        if (!empty($_POST["editAllergy"])) {
            $Allergy = test_input($_POST["editAllergy"]);
            $next2 = false;
            $sqlAllergic = "INSERT INTO Allergic (CID,Allergic) VALUES ('$CID','$Allergy')";
            if ($conn->query($sqlAllergic) === false) {
                reject('{"success":false, "msg":"Insert Allergic error"}');
            } else {
                $next2 = true;
            }
        }

        if ($next1 && $next2) {
            header('Location: /src/Profile.php');
        }
    } else if (!empty($_POST["addCart"])) {

        //get menu
        $menuName = test_input($_POST["getMName"]);

        //get shop
        $ShopName = test_input($_POST["getSName"]);

        //get CID
        $sql = "SELECT * FROM Customer";
        if ($result = mysqli_query($conn, $sql)) {
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows($result);
            // Free result set
            mysqli_free_result($result);
        }
        $CID = $rowcount - 1;

        //get SID
        $sql = "SELECT SID FROM Shop WHERE Sname = '$ShopName'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            array_push($shop, $row);
        }
        $ShopID = $shop[0]["SID"];

        //get QID
        $sql = "SELECT * FROM OrderQueue WHERE CID = '$CID'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            array_push($queue, $row);
        }
        $QID = $queue[0]["QID"];
        $time = $queue[0]["OrderTimeStamp"];

        //gen OID
        $sql = "SELECT * FROM OrderItem";
        if ($result = mysqli_query($conn, $sql)) {
            // Return the number of rows in result set
            $rowcount = mysqli_num_rows($result);
            // Free result set
            mysqli_free_result($result);
        }
        $OID = $rowcount + 1;

        //addOrder
        $sql = "call addOrderItem('$QID','$time','$OID','$ShopID','$menuName')";
        if ($result = mysqli_query($conn, $sql)) {
            header('Location: /src/Shoplist.php');
        } else {
            reject('{"success":false, "msg":"Insert Error"}');
        }
    } else if (!empty($_POST["Next"])) {
        include 'getName.php';
        $tmp = array();

        global $namelist;
        $CID = $namelist[sizeof($namelist) - 1]["CID"];

        //get qid
        $sql = "SELECT QID FROM OrderQueue WHERE CID = '$CID'";
        $result = $conn->query($sql);

        while ($row = mysqli_fetch_array($result)) {
            array_push($tmp, $row);
        }

        $QID = $tmp[0]["QID"];
        $PickTime = $_POST["Hour"] . ':' . $_POST["Minute"].':00';

        //update pickup time
        $sql = "call ChangePickupTime ('$QID','$PickTime')";
        if ($result = mysqli_query($conn, $sql)) {
            header('Location: /src/Confirm.php');
        } else {
            reject('{"success":false, "msg":"Update Error"}');
        }
    } else if (!empty($_POST["Delete"])) {
        include 'getOrder.php';
        global $OrderDetail,$Order;
        $index = $_POST["Delete"];
        $OID = $Order[$index-1]["OID"];

        //update pickup time
        $sql = "call deleteOrderItem ($OID)";
        if ($result = mysqli_query($conn, $sql)) {
            header('Location: /src/Cart.php');
        } else {
            reject('{"success":false, "msg":"Update Error"}');
        }
    }
}
