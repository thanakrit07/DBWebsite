<?php require '/../backends/get_data.php';?>
<?php include '/../backends/getName.php';?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <title>home</title>
    <style>
        .container-fluid {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .objCenter {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .webBody {
            background: url(/../../bg/Home2.jpg);
            background-repeat: no-repeat;
            background-size: 115vw;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            background-position-x : -10vw;
        }
    </style>

    <div class="row justify-content-end">
        <div class="dropdown ml-md-auto" style="margin: 10px">
            <a class="btn btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <?php echo $CName;?>
            </a>

            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/src/Profile.php">Profile</a>
                <a class="dropdown-item" href="#">Credit Card</a>
                <a class="dropdown-item" href="#">History</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./html/Webpage.html">Logout</a>
            </div>
        </div>
    </div>

</head>

<body class="container-fluid webBody">
    <div class="row justify-content-center" style="margin : 5vh;">
        <img src="/../../icon/icanq_logo.svg" class="img-fluid" alt="Responsive image" style="height: 40vh">
    </div>
    <div class="row justify-content-between">

        <div class="col"  style="margin-left: 22vw;">
            <div class="row justify-content-start">
                <H1 style="color:whitesmoke">I CAN QUEUE.</H1>
            </div>
            <div class="row justify-content-start">
                <H1 style="color:whitesmoke">YOU CAN QUEUE.</H1>
            </div>
            <div class="row justify-content-start">
                <H1 style="color:whitesmoke">EVERYONE CAN QUEUE</H1>
            </div>
            <div class="row justify-content-start">
                <H1 style="color:whitesmoke">WITH</H1>
                <H1 style="color: #ecbe00; margin-left: 10px"><strong>iCanQ</strong></H1>
            </div>
        </div>

        <div class="col">
            <div class="row justify-content-start">
                <div class="column">

                    <div class="row justify-content-center">
                        <span>
                            <a class="column btn btn-dark border" href="./Shoplist.php" style="color:#ffffff">
                                <img src="/../../icon/choices.svg" class="img-fluid" alt="Responsive image" style="height: 10vh; margin: 3vh 3vh 0vh 3vh">
                                <div class="row justify-content-center"><strong>Order Now</strong></div>
                            </a>
                        </span>

                        <span>
                            <a class="column btn btn-dark border" href="./Cart.php" style="color:#ffffff">
                                <img src="/../../icon/cart.svg" class="img-fluid" alt="Responsive image" style="height: 10vh; margin: 3vh 3vh 0vh 3vh">
                                <div class="row justify-content-center"><strong>View Order</strong></div>
                            </a>
                        </span>
                    </div>

                    <div class="row justify-content-center">
                        <span>
                            <a class="column btn btn-dark border" href="#" style="color:#ffffff">
                                <img src="/../../icon/history-2.svg" class="img-fluid" alt="Responsive image" style="height: 10vh; margin: 3vh 3vh 0vh 3vh">
                                <div class="row justify-content-center"><strong>History</strong></div>
                            </a>
                        </span>

                        <span>
                            <a class="column btn btn-dark border" href="./Profile.php" style="color:#ffffff">
                                <img src="/../../icon/profile.svg" class="img-fluid" alt="Responsive image" style="height: 10vh; margin: 3vh 3vh 0vh 3vh">
                                <div class="row justify-content-center"><strong>View Profile</strong></div>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>