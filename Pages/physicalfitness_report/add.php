<?php

$db = DatabaseContext::dbConnect();

$PersonalDto = new User();
$CompanyList = $PersonalDto->getPotentialUsers($db);


$FitnessCategory = new FitnessCategory();

$Categories = $FitnessCategory->GetAllCategories($db);

if (isset($_POST["addConfirm"])) {

    var_dump($_POST['fitnessreport-add_FitnessCategory']);
    $new_fitnessreport = new FitnessReport(
                                            null,
                                            null,
                                            null,
                                            null,
                                            null,
                                            $_POST['MDL'],
                                            $_POST['SPT'],
                                            $_POST['HRP'],
                                            $_POST['SDC'],
                                            $_POST['LTK'],
                                            $_POST['2MR'],
                                            null,
                                            $_POST['fitnessreport-add_FitnessCategory'],
                                            $_POST['fitnessreport-add_SoldierSelected']
                                          );
    
    $response = $new_fitnessreport->addFitnessReport($db);
    if($response) {
        ?><script>window.location.href = "./physicalFitness.php";</script><?php //Redirect to list after a successful update
    }

}

?>


<script>

$(document).ready(function () {

    $('#fitnessreport-add_SoldierSelected').change(function(){

        selectedSoldierId = $('#fitnessreport-add_SoldierSelected').val();

        $.getJSON('getsoldierdetails.php',{id : selectedSoldierId}, 
            function(soldierdetails){

                $("#fitnessreport-add_Rank").val(soldierdetails.rank);
                $("#fitnessreport-add_fName").val(soldierdetails.first_name);
                $("#fitnessreport-add_lName").val(soldierdetails.last_name);
                $("#fitnessreport-add_DOB").val(soldierdetails.dob);

            })

    });

});

</script>



<div class="container">
    <h2 class="report-title">Physical Fitness Report - Add</h2>
    <form method="POST" name="fitnessreport-add" action="">
        <div class="form-row">
            <div class="form-group col-md-12">
                    <label class="label label-default" for="fitnessreport-add_SoldierSelected">Select Soldier:</label>
                    <select class="form-select" id="fitnessreport-add_SoldierSelected" name="fitnessreport-add_SoldierSelected" >
                        <?php echo PopulateDropwdownSoldier($CompanyList); ?>
                    </select>
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-add_Rank">Rank:</label>
                <input type="text" class="form-control" id="fitnessreport-add_Rank" readonly placeholder="Rank" name="rank" value="">
          </div>
          <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-add_fName">First Name:</label>
                <input type="text" class="form-control" id="fitnessreport-add_fName" readonly name="first_name" placeholder="First Name" value="">
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-add_lName">Last Name:</label>
                <input type="text" class="form-control" id="fitnessreport-add_lName" readonly name="last_name" placeholder="Last Name" value="">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-add_DOB">Date of Birth:</label>
                <input type="text" class="form-control" id="fitnessreport-add_DOB" readonly name="dob" placeholder="DOB" value="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-add_MDL">MDL:</label>
                <input type="text" class="form-control" id="fitnessreport-add_SSN" name="MDL" placeholder="MDL" value="">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-add_SPT">SPT:</label>
                <input type="text" class="form-control" id="fitnessreport-add_SPT" name="SPT" placeholder="SPT" value="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-add_HRP">HRP:</label>
                <input type="text" class="form-control" id="fitnessreport-add_HRP" name="HRP" placeholder="HRP" value="">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-add_SDC">SDC:</label>
                <input type="text" class="form-control" id="fitnessreport-add_SDC" name="SDC" placeholder="SDC" value="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-add_LTK">LTK:</label>
                <input type="text" class="form-control" id="fitnessreport-add_LTK" name="LTK" placeholder="LTK" value="">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-add_2MR">2MR:</label>
                <input type="text" class="form-control" id="fitnessreport-add_2MR" name="2MR" placeholder="2MR" value="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-add_Total">Total:</label>
                <input type="text" class="form-control" id="fitnessreport-add_Total" name="Total" readonly placeholder="Total" value="">
            </div>
            <div class="form-group col-md-6">
                <label class="label label-default" for="fitnessreport-add_FitnessCategory">Fitness Category:</label>
                <select class="form-select" id="fitnessreport-add_FitnessCategory" name="fitnessreport-add_FitnessCategory" >
                        <?php echo PopulateDropdownCategories($Categories); ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <input type="submit" value="Add" name="addConfirm" class="btn btn-success col-md-12">
            </div>
            <div class="form-group col-md-4">
                <a href="./physicalFitness.php" class="btn btn-primary col-md-12" >Go Back</a>
            </div>
        </div>
    </form>
</div>