<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$db = DatabaseContext::dbConnect();
$soldier_id = $_GET["id"];

$PersonalDto = new Personnel();
$selected_soldier = $PersonalDto->getPersonnelById($soldier_id, $db);
var_dump($selected_soldier);
?>
<div class="container">
    <h2 class="report-title">Personnel Report - Update</h2>
    <form method="POST" name="personnel-update">
    <input type="hidden" name="id" value="<?=$soldier_id?>">
        <div class="form-row">
          <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_MOS">MOS:</label>
                <input type="text" class="form-control" id="personnel-update_MOS" placeholder="MOS" value="<?=$selected_soldier->mos?>">
          </div>
          <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_Rank">Rank:</label>
                <input type="text" class="form-control" id="personnel-update_Rank" placeholder="Rank" value="<?=$selected_soldier->rank?>">
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_fName">First Name:</label>
                <input type="text" class="form-control" id="personnel-update_fName" placeholder="First Name" value="<?=$selected_soldier->first_name?>">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_lName">Last Name:</label>
                <input type="text" class="form-control" id="personnel-update_lName" placeholder="Last Name" value="<?=$selected_soldier->last_name?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_SSN">SSN:</label>
                <input type="text" class="form-control" id="personnel-update_SSN" placeholder="SSN" value="<?=$selected_soldier->ssn?>">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_DOD">DOD:</label>
                <input type="text" class="form-control" id="personnel-update_DOD" placeholder="DOD" value="<?=$selected_soldier->dod_id?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_DOB">Date of Birth:</label>
                <input type="text" class="form-control" id="personnel-update_DOB" placeholder="DOB" value="<?=$selected_soldier->dob?>">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="personnel-update_BloodType">Blood Group:</label>
                <input type="text" class="form-control" id="personnel-update_BloodType" placeholder="Blood Group" value="<?=$selected_soldier->blood_type?>">
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label class="label label-default" for="personnel-update_Address">Address:</label>
            <input type="text" class="form-control" id="personnel-update_Address" placeholder="Address" value="<?=$selected_soldier->address?>">
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <a class="btn btn-success col-md-12">Update</a>
            </div>
            <div class="form-group col-md-4">
                <a href="../personnel_report.php" class="btn btn-primary col-md-12" >Go Back</a>
            </div>
        </div>
    </form>
</div>