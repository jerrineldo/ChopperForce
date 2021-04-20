<?php

$db = DatabaseContext::dbConnect();
$report_id = $_GET["id"];

$FitnessReportDto = new FitnessReport();
$usertobedeleted = $FitnessReportDto->getFitnessReportById($report_id,$db);
if (isset($_POST["deleteConfirm"])) {
    
    $response = $FitnessReportDto->deleteFitnessReport($report_id,$db);
    if($response) {
        ?><script>window.location.href = "./physicalFitness.php";</script><?php //Redirect to list after a successful update
    }

}

?>







<div class="delete-container">
    Are you sure to delete this user : <?php echo $usertobedeleted->first_name;?> <?php echo $usertobedeleted->last_name?> 
    <div class="form-row">
        <div class="form-group col-md-6">
            <form method="POST" name="personnel-delete" action="">
                <input type="submit" value="Delete" name="deleteConfirm" class="btn btn-success col-md-12">
            </form>
        </div>
        <div class="form-group col-md-6">
            <a href="./physicalFitness.php" class="btn btn-primary col-md-12" >Go Back</a>
        </div>
    </div>
</div>