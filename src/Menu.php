<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <title>IcanQ</title>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <!-- logo -->
      <a class="navbar-brand" href="/src/Homepage.php">iCanQ</a>

      <!-- Dropmenu -->
      <div class="dropdown ml-md-auto">
        <a class="btn btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
        <?php include '/../backends/getName.php'; echo $CName;?>
        </a>

        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="/src/Profile.php">Profile</a>
            <a class="dropdown-item" href="#">Credit Card</a>
            <a class="dropdown-item" href="#">History</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/src/html/Webpage.html">Logout</a>
        </div>
      </div>

      <!-- Cart -->
      <div class="dropdown">
        <a class="btn btn-secondary" href="/src/Cart.php" role="button" style=" margin-left: 10px">
            <img src="/../../icon/cart.svg" style="width: 20px;height: 20px;">
        </a>
      </div>
    </nav>
</head>

<body>
<?php 
    require '/../backends/get_data.php';
    global $menu,$ShopName;

echo '<form action="./MenuItem.php" method="POST">';
    echo '<div class="row d-flex justify-content-start" style="margin-top: 10vh">';
        echo '<h1 class="display-1" style="margin-left: 5vw">Order | ';
        echo '<input class="display-1" style="border-style: none" type="text" name="getSName" readonly value='.$ShopName.'>';
        echo '</h1>';
    echo '</div>
    <div class="row justify-content-center" style="width: 80vw; margin-top :5vh;">
        <span class="col-md-1"></span>
        <h2 class="display-4 h2 col-md-3">Menu</h2>
        <h2 class="display-4 h2 col-md-4">Rating</h2>
    </div>';
echo '<div class="offset-md-1" style="margin-top: 5vh; width: 50vw;">';
for ($i = 1; $i <= sizeof($menu); $i++) {
    echo '<div class="row justify-content-start">';
    if($menu[$i - 1]["ShopRec"]==1){
        echo '<span class="col-ms-2">';
        echo '<img src="/../../icon/star.svg" class="img-fluid" alt="Responsive image" style="height: 5vh;">';
        echo '</span>';
        echo '<span style="margin-left :2vw;"></span>';
    }else{
        echo '<span class="col-ms-2 offset-md-1"></span>';
    }
    //echo '<span class="col-ms-2 offset-md-1"></span>';
    echo '<input type="submit" name="getMenu" value='.$menu[$i - 1]["Menu"].' class="shadow-sm p-2 mb-5 rounded col-md-6" style="font-size:large; text-align: center; background :#ffffff">';
    // echo '<div class="shadow-sm p-2 mb-5 rounded col-md-6" style="font-size:large; text-align: center">';
    // echo '<pre><strong>' . $i . '. ' . $menu[$i - 1]["Menu"] . '</strong></pre>';
    // echo '</div>';
    echo '<p class="shadow-sm p-2 mb-5 rounded col-ms-2 offset-md-2">';
    echo $menu[$i - 1]["Rating"];
    echo '</p>';
    echo '</div>';
}
echo '</div>';
echo '</form>';
?>

  <!-- Optional JavaScript -->
  <!-- <script src="backends/index.js"></script> -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>
</html>
