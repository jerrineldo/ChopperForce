<?php
require_once '../../Models/DatabaseContext.php';
require_once '../../Models/NCOER.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $dbcon= DatabaseContext::dbConnect();
    $s = new Ncoer();
    $count = $s->deleteNcoer($id, $dbcon);
    if($count){
        header("Location: ../ncoer_report.php");
    }
    else {
        echo " problem deleting";
    }
}
