<?php 
require_once "../Models/DatabaseContext.php";
require_once "../Models/Dutie.php";
$qualifications_category_name="";
// $s2 = new Award();

// $user_id = $s2->getUsers(DatabaseContext::dbConnect());



if(isset($_POST['updateDutie'])){
    $id= $_POST['id'];
    var_dump($id);

    $dbcon= DatabaseContext::dbConnect();
    var_dump($_POST);

    $s = new Dutie();
    $Dutie = $s->getDutieById($id, $dbcon);

    $qualifications_category_name = $Dutie->qualifications_category_name;


}

if(isset($_POST['updDutie'])){
    $id=$_POST['sid'];
    
    var_dump($_POST);

    $qualifications_category_name=$_POST['qualifications_category_name'];

    $dbcon= DatabaseContext::dbConnect();
    $s = new Dutie();
    $count = $s->updateDutie($id,$qualifications_category_name,$dbcon);

    if($count){
        // header("location:list-cars.php");
    }else{
        echo"Problem updating Duty";
    }


}
?>


<html lang="en">
<h1>Update Dutie </h1>
<head>
    <title>Add Dutie</title>
    
</head>

<body>

<!-- <div>
       Form to Add  award -->
    <form action="" method="POST">

        <input type="hidden" name="sid" value="<?= $id; ?>" />
        <div class="form-group">
            <label for="user_id"class="report-title">qualifications_duty_categories :</label>
            <input type="text" class="form-control" id="user_id" name="qualifications_category_name"
                   value="<?=$qualifications_category_name;?>">
        </div>

        <a href="" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updDutie"
                class="btn btn-primary float-right" id="btn-submit">
            Update Duty
        </button>
    </form>
</div> 


</body>
</html>