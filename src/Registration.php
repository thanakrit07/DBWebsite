<?php
// define variables and set to empty values
$Fname = $Lname = $tel = $agree = $submit = "";
$FnameErr = $LnameErr = $telErr = $agreeErr = "";
$next = $corr = (bool)false;

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
      // check if tel are in correct form
      if (!preg_match("/^0[0-9]{9}$/",$tel)) {
        $telErr = "Please fill in form of 0812345678"; 
      }else $corr = true;
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
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="validationCustom01">First name <span class="require">*</span></label>
          <!-- <div class="col-sm-3 title">First name *<span class="require">*</span></div> -->
          <input type="text" name="Fname" value="<?php echo $Fname;?>" class="form-control" id="validationCustom01" placeholder="First name" required>
          <span class="error" style="color: #e13c3c"><?php echo $FnameErr;?></span>
        </div>

        <div class="col-md-4 mb-3">
        <label for="validationCustom01">Last name <span class="require">*</span></label>
          <input type="text" name="Lname" value="<?php echo $Lname;?>" class="form-control" id="validationCustom02" placeholder="Last name" required>
          <span class="error" style="color: #e13c3c"><?php echo $LnameErr;?></span>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="validationCustom01">Telephone <span class="require">*</span></label>
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
          <div class="form-group mb-1">
            <div class="form-check" style="padding-left: 0px">
              <input type="checkbox" name="agree" <?php if (isset($agree) && $agree=="Agree") echo "checked";?> value="Agree" 
              class="form-check-input" id="invalidCheck" required>
              <span style="padding-left: 20px">Agree to terms and conditions</span>
            </div>
          </div>
          <span class="error" style="color: #e13c3c"><?php echo $agreeErr;?></span>
        </div>
      </div>

      <input type="submit" name="submit" value="Submit" class="btn btn-primary submit" style="margin-bottom: 5vh">
    </form>
  </div>


  <?php 
  $next = (bool) !empty($_POST["submit"]) && !empty($_POST["agree"]) && !empty($_POST["tel"]) && (bool)$corr && !empty($_POST["Lname"]) && !empty($_POST["Fname"]);
  ?> 
  <?php 
    if($next) {
      include '/../backends/register.php';
    }
  ?>