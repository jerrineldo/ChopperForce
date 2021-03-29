<?php 
require_once "../Models/FamilyContact.php";
require_once "../Models/DatabaseContext.php";
require_once "../Library/form-functions.php";

$dbcon = DatabaseContext::dbConnect();
$fc = new FamilyContact();
$relationships = ["Spouse", "Father", "Mother", "Brother", "Sister"];
$preferences = ["Yes", "No"];

// validation variables
$fNameErr = $lNameErr = $phoneErr = $emailErr = $addressErr = null;

if(isset($_POST['updateFC'])){
    $id = $_POST['id'];
    $contact = $fc->getFamilyContactByID($dbcon, $id);

    $first_name = $contact->first_name;
    $last_name = $contact->last_name;
    $relationship = $contact->relationship;
    $phone = $contact->phone;
    $email = $contact->email;
    $address = $contact->address;
    $preference_form = $contact->preference_form ? "Yes" : "No";
    $physical_location = $contact->physical_location;
}

if(!isset($_POST['fc_update']) && !isset($_POST['id'])){
    header('Location: family_contact.php');
}


function validateFields($first_name, $last_name, $phone, $email, $address){
    global $fNameErr, $lNameErr, $relationErr, $phoneErr, $emailErr, $addressErr, $preferenceErr, $locationError;
    $validationError = false;
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
    if(empty($address)){
        $addressErr = "Enter a valid Address";
        $validationError = true;
    }
    return $validationError;
}

if (isset($_POST['fc_update'])){
    $id = $_POST['fc_id'];
    $first_name = $_POST['fc_fName'];
    $last_name = $_POST['fc_lastName'];
    $relationship = $_POST['fc_relationship'];
    $phone = $_POST['fc_phone'];
    $email = $_POST['fc_email'];
    $address = $_POST['fc_address'];
    $preference_form = $_POST['preference_form'] == "Yes" ? true : false;
    $physical_location = !empty($_POST['fc_location']) ? $_POST['fc_location'] : "N/A" ; 

    $validationError = validateFields($first_name, $last_name, $phone, $email, $address);
    if(!$validationError){
        $count = $fc->updateFamilyContacts($dbcon, $id, $first_name, $last_name, $relationship, $phone, $email, $address, $preference_form, $physical_location);
        if($count){
           header('Location: family_contact.php');
        } else {
            echo "<p class='not-found'>Problem Updating Family Contact<p>";
        }
    }
}

?>
<div class="container frg">
    <h2 class="report-title">Family Contact Update Page</h2>
    <form method="POST" action="">
        <input type="hidden" name="fc_id" value="<?= $id; ?>"/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fc_fName">First Name:</label>
                <input type="text" class="form-control" id="fc_fName" name="fc_fName" placeholder="First Name" value="<?= $first_name; ?>">
                <div class="text-danger"><?= isset($fNameErr) ? $fNameErr : ''; ?></div>
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fc_lastName">Last Name:</label>
                <input type="text" class="form-control" name="fc_lastName" placeholder="Last Name" value="<?= $last_name; ?>">
                <div class="text-danger"><?= isset($lNameErr) ? $lNameErr : ''; ?></div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="label label-default" for="fc_relationship">Relationship:</label>
            <select id="inputState" id="fc_relationship" name="fc_relationship" class="form-control">
                <option value="" disabled>Relationship</option>
                <?php echo populateDropdown($relationships, $relationship) ?>
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fc_phone">Phone:</label>
                <input type="text" class="form-control" id="fc_phone" name="fc_phone" placeholder="Phone" value="<?= $phone; ?>">
                <div class="text-danger"><?= isset($phoneErr) ? $phoneErr   : ''; ?></div>
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fc_email">Email:</label>
                <input type="email" class="form-control" id="fc_email" name="fc_email" placeholder="Email" value="<?= $email; ?>">
                <div class="text-danger"><?= isset($emailErr) ? $emailErr    : ''; ?></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fc_address">Address:</label>
                <input type="text" class="form-control" id="fc_address" name="fc_address" placeholder="Address" value="<?= $address; ?>">
                <div class="text-danger"><?= isset($addressErr) ? $addressErr   : ''; ?></div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="preference_form">Preference Form</label>
                <select id="inputState" id="preference_form" name="preference_form" class="form-control">
                    <option value="" disabled>Preference Form</option>
                    <?php echo populateDropdown($preferences, $preference_form) ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fc_location">Physical Location</label>
                <input type="text" class="form-control" id="fc_location" name="fc_location" placeholder="Physical Location" value="<?= $physical_location; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="submit" value="Update" name="fc_update" class="btn btn-success col-md-12"/>
            </div>
            <div class="form-group col-md-4">
                <a href="family_contact.php" class="btn btn-primary col-md-12" >Go Back</a>
            </div>
        </div>
    </form>
</div>