<?php 
    require_once 'header.php';
    
?>

<style>
  <?php 
    include '../stylesheets/cff.css' 
  ?>
  <?php 
    require_once '../Stylesheets/reports_page.css';
  ?>

</style>

<?php
   require_once 'nav.php';
   require_once '../Models/DatabaseContext.php';
   require_once '../Models/Account.php';
   require_once '../Models/User.php';
?>

<?php

$db = DatabaseContext::dbConnect();

if (isset($_POST["register"])){

?>

<script>

window.onload = function () {

  var first_name  = document.getElementById("registrationform_firstname");
  var last_name   = document.getElementById("registrationform_lastname");
  var mos         = document.getElementById("registrationform_MOS");
  var rank        = document.getElementById("registrationform_Rank");
  var ssn         = document.getElementById("registrationform_SSN");
  var dod         = document.getElementById("registrationform_DOD");
  var blood_type  = document.getElementById("registrationform_BloodType");
  var dob         = document.getElementById("registrationform_DOB");
  var address     = document.getElementById("registrationform_Address");
  var username    = document.getElementById("registrationform_username");
  var password    = document.getElementById("registrationform_password");
  var confirmpassword = document.getElementById("registrationform_confirmpassword");

  var namepattern       = /^[A-Za-z0-9_]{3,16}$/;
  var rankpattern       = /^[A-Za-z]{1}[0-9]{1}$/;
  var mospattern        = /^[0-9]{2}[A-Za-z]{1}$/;
  var ssnpattern        = /^[0-9]{8}$/;
  var dod_idpattern     = /^[0-9]{8}$/;
  var blood_typepattern = /^[A-Z]{1,2}[+-]{1}$/;
  var usernamepattern   = /^[A-Za-z0-9_]{3,16}$/;
  var passwordpattern   = /^[A-Za-z0-9_]{3,16}$/;

  var errorcontainer = document.querySelector(".registrationform__errormessages");
  errorcontainer.style.display = "none";

  if(first_name.value == ""){
      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "First name cannot be empty";
      return false;

  } else if(!namepattern.test(first_name.value)){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "First name Invalid";
      return false;

  } else if(last_name.value == "") {

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Last name cannot be empty";
      return false;

  } else if(!namepattern.test(last_name.value)){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Last name Invalid";
      return false;

  } else if(mos.value == ""){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Mos cannot be empty";
      return false;

  } else if(!mospattern.test(mos.value)){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "MOS Invalid";
      return false;

  } else if(rank.value == ""){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Rank cannot be empty";
      return false;

  } else if(!rankpattern.test(rank.value)){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Rank Invalid";
      return false;

  } else if(ssn.value == ""){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "SSN cannot be empty";
      return false;

  } else if(!ssnpattern.test(ssn.value)){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "SSN Invalid";
      return false;

  } else if(dod.value == ""){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "DOD cannot be empty";
      return false;

  } else if(!dod_idpattern.test(dod.value)){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "DOD Invalid";
      return false;

  } else if(blood_type.value == ""){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Blood Type cannot be empty";
      return false;

  } else if(!blood_typepattern.test(blood_type.value)){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Blood Type Invalid";
      return false;

  } else if(dob.value == ""){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Date of Birth cannot be empty";
      return false;

  } else if(address.value == ""){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Address cannot be empty";
      return false;

  } else if(username.value == ""){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Username cannot be empty";
      return false;

  } else if(!usernamepattern.test(username.value)){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Username Invalid";
      return false;

  } else if(password.value == ""){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Password cannot be empty";
      return false;

  } else if(!passwordpattern.test(password.value)){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Password Invalid";
      return false;

  } else if(confirmpassword.value == ""){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Password has to be confirmed";
      return false;

  } else if(!passwordpattern.test(confirmpassword.value)){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Confirm Password Invalid";
      return false;

  } else if(password.value != confirmpassword.value){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "Password Mismatch";
      return false;

  }

  if(!namepattern.test(first_name.value)){

      errorcontainer.style.display = "block";
      errorcontainer.innerHTML = "First name Invalid";
      return false;

  }

}


</script>

<?php

$first_name       = htmlspecialchars($_POST['first_name']);
$last_name        = htmlspecialchars($_POST['last_name']);
$rank             = htmlspecialchars($_POST['rank']);
$mos              = htmlspecialchars($_POST['mos']);
$ssn              = htmlspecialchars($_POST['ssn']);
$dod_id           = htmlspecialchars($_POST['dod_id']);
$dob              = htmlspecialchars($_POST['dob']);
$blood_type       = htmlspecialchars($_POST['blood_type']);
$address          = htmlspecialchars($_POST['address']);
$username         = htmlspecialchars($_POST['username']);
$password         = htmlspecialchars($_POST['registrationform_password']);
$confirmpassword  = htmlspecialchars($_POST['registrationform_confirmpassword']);

$namepattern       = "/^[A-Za-z0-9_]{3,16}$/";
$rankpattern       = "/^[A-Za-z]{1}[0-9]{1}$/";
$mospattern        = "/^[0-9]{2}[A-Za-z]{1}$/";
$ssnpattern        = "/^[0-9]{8}$/";
$dod_idpattern     = "/^[0-9]{8}$/";
$blood_typepattern = "/^[A-Z]{1}[+-]{1}$/";

$usernamepattern = "/^[A-Za-z0-9_]{3,16}$/";
$passwordpattern = "/^[A-Za-z0-9_]{3,16}$/";

//Variable to check if credentials are Valid
$invalidcredentials = 0;

if($first_name == "") {

  $invalidcredentials = 1;

} else if(!preg_match($namepattern,$first_name)){
  
  $invalidcredentials = 1;

}
if($last_name == "") {

  $invalidcredentials = 1;

} else if(!preg_match($namepattern,$last_name)){
  
  $invalidcredentials = 1;

}
if($rank == "") {

  $invalidcredentials = 1;

} else if(!preg_match($rankpattern,$rank)){
  
  $invalidcredentials = 1;

}
if($mos == "") {

  $invalidcredentials = 1;

} else if(!preg_match($mospattern,$mos)){
  
  $invalidcredentials = 1;

}
if($ssn == "") {

  $invalidcredentials = 1;

} else if(!preg_match($ssnpattern,$ssn)){
  
  $invalidcredentials = 1;

}
if($dod_id == "") {

  $invalidcredentials = 1;

} else if(!preg_match($dod_idpattern,$dod_id)){
  
  $invalidcredentials = 1;

}
if($dob == "") {

  $invalidcredentials = 1;

} 
if($blood_type == "") {

  $invalidcredentials = 1;

} else if(!preg_match($blood_typepattern,$blood_type)){
  
  $invalidcredentials = 1;

}
if($address == "") {

  $invalidcredentials = 1;

}
if($username == "") {

  $invalidcredentials = 1;

} else if(!preg_match($usernamepattern,$username)){
  
  $invalidcredentials = 1;

}
if($password == "") {

  $invalidcredentials = 1;

} else if(!preg_match($passwordpattern,$password)){
  
  $invalidcredentials = 1;

}
if($confirmpassword == "") {

  $invalidcredentials = 1;

} else if(!preg_match($passwordpattern,$confirmpassword)){
  
  $invalidcredentials = 1;

}

  if($invalidcredentials == 0 ) {

    $PersonalDto = new User(
                            $mos,
                            $rank,
                            $first_name,
                            $last_name,
                            $ssn,
                            $dod_id,
                            $dob,
                            $blood_type,
                            $address
                          );
    $response = $PersonalDto->addUser($db);
    if($response) {

      $maxId = $PersonalDto->getIdofLastInsertedUser($db);
      $AccountDto = new Account(
                                null,
                                $maxId[0]->id,
                                $username,
                                hash('md5',$confirmpassword),
                                'user'
                                );
      
      $AccValue = $AccountDto->addAccount($db);
      if($AccValue) {

        header("Location: Login.php");

      }
    }
  }
}


