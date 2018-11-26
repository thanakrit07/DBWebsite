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
            echo '<form style="margin-top: 3vh;margin-left: 3vw; width : 40vw">';
                echo '<div class="form-row">';
                    echo '<label for="name" class="col-sm-2 col-form-label">Name</label>';
                    echo '<div class="col-sm-4 offset-sm-1">';
                        echo '<div type="text" readonly class="form-control-plaintext" id="Name">'.$namelist[sizeof($namelist)-1]["Fname"]. "  " .$namelist[sizeof($namelist)-1]["Lname"].'</div>';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-row">';
                    echo '<label for="Telephone" class="col-sm-2 col-form-label">Telephone</label>';
                    echo '<div class="col-sm-5 offset-sm-1">';
                        echo '<div type="text" readonly class="form-control-plaintext" id="Telephone">'.$namelist[sizeof($namelist)-1]["Tel"].'</div>';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-row">';
                    echo '<label for="Religion" class="col-sm-2 col-form-label">Religion</label>';
                    echo '<div class="col-sm-5 offset-sm-1">';
                        echo '<div type="text" readonly class="form-control-plaintext" id="Religion">'.$namelist[sizeof($namelist)-1]["Religion"].'</div>';
                    echo '</div>';
                echo '</div>';

                echo '<div class="form-row">';
                    echo '<label for="Allergy" class="col-sm-2 col-form-label">Allergy</label>';
                    echo '<div class="col-sm-5 offset-sm-1">';
                        for ($i = 0; $i < sizeof($allergy); $i++) {
                            echo '<div type="text" readonly class="form-control-plaintext" id="Allergy">'.$allergy[i].'</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</form>';
?>