<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <title>Cart</title>
    <style>
        #btnr {
            width: 130px;
            height: 70px;
            margin-left: 20px;
            text-align: center;
        }

        .custom-select {
            width: 20%;
        }

        h1 {
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        .tbl-header {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .tbl-content {
            height: 200px;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        th {
            padding: 20px 15px;
            text-align: center;
            font-weight: 500;
            font-size: 17px;
            color: #fff;
            text-transform: uppercase;
        }

        td {
            padding: 12px;

            text-align: center;
            vertical-align: middle;
            font-weight: 300;
            font-size: 17px;
            color: #fff;
            border-bottom: solid 1px rgba(255, 255, 255, 0.1);
        }

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
        section {
            background: rgb(180, 180, 180);
            font-family: 'Roboto', sans-serif;
            width: 50%;
            margin: 50px 0 0 200px;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <!-- logo -->
        <a class="navbar-brand" href="/src/Homepage.php">iCanQ</a>

        <!-- Dropmenu -->
        <div class="dropdown ml-md-auto">
            <a class="btn btn-secondary dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <?php include '/../backends/getName.php'; echo $CName;?>
            </a>

            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/src/Profile.php">Profile</a>
                <a class="dropdown-item" href="/src/html/#">Credit Card</a>
                <a class="dropdown-item" href="/src/html/#">History</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/src/html/Webpage.html">Logout</a>
            </div>
        </div>

        <!-- Cart -->
        <div class="dropdown">
            <a class="btn btn-secondary" href="#" role="button" style=" margin-left: 10px">
                <img src="/icon/cart.svg" style="width: 20px;height: 20px;">
            </a>
        </div>
    </nav>
</head>

<body>
    <?php 
        include '/../backends/getOrder.php';
        global $OrderDetail;
        $total = 0;
    ?>
    <div class="row  offset-md-1">
        <a class="display-3"><?php include '/../backends/getName.php'; echo $CName;?> | Confirm Your Order</a>
    </div>
    <section style="width :70%;">
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>รายการอาหาร</th>
                        <th>ชื่อร้านค้า</th>
                        <th>ราคา</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content" style="height :50vh;">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <?php 
                    for($i = 1; $i <= sizeof($OrderDetail); $i++){
                        echo '<tr>';
                            echo '<td>'.$OrderDetail[$i-1][0].'</td>';
                            echo '<td>'.$OrderDetail[$i-1][1].'</td>';
                            echo '<td>'.$OrderDetail[$i-1][2].' บาท </td>';
                        echo '</tr>';
                        $total = $total + $OrderDetail[$i-1][2];
                    }
                ?>
                </tbody>
            </table>
        </div>
    </section>
    <div id="buy" style="padding-left :66vw; padding-top :2vh">
        <div class="row well" style="width :18vw;">
            <div style="font-size : 20px">Total Cost = <?php echo $total; ?></div>
            <a type="button" class="btn btn-success col offset-md-1" href="./Homepage.php" > Confirm </a>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>