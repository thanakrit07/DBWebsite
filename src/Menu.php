<?php
require '/../backends/connect.php';
global $conn;
// $menuHead = array();
$menu = array();

//get menu list
$sql = "call getMenu(2000000000)";
$result = $conn->query($sql);

// while ($property = mysqli_fetch_field($result)) {
//     echo '<td>' . $property->name . '</td>'; //get field name for header
//     array_push($menuHead, $property->name); //save those to array
// }

while ($row = mysqli_fetch_array($result)) {
    array_push($menu, $row);
}
echo '<div class="offset-md-4" style="margin-top: 5vh; width: 50vw;">';
for ($i = 1; $i <= sizeof($menu); $i++) {
    echo '<div class="row">';
        echo '<div class="shadow-sm p-2 mb-5 rounded col-md-6" style="font-size:large; text-align: center">';
            echo '<pre><strong>'. $i .'. '. $menu[$i-1]["Menu"]. '</strong></pre>';
        echo '</div>';
        echo '<p class="shadow-sm p-2 mb-5 rounded col-ms-2 offset-md-2">';
            echo $menu[$i-1]["Rating"];
        echo '</p>';
    echo '</div>';
}
echo '</div>';
?>