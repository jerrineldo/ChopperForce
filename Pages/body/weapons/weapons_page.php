<?php 
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);

    require_once "../Models/Weapon.php";    
    require_once "../Models/DatabaseContext.php";

    $dbcon = DatabaseContext::dbConnect();
    $weapon = new Weapon();

    $searchKey = isset($_GET['search']) ? $_GET['search'] : null;
    $isGoBack = false;
    if(isset($_POST['deleteWeapon'])){
        $id = $_POST['id'];
        $count = $weapon->deleteWeapon($dbcon, $id);
        if($count) {
            header('Location: weapons.php');
        } else {
            echo "<p class='not-found'>Problem Deleting Weapons<p>";
        }
    }

    if(isset($_GET['search']) && $searchKey){
        $isGoBack = true;
        $weapons = $weapon->searchWeapons($dbcon, $searchKey);
    }else {
        $weapons = $weapon->getAllWeapons($dbcon);
    }

?>

<div class="container report_page">
    <h2 class="report-title">Weapons Page</h2>
    <form class="form-inline report_page-search">
        <input type="text" class="form-control" name="search" id="frg_search" placeholder="Search By Weapon Name">
        <input type="submit" value="Search" class="btn btn-success"/>
    </form>
    <?php
        if(count($weapons) === 0){
            echo("<p class='not-found'>No Results Found<p>");
        }else {
    ?>
    <table class="table table-dark table-striped table-responsive tbl__frg">
        <thead>
            <tr>
                <th scope="col">Weapon Id</th>
                <th scope="col">Weapon Name</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($weapons as $weapon) { ?>
                    <tr>
                        <td><?= $weapon->id; ?></td>
                        <td><?= $weapon->weapon_name; ?></td>
                        <td><a href="weapons_qualification.php?id=<?=$weapon->id?>&name=<?=$weapon->weapon_name?>" class="btn btn-info">View Qualified Soldiers</a></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $weapon->id; ?>"/>
                                <input type="submit" class="button btn btn-danger" name="deleteWeapon" value="Delete"/>
                            </form>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>
    <?php 
        if($isGoBack){
            echo("<a href='weapons.php' class='btn btn-danger' >Go Back</a>");
        }
    ?>
</div>