<?php

global $page;
$Firstname = $Surname = $Tel = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["page"])) {
        $page = test_input($_POST["page"]);
    } else {
        $page = 0;
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function change_page($goto)
{
    echo 'go to '.$goto;
    $page = $goto;
    
}

function getInfo($f, $s, $t)
{
    $Firstname = $f;
    $Surname = $s;
    $Tel = $t;
    echo '<br>' . $Firstname . ' ' . $Surname . ' ' . $Tel;
}
?>
