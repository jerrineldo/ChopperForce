<?php 
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once "../Models/FamilyContact.php";
require_once "../Models/DatabaseContext.php";
require_once "../Library/form-functions.php";

$dbcon = DatabaseContext::dbConnect();
$fc = new FamilyContact();
$relationships = ["Spouse", "Father", "Mother", "Brother", "Sister"];
$preferences = ["Yes", "No"];

if (isset($_POST['fc_update'])){
    $id = $_POST['fc_id'];
    $first_name = $_POST['fc_fName'];
    $last_name = $_POST['fc_lastName'];
    $relationship = $_POST['fc_relationship'];
    $phone = $_POST['fc_phone'];
    $email = $_POST['fc_email'];
    $address = $_POST['fc_address'];
    $preference_form = $_POST['preference_form'] == "Yes" ? true : false;
    $physical_location = $_POST['fc_location']; 

    $count = $fc->updateFamilyContacts($dbcon, $id, $first_name, $last_name, $relationship, $phone, $email, $address, $preference_form, $physical_location);
    if($count){
       header('Location: family_contact.php');
    } else {
        echo "<p class='not-found'>Problem Updating Family Contact<p>";
    }
}

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
} else {
    header('Location: family_contact.php');
}
?>
<div class="container frg">
    <h2 class="report-title">Family Contact Update Page</h2>
    <form method="POST" action="">
        <input type="hidden" name="fc_id" value="<?= $id; ?>"/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="fc_fName" placeholder="First Name" value="<?= $first_name; ?>">
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="fc_lastName" placeholder="Last Name" value="<?= $last_name; ?>">
            </div>
        </div>
        <div class="form-group col-md-12">
            <select id="inputState" name="fc_relationship" class="form-control">
                <option value="" disabled>Relationship</option>
                <?php echo populateDropdown($relationships, $relationship) ?>
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="fc_phone" placeholder="Phone" value="<?= $phone; ?>">
            </div>
            <div class="form-group col-md-8">
                <input type="email" class="form-control" name="fc_email" placeholder="Email" value="<?= $email; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <input type="text" class="form-control" name="fc_address" placeholder="Address" value="<?= $address; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <select id="inputState" name="preference_form" class="form-control">
                    <option value="" disabled>Preference Form</option>
                    <?php echo populateDropdown($preferences, $preference_form) ?>
                </select>
            </div>
            <div class="form-group col-md-7">
                <input type="text" class="form-control" name="fc_location" placeholder="Physical Location" value="<?= $physical_location; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <input type="submit" value="Update" name="fc_update" class="btn btn-success col-md-12"/>
            </div>
            <div class="form-group col-md-4">
                <a href="family_contact.php" class="btn btn-primary col-md-12" >Go Back</a>
            </div>
        </div>
    </form>
</div>