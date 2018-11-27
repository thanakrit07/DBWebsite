<?php require '/../backends/get_data.php';?>

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
      <a class="navbar-brand" href="./Homepage.php">iCanQ</a>

      <!-- Dropmenu -->
      <div class="dropdown ml-md-auto">
        <a class="btn btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
        <?php include '/../backends/getName.php';?>
        </a>

        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">Profile</a>
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
<div id = "profile">
    <div class="container" style="margin-top: 20vh ;margin-left: 30vw; margin-right: 20vw;">
        <div class="row">
            <img src="/../icon/profile.svg" class="rounded d-block" alt="..." style="width: 200px; height: 200px; background-color: #000000">
            <?php include '/../backends/getProfile.php';?>
        </div>
        <a id="btn-edit" class="btn btn-primary" type="submit" href="./editProfile.php" style="margin-top: 5vh;font-size: 20px">Edit</a>
    </div>
</div>

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
