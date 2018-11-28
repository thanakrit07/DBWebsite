<?php
require 'connect.php';
include 'getName.php';

global $conn,$namelist;
$Order = $tmp = $OrderDetail = array();
$CID = $namelist[sizeof($namelist)-1]["CID"];

//get qid
$sql = "SELECT QID FROM OrderQueue WHERE CID = '$CID'";
$result = $conn->query($sql);

while ($row = mysqli_fetch_array($result)) {
    array_push($tmp, $row);
}

$QID = $tmp[0]["QID"];

//get Order
$sql = "SELECT SID,Menu,OID FROM OrderItem WHERE QID = '$QID'";
$result = $conn->query($sql);

while ($row = mysqli_fetch_array($result)) {
    array_push($Order, $row);
}

//get OrderDetail
for ($i = 0; $i < sizeof($Order) ; $i++){
    $SID_tmp = $Order[$i]["SID"];
    $Menu_tmp = $Order[$i]["Menu"];
    $tmp = array();
    $sqlname = "SELECT SName FROM Shop WHERE SID = '$SID_tmp'";
    $sqlprice = "SELECT Price FROM Foodlist WHERE Menu = '$Menu_tmp' AND SID = '$SID_tmp'";
    
    //get Name
    $resultname = $conn->query($sqlname);
    $rowname = mysqli_fetch_array($resultname);

    //get Price
    $resultprice = $conn->query($sqlprice);
    $rowprice = mysqli_fetch_array($resultprice);
    array_push($tmp, $Menu_tmp,$rowname["SName"],$rowprice["Price"]);
    array_push($OrderDetail,$tmp);
}
?>
