<?php
use Cars\Model\Database;
use Cars\Model\Car;
require_once '../../Models/DatabaseContext.php';
require_once '../../Models/NCOER.php';

$user_id= $rank= $first_name= $last_name= $rater= $senior_rater= $reviewer = $last_ncoer= $thru_date= $due= $type= $remarks ="";

if(isset($_POST['updateNcoer'])){
    $id= $_POST['id'];
    $dbcon= DatabaseContext::dbConnect();
    var_dump($id);

    $s = new Ncoer();
    $ncoer = $s->getNcoerById($id, $dbcon);
    $user_id = $ncoer ->user_id;
    $rater =  $ncoer ->rater;
    $senior_rater= $ncoer ->senior_rater;
    $reviewer= $ncoer ->reviewer;
    $last_ncoer= $ncoer ->last_ncoer;
    $thru_date= $ncoer ->thru_date;
    $due= $ncoer ->due;
    $type= $ncoer ->type;
    $remarks=$ncoer ->remarks;


}
if(isset($_POST['updNcoer'])){


    $user_id = $_POST['user_id'];
    $rater = $_POST['rater'];
    $senior_rater= $_POST['senior_rater'];
    $reviewer= $_POST['reviewer'];
    $last_ncoer=$_POST['last_ncoer'];
    $thru_date= $_POST['thru_date'];
    $due= $_POST['due'];
    $type= $_POST['type'];
    $remarks=$_POST['remarks'];

    $dbcon= DatabaseContext::dbConnect();
    $s = new Ncoer();
    $c = $s->addNcoer( $user_id,$rater, $senior_rater, $reviewer,
        $last_ncoer, $thru_date, $due, $type, $remarks, $dbcon);

    if($c){
        header("Location: ../ncoer_report.php");
    } else {
        echo "problem adding a NCOER";
    }

}


?>

<html lang="en">

<head>
    <title>Update NCOER!</title>
    <meta name="description" content="NCOER Management System">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h1>Update NCOER</h1>
<div>
    <!--    Form to Update NCOER -->
    <form action="" method="post">
        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" class="form-control" name="user_id" id="user_id" value="<?= $user_id; ?> "
                   placeholder="<?= $user_id;?>">
            <span style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="model">Rater</label>
            <input type="text" class="form-control" id="rater" name="rater"
                   value="<?= $rater; ?>" placeholder="<?= $rater; ?>">
            <span style="color: red"></span>
        </div>

        <div class="form-group">
            <label for="senior_rater">Senior Rater:</label>
            <input type="text" name="senior_rater" value="<?= $senior_rater; ?>" class="form-control"
                   id="senior_rater" placeholder="Enter Senior Raters Name">
            <span style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="reviewer">Reviewer:</label>
            <input type="text" name="reviewer" value="<?= $reviewer; ?>" class="form-control"
                   id="reviewer" placeholder="Enter Intermediate Raters Name">
            <span style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="last_ncoer">Last NCOER:</label>
            <input type="text" name="last_ncoer" value="<?= $last_ncoer; ?> " class="form-control"
                   id="last_ncoer" placeholder="Date: yyyy-mm-dd">
            <span style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="thru_date">Thru:</label>
            <input type="text" name="thru_date" value="<?= $thru_date; ?>" class="form-control"
                   id="thru_date" placeholder="Date: yyyy-mm-dd">
            <span style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="due">Due:</label>
            <input type="text" name="due" value="<?= $due; ?>" class="form-control"
                   id="due" placeholder="Date: yyyy-mm-dd">
            <span style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="type">Type:</label>
            <input type="text" name="type" value="<?= $type; ?>" class="form-control"
                   id="type" placeholder="Type">
            <span style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="remarks">Remarks:</label>
            <input type="text" name="remarks" value="<?= $remarks; ?>" class="form-control"
                   id="remarks" placeholder="Type">
            <span style="color: red"></span>
        </div>
        <a href="../ncoer_report.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updNcoer" class="btn btn-primary float-right" id="btn-submit">Update NCOER</button>
    </form>
</div>


</body>
</html