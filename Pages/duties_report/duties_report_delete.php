<?php 
require_once "../../Models/DatabaseContext.php";
require_once "../../Models/Dutie.php";

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $dbcon= DatabaseContext::dbConnect();//DatabaseContext
    $s = new Dutie();
    $count = $s->deleteDutie($id, $dbcon);

    if($count){
        header("./location:duties_report_list.php");
    }else{
        echo"Problem deleting Car";
    }
}
?>