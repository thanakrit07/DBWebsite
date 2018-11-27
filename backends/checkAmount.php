<?php
require 'connect.php';
global $conn;

$amount = 0;

function getCount()
{
    return $count;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["increase"])) {
        $amount++;
    }else if (!empty($_POST["decrease"])) {
        if($amount > 0) $amount--;
        else $amount = 0;
    }
}
