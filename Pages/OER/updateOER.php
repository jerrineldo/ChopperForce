<?php
use Cars\Model\Database;
use Cars\Model\Car;
require_once '../../Models/DatabaseContext.php';
require_once '../../Models/OER.php';

$user_id= $rank= $first_name= $last_name=$rater= $int_rater= $senior_rater= $last_oer= $thru_date= $due= $type= $remarks ="";

if(isset($_POST['updateOer'])){
    $id= $_POST['id'];
    $dbcon= DatabaseContext::dbConnect();
    var_dump($id);

    $s = new Oer();
    $oer = $s->getOerById($id, $dbcon);
    $user_id = $oer ->user_id;
    $rater =  $oer ->rater;
    $int_rater= $oer ->int_rater;
    $senior_rater= $oer ->senior_rater;
    $last_oer= $oer ->last_oer;
    $thru_date= $oer ->thru_date;
    $due= $oer ->due;
    $type= $oer ->type;
    $remarks=$oer ->remarks;


}
if(isset($_POST['updOer'])){
    $id= $_POST['sid'];

    $user_id = $_POST['user_id'];
    $rater = $_POST['rater'];
    $int_rater= $_POST['int_rater'];
    $senior_rater= $_POST['senior_rater'];
    $last_oer=$_POST['last_oer'];
    $thru_date= $_POST['thru_date'];
    $due= $_POST['due'];
    $type= $_POST['type'];
    $remarks=$_POST['remarks'];

    $dbcon= DatabaseContext::dbConnect();
    $s = new Oer();
    $c = $s->addOer( $user_id,$rater, $int_rater, $senior_rater,
        $last_oer, $thru_date, $due, $type, $remarks, $dbcon);

    if($c){
        header("Location: ../oer_report.php");
    } else {
        echo "problem adding a OER";
    }

}


?>

<html lang="en">

<head>
    <title>Update OER!</title>
    <meta name="description" content="OER Management System">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h1>Update OER</h1>
<div>
    <!--    Form to Add OER -->
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
            <label for="year">Intermediate Rater:</label>
            <input type="text" name="int_rater" value="<?= $int_rater; ?>" class="form-control"
                   id="int_rater" placeholder="Enter Intermediate Raters Name">
            <span style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="senior_rater">Senior Rater:</label>
            <input type="text" name="senior_rater" value="<?= $senior_rater; ?>" class="form-control"
                   id="senior_rater" placeholder="Enter Senior Raters Name">
            <span style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="last_oer">Last OER:</label>
            <input type="text" name="last_oer" value="<?= $last_oer; ?> " class="form-control"
                   id="last_oer" placeholder="Date: yyyy-mm-dd">
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
        <a href="../oer_report.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updOer" class="btn btn-primary float-right" id="btn-submit">Update OER</button>
    </form>
</div>


</body>
</html