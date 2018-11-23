<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">

  <title>Registration</title>
</head>

<body>

  <?php
// define variables and set to empty values
$Fname = $Lname = $tel = $agree = $submit = "";
$FnameErr = $LnameErr = $telErr = $agreeErr = "";
$next = (bool)false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Fname"])) {
      $FnameErr = "First Name is required";
    } else {
      $Fname = test_input($_POST["Fname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$Fname)) {
        $FnameErr = "Only letters and white space allowed"; 
      }
    }
    if (empty($_POST["Lname"])) {
      $LnameErr = "Last Name is required";
    } else {
      $Lname = test_input($_POST["Lname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$Lname)) {
        $LnameErr = "Only letters and white space allowed"; 
      }
    }
    if (empty($_POST["tel"])) {
      $telErr = "Telephone number is required";
    } else {
      $tel = test_input($_POST["tel"]);
    }

    if (empty($_POST["agree"])) {
      $agreeErr = "You must agree before submitting.";
    } else {
      $agree = test_input($_POST["agree"]);
    }
    $submit = test_input($_POST["submit"]);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
  <div class="container-fluid">
    <img src="/../icon/profile.svg" class="rounded mx-auto d-block" alt="..." style="width: 200px; height: 200px; margin-top: 20vh ; margin-bottom: 2vh;background: black">
    <form class="needs-validation offset-md-3" novalidate method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-row ">
        <div class="col-md-4 mb-3">
          <label for="validationCustom01">First name *</label>
          <input type="text" name="Fname" value="<?php echo $Fname;?>" class="form-control" id="validationCustom01" placeholder="First name" required>
          <span class="error" style="color: #e13c3c"><?php echo $FnameErr;?></span>
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationCustom02">Last name *</label>
          <input type="text" name="Lname" value="<?php echo $Lname;?>" class="form-control" id="validationCustom02" placeholder="Last name" required>
          <span class="error" style="color: #e13c3c"><?php echo $LnameErr;?></span>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="validationCustomUsername">Telephone *</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend">Tel</span>
            </div>
            <input type="text" name="tel" value="<?php echo $tel;?>" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
          </div>
          <span class="error" style="color: #e13c3c"><?php echo $telErr;?></span>
        </div>
      </div> 
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <div class="form-group">
            <div class="form-check">
              <input type="checkbox" name="agree" <?php if (isset($agree) && $agree=="Agree") echo "checked";?> value="Agree" 
              class="form-check-input" id="invalidCheck" required> Agree to terms and conditions
            </div>
          </div>
          <span class="error" style="color: #e13c3c"><?php echo $agreeErr;?></span>
        </div>
      </div>

      <input type="submit" name="submit" value="Submit" class="btn btn-primary" style="margin-bottom: 5vh">
    </form>
  </div>
  
  <?php 
    $next = (bool) !empty($_POST["submit"]) && !empty($_POST["agree"]) && !empty($_POST["tel"]) && !empty($_POST["Lname"]) && !empty($_POST["Fname"]);
  ?>
  <?php if($next) header('Location: /../Profile.html');?>
  <!-- ?php if($next) include("/../Profile.html");?> -->

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