<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <title>MenuItem</title>
    <style>
        #btnr {
            width: 130px;
            height: 70px;
            margin-left: 20px;
            text-align: center;
        }
        .well {
            background: rgb(207, 207, 207);
            text-align: center;
            width: 30vw;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <!-- logo -->
        <a class="navbar-brand" href="/src/Homepage.php">iCanQ</a>

        <!-- Dropmenu -->
        <div class="dropdown ml-md-auto">
            <a class="btn btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <?php include '/../backends/getName.php';?>
            </a>

            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/src/Profile.php">Profile</a>
                <a class="dropdown-item" href="/src/html/CreditCard.html">Credit Card</a>
                <a class="dropdown-item" href="/src/html/History.html">History</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/src/html/Webpage.html">Logout</a>
            </div>
        </div>

        <!-- Cart -->
        <div class="dropdown">
            <a class="btn btn-secondary" href="#" role="button" style=" margin-left: 10px">
                <img src="/../../icon/cart.svg" style="width: 20px;height: 20px;">
            </a>
        </div>
    </nav>
</head>

<body>
<?php
require '/../backends/get_data.php';
global $menuInfo, $ShopName, $review;
print_r($review);
//open form
echo '<form action="./Menu.php" method="POST">';
echo '<div class="row d-flex justify-content-start" style="margin-top: 10vh">';
echo '<h1 class="display-1" style="margin-left: 5vw">Order | ';
echo '<input class="display-1" style="border-style: none" type="text" name="getSName" readonly value=' . $ShopName . '>';
echo '<br>| ';
echo '<input class="display-3" style="border-style: none" type="text" name="getMName" readonly value=' . $menuInfo[0]["Menu"] . '>';
echo '</h1>';
echo '</div>';
echo '<div class="row" style="margin-left: 5vw; margin-top: 20px">';
for ($i = 0; $i < $menuInfo[0]["Rating"]; $i++) {
    echo '<img src="/icon/star.svg" width="30" height="30" alt="">';
}
echo '</div>';
echo '<div class="row offset-md-1" style="margin-top: 5vh;">
        <div class="col">
            <div class="row" style="margin-top : 1vh">
                <p class="h1">ราคา : ' . $menuInfo[0]["Price"] . ' บาท</p>
            </div>
            <div class="row" style="margin-top : 1vh">
                <p class="h1">เครื่องเคียง :</p>
                <div class="btn-group btn-group-lg" role="group" aria-label="..." style="margin-left : 1vw">
                    <button type="button" class="btn btn-secondary">+ ADD</button>
                </div>
            </div>
            <!--<div class="row" style="margin-top : 1vh">
                <p class="h1">จำนวน :</p>
                <div class="btn-group btn-group-lg " role="group" aria-label="..." style="margin-left : 1vw">
                    <button type="button" onclick="decrease('.$menuInfo[0]["Price"].')" class="btn btn-secondary">-</button>
                    <div id="display" style="margin: 2vh">0</div>
                    <button type="button" onclick="add('.$menuInfo[0]["Price"].')" class="btn btn-secondary">+</button>
                </div>
            </div>
            <div class="row" style="margin-top : 1vh">
                <p class="h1">ราคารวม : </p>
                <div id="display2" style="margin: 2vh">0</div>
                <p class="h1">บาท</p>
            </div>--> 
            <div class="row">
                <input type="submit" name="addCart" value="ADD TO CART" class="btn btn-success">
            </div>
        </div>
        <div class="col">
            <p class="display-4 h1">REVIEW</p>
            <figure class="well">
                <pre>';
                    for ($i = 0; $i < 2; $i++) {
                        echo '<div id="areview">NAME : RATE = 5<br>bla bla bla</div>';
                    }
                echo '</pre>
            </figure>
        </div>
    </div>';
echo '</form>';
?>

    <!-- Optional JavaScript -->
    <script type="text/javascript">
        var capnum = 0;
        function add(prize){
            capnum++;
            document.getElementById('display').innerHTML = capnum;
            document.getElementById('display2').innerHTML = capnum*prize;
        }
        function decrease(prize){
            if(capnum>0) {
                capnum--;
                document.getElementById('display').innerHTML = capnum;
                document.getElementById('display2').innerHTML = capnum*prize;
            }
        }
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>