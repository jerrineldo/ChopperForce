<?php
require_once "../Models/DatabaseContext.php";
require_once "../Models/Dutie.php";


$dbcon= DatabaseContext::dbConnect();//DatabaseContext
$s = new Dutie();
//DO THIS TO USERS
// $user_id = $s->getUsers(DatabaseContext::dbConnect());
//$user_id,$recommender,$award,$reason,$present,$days,$remarks

if(isset($_POST['addDutie'])){//MAKE THIS MATCH BUTTON
    
    $qualifications_category_name=$_POST ['qualifications_category_name'];
    

    
    $db = DatabaseContext::dbConnect();
    $s = new Dutie();
    $c = $s->addDutie($qualifications_category_name,$db);
    if($c){
        echo"added";

    }
    else{
        echo "problem adding car";
    }
};

?>


<html lang="en">
<h1>Add a new Qualification/Duty </h1>
<head>
    <title>Add Qualification/Duty</title>
    
</head>

<body>

<!-- <div>
       Form to Add  Qualification/Duty -->
    <form action="" method="post">

  
        <div class="form-group">
            <label for="user_id">user_id :</label>
            <input type="text" class="form-control" id="user_id" name="qualifications_category_name"
                   value="" placeholder="Enter user ID">
            <span style="color: red">


        <a href="../list-cars.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addDutie"
                class="btn btn-primary float-right" id="btn-submit">
            Add Qualification/Duty
        </button>
    </form>
</div> 


</body>
</html>