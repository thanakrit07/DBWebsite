<?php  
    require('./../backends/connect.php');
    global $conn;
    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
?>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">iCanQ</a>
        <div class="dropdown ml-md-auto">
            <a class="btn btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Name
            </a>

            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="Registration.html">Profile</a>
                <a class="dropdown-item" href="#">Credit Card</a>
                <a class="dropdown-item" href="#">History</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Webpage.html">Logout</a>
            </div>
        </div>
        <div class="dropdown">
            <a class="btn btn-secondary" href="#" role="button" style=" margin-left: 10px">
                <img src="./icon/cart.svg" style="width: 20px;height: 20px;">
            </a>
        </div>
    </nav>

    <div class="row d-flex justify-content-start" style="margin-top: 10vh">
        <h1 class="display-1" style="margin-left: 5vw">Shop Name :</h1>
        <p class="display-4 offset-md-1" style="margin-top: 5vh">PPAP</p>
    </div>
    <div class="row">
        <div class="display-4 h1 col-md-4" style="margin-left: 4vw">Menu</div>
        <h2 class="display-4 h2 col-md-4">รายการอาหาร</h2>
        <h3 class="display-4 h2 col-md-3">Rating</h3>
    </div>
    <div class="offset-md-4" style="margin-top: 5vh">
        <div class="row">
            <div class="shadow-sm p-2 mb-5 rounded col-md-6" style="font-size:large; text-align: center">
                <pre><strong>1. XXXXXXXXX</strong></pre>
            </div>
            <p class="shadow-sm p-2 mb-5 rounded col-ms-2 offset-md-2">4.5</p>
        </div>

        <div class="row">
            <div class="shadow-sm p-2 mb-5 rounded col-md-6" style="font-size:large; text-align: center">
                <pre><strong>2. XXXXXXXXX</strong></pre>
            </div>
            <p class="shadow-sm p-2 mb-5 rounded col-ms-2 offset-md-2">5.0</p>
        </div>
    </div>
    </div>