?>

<div class="container">
          <h2 class="report-title">New User Registration</h2>
          <form method="POST" name="registrationform">
            <div class="form-row">
                <div class="form-group col-md-6">
                      <label class="label label-default">First Name:</label>
                      <input type="text" name="first_name" id="registrationform_firstname" class="form-control" placeholder="First Name"
                      value="<?php echo isset($_POST['first_name'])?$_POST['first_name']:''; ?>">
                      
                </div>
                <div class="form-group col-md-6">
                      <label class="label label-default">Last Name:</label>
                      <input type="text" id="registrationform_lastname" name="last_name" class="form-control" placeholder="Last Name"
                      value="<?php echo isset($_POST['last_name'])?$_POST['last_name']:''; ?>">
                      
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="label label-default" for="registrationform_MOS">MOS:</label>
                    <input type="text" class="form-control" id="registrationform_MOS" placeholder="MOS" name="mos"
                    value="<?php echo isset($_POST['mos'])?$_POST['mos']:''; ?>">
                    
                </div>
                <div class="form-group col-md-4">
                    <label class="label label-default" for="registrationform_Rank">Rank:</label>
                    <input type="text" class="form-control" id="registrationform_Rank" name="rank" placeholder="Rank"
                    value="<?php echo isset($_POST['rank'])?$_POST['rank']:''; ?>">
                    
                </div>
                <div class="form-group col-md-4">
                    <label class="label label-default" for="registrationform_SSN">SSN:</label>
                    <input type="text" class="form-control" id="registrationform_SSN" name="ssn" placeholder="SSN" 
                    value="<?php echo isset($_POST['ssn'])?$_POST['ssn']:''; ?>">
                    
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="label label-default" for="registrationform_DOD">DOD:</label>
                    <input type="text" class="form-control" id="registrationform_DOD" name="dod_id" placeholder="DOD"
                    value="<?php echo isset($_POST['dod_id'])?$_POST['dod_id']:''; ?>">
                    
                </div>
                <div class="form-group col-md-4">
                    <label class="label label-default" for="registrationform_BloodType">Blood Group:</label>
                    <input type="text" class="form-control" id="registrationform_BloodType" name="blood_type" placeholder="Blood Group"
                    value="<?php echo isset($_POST['blood_type'])?$_POST['blood_type']:''; ?>">
                    
                </div>
                <div class="form-group col-md-4">
                    <label class="label label-default" for="registrationform_DOB">Date of Birth:</label>
                    <input type="date" class="form-control" id="registrationform_DOB" name="dob" placeholder="Date of Birth"
                    value="<?php echo isset($_POST['dob'])?$_POST['dob']:''; ?>">
                    
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="label label-default" for="registrationform_Address">Address:</label>
                    <input type="text" class="form-control" id="registrationform_Address" name="address" placeholder="Address"
                    value="<?php echo isset($_POST['address'])?$_POST['address']:''; ?>">
                   
                </div>
                <div class="form-group col-md-6">
                    <label class="label label-default" for="registrationform_username">Username:</label>
                    <input type="text" class="form-control" id="registrationform_username" name="username" placeholder="Username"
                    value="<?php echo isset($_POST['username'])?$_POST['username']:''; ?>">
                    
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="label label-default" for="registrationform_password">Password:</label>
                    <input type="password" id="registrationform_password" name="registrationform_password" class="form-control" placeholder="Password"
                    value="<?php echo isset($_POST['registrationform_password'])?$_POST['registrationform_password']:''; ?>">
                    
                </div>
                <div class="form-group col-md-6">
                  <label class="label label-default" for="registrationform_confirmpassword">Re-type Password:</label>
                  <input type="password" name="registrationform_confirmpassword" id="registrationform_confirmpassword" class="form-control" placeholder="Retype Password"
                  value="<?php echo isset($_POST['registrationform_confirmpassword'])?$_POST['registrationform_confirmpassword']:''; ?>">
                  
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                  <div class="registrationform__errormessages"><?php isset($errormessage)?$errormessage:''; ?></div>
                  <input type="submit" value="Register" name="register" class="btn btn-success col-md-12">        
              </div>
            </div>
          </form>
  </div>

<?php
 
   require_once 'footer.php'; 

?>
