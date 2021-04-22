<?php 
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    require_once "../Models/User.php";
    require_once "../Models/EmergencyContact.php";
    require_once "../Models/DatabaseContext.php";
    require_once "../Library/form-functions.php";

    $dbcon = DatabaseContext::dbConnect();
    $ec = new EmergencyContact();
    $user = new User();
    $userIds = $user->getAllUsers($dbcon);

    $intialErr = $fNameErr = $lNameErr = $phoneErr = $emailErr = null;
    $initial = $first_name = $last_name = $phone = $email = "";

    function validateFields($initial, $first_name, $last_name, $phone, $email){
        global $intialErr, $fNameErr, $lNameErr, $phoneErr, $emailErr;
        $validationError = false;

        if(empty($initial)){
            $intialErr = "Enter a valid Initial";
            $validationError = true;
        }
        if(empty($first_name)){
            $fNameErr = "Enter a valid First Name";
            $validationError = true;
        }
        if(empty($last_name)){
            $lNameErr = "Enter a valid Last Name";
            $validationError = true;
        }
        if(empty($phone) || !(preg_match("/^[0-9]{10}$/", $phone))){
            $phoneErr = "Enter a valid Phone number";
            $validationError = true;
        }
        if(empty($email)|| !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Enter a valid Email";
            $validationError = true;
        }
        return $validationError;
    }
    
    if (isset($_POST['ec_create'])){
        $id = $_POST['ec_id'];
        $initial = $_POST['ec_initial'];
        $first_name = $_POST['ec_fName'];
        $last_name = $_POST['ec_lName'];
        $phone = $_POST['ec_phone'];
        $email = $_POST['ec_email'];
    
        $validationError = validateFields($initial, $first_name, $last_name, $phone, $email);

        if(!$validationError){
            $count = $ec->addEmergencyContactByID($dbcon, $id, $initial, $first_name, $last_name, $phone, $email);
            if($count){
               header('Location: emergency_contact.php');
            } else {
                echo "<p class='not-found'>Problem Creating Emergency Contact<p>";
            }
        }
    }

?>

<div class="container">
    <h2 class="report-title">Create Emergency Contact</h2>
    <form method="POST" class="center-form">
        <div class="form-group">
            <label class="label label-default" for="ec_userId">User ID:</label>
            <select id="inputState" id="ec_userId" name="ec_id" class="form-control">
                <option value="" disabled>Select User ID</option>
                <?php echo PopulateDropwdownSoldier($userIds, $id) ?>
            </select>
        </div>
        <div class="form-group">
            <label class="label label-default" for="emg_contact_initial">Initial</label>
            <input type="text" class="form-control" name="ec_initial" id="emg_contact_initial" value="<?= $initial; ?>">
            <div class="text-danger"><?= isset($intialErr) ? $intialErr : ''; ?></div>
        </div>
        <div class="form-group">
            <label class="label label-default" for="emg_contact_fName">First Name</label>
            <input type="text" class="form-control" name="ec_fName" id="emg_contact_fName" value="<?= $first_name; ?>">
            <div class="text-danger"><?= isset($fNameErr) ? $fNameErr : ''; ?></div>
        </div>
        <div class="form-group">
            <label class="label label-default" for="emg_contact_lastName">Last Name</label>
            <input type="text" class="form-control" name="ec_lName" id="emg_contact_lastName" value="<?= $last_name; ?>">
            <div class="text-danger"><?= isset($lNameErr) ? $lNameErr : ''; ?></div>
        </div>
        <div class="form-group">
            <label class="label label-default" for="emg_contact_phone">Phone</label>
            <input type="text" class="form-control" name="ec_phone" id="emg_contact_phone" value="<?= $phone; ?>">
            <div class="text-danger"><?= isset($phoneErr) ? $phoneErr : ''; ?></div>
        </div>
        <div class="form-group">
            <label class="label label-default" for="emg_contact_email">Email</label>
            <input type="email" class="form-control" name="ec_email" id="emg_contact_email" value="<?= $email; ?>">
            <div class="text-danger"><?= isset($emailErr) ? $emailErr : ''; ?></div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <input type="submit" value="Create" name="ec_create" class="btn btn-success col-md-12"/>
            </div>
            <div class="form-group col-md-4">
                <a href="emergency_contact.php" class="btn btn-primary col-md-12" >Go Back</a>
            </div>
        </div>
    </form>
</div>