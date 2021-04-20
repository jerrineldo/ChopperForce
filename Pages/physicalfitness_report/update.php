<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$db = DatabaseContext::dbConnect();
$soldier_id = $_GET["id"];

$selected_soldier = FitnessReport::getFitnessReportById($soldier_id, $db);

var_dump($selected_soldier);

if (isset($_POST["updateConfirm"])) {

    $updated_fitnessreport = new FitnessReport(
                                                $_POST['id'],
                                                $_POST['rank'],
                                                $_POST['first_name'],
                                                $_POST['last_name'],
                                                $_POST['dob'],
                                                $_POST['MDL'],
                                                $_POST['SPT'],
                                                $_POST['HRP'],
                                                $_POST['SDC'],
                                                $_POST['LTK'],
                                                $_POST['2MR'],
                                                $_POST['Total'],
                                                $_POST['FitnessCategory'],
                                                $soldier_id
                                              );

    $response = $updated_fitnessreport::updateFitnessReport($updated_fitnessreport, $db);

    if($response) {
    ?>
        <script>window.location.href = "./physicalFitness.php";</script>
    <?php //Redirect to list after a successful update
    }
}

?>

<div class="container">
    <h2 class="report-title">Physical Fitness Report - Update</h2>
    <form method="POST" name="fitnessreport-update" action="">
    <input type="hidden" name="id" value="<?=$selected_soldier->id?>">
        <div class="form-row">
          <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-update_Rank">Rank:</label>
                <input type="text" class="form-control" id="fitnessreport-update_Rank" readonly placeholder="Rank" name="rank" value="<?=$selected_soldier->rank?>">
          </div>
          <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-update_fName">First Name:</label>
                <input type="text" class="form-control" id="fitnessreport-update_fName" readonly name="first_name" placeholder="First Name" value="<?=$selected_soldier->first_name?>">
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-update_lName">Last Name:</label>
                <input type="text" class="form-control" id="fitnessreport-update_lName" readonly name="last_name" placeholder="Last Name" value="<?=$selected_soldier->last_name?>">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-update_DOB">Date of Birth:</label>
                <input type="text" class="form-control" id="fitnessreport-update_DOB" readonly name="dob" placeholder="DOB" value="<?=$selected_soldier->dob?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-update_MDL">MDL:</label>
                <input type="text" class="form-control" id="fitnessreport-update_SSN" name="MDL" placeholder="MDL" value="<?=$selected_soldier->MDL?>">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-update_SPT">SPT:</label>
                <input type="text" class="form-control" id="fitnessreport-update_SPT" name="SPT" placeholder="SPT" value="<?=$selected_soldier->SPT?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-update_HRP">HRP:</label>
                <input type="text" class="form-control" id="fitnessreport-update_HRP" name="HRP" placeholder="HRP" value="<?=$selected_soldier->HRP?>">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-update_SDC">SDC:</label>
                <input type="text" class="form-control" id="fitnessreport-update_SDC" name="SDC" placeholder="SDC" value="<?=$selected_soldier->SDC?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-update_LTK">LTK:</label>
                <input type="text" class="form-control" id="fitnessreport-update_LTK" name="LTK" placeholder="LTK" value="<?=$selected_soldier->LTK?>">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-update_2MR">2MR:</label>
                <input type="text" class="form-control" id="fitnessreport-update_2MR" name="2MR" placeholder="2MR" value="<?=$selected_soldier->MR?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-update_Total">Total:</label>
                <input type="text" class="form-control" id="fitnessreport-update_Total" name="Total" readonly placeholder="Total" value="<?=$selected_soldier->total?>">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-update_FitnessCategory">Fitness Category:</label>
                <input type="text" class="form-control" id="fitnessreport-update_FitnessCategory" readonly name="FitnessCategory" placeholder="FitnessCategory" value="<?=$selected_soldier->demand_category?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <input type="submit" value="Update" name="updateConfirm" class="btn btn-success col-md-12">
            </div>
            <div class="form-group col-md-4">
                <a href="./physicalFitness.php" class="btn btn-primary col-md-12" >Go Back</a>
            </div>
        </div>
    </form>
</div>