<?php

require 'connect.php';
global $conn;
$namelist = array();

$sql = "SELECT * FROM Customer";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    array_push($namelist, $row);
}

$sqlAllergy = "SELECT Allergic FROM Allergic WHERE CID = ".$namelist[sizeof($namelist)-1]["CID"];
$allergy = array();
$resulAllergy = mysqli_query($conn, $sqlAllergy);
while ($row = mysqli_fetch_array($result)) {
    array_push($allergy, $row);
}
        echo '<div class="row">';
            echo '<img src="/../icon/profile.svg" class="rounded d-block" alt="..." style="width: 200px; height: 200px; background-color: #000000">';
            echo '<form style="margin-top: 3vh;margin-left: 3vw; width : 40vw" action="/backends/get_data.php" method="POST">';
                echo '<div class="form-row">';
                    echo '<label for="name" class="col-sm-2 col-form-label">Name</label>';
                    echo '<div class="col-sm-4 offset-sm-1">';
                        echo '<input type="text" name="editFname" value='.$namelist[sizeof($namelist)-1]["Fname"].'>';
                    echo '</div>';

                    echo '<div class="col-sm-4 offset-sm-1">';
                        echo '<input type="text" name="editLname" value='.$namelist[sizeof($namelist)-1]["Lname"].'>';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-row">';
                    echo '<label for="Telephone" class="col-sm-2 col-form-label">Telephone</label>';
                    echo '<div class="col-sm-5 offset-sm-1">';
                        echo '<input type="text" name="editTel" value='.$namelist[sizeof($namelist)-1]["Tel"].'>';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-row">';
                    echo '<label for="Religion" class="col-sm-2 col-form-label">Religion</label>';
                    echo '<div class="col-sm-5 offset-sm-1">';
                        echo '<input type="text" name="editReligion" value='.$namelist[sizeof($namelist)-1]["Religion"].'>';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-row">';
                    echo '<label for="Allergy" class="col-sm-2 col-form-label">ADD Allergy</label>';
                    echo '<div class="col-sm-5 offset-sm-1">';
                        echo '<input type="text" name="editAllergy">';
                    echo '</div>';
                echo '</div>';
                echo '<input type="submit" name="OK" value="OK" class="btn btn-success" style="margin-top: 5vh">';
            echo '</form>';
            echo '</div>';
?>