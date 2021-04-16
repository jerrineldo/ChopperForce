<?php
require_once "../Models/DatabaseContext.php";
require_once "../Models/Award.php";


$dbcon= DatabaseContext::dbConnect();//DatabaseContext
$s = new Award();
$Awards = $s->getAllAwards(DatabaseContext::dbConnect());
//id user_id recommender award reason present days remarks
?>
<!--
Form By Journey
    !-->
    <body>


<link rel="stylesheet" href="../Stylesheets/reports_page.css">

<h1 class="report-title">Awards Report Page</h1>
<a href="./award_report_add.php" id="btn_back" class="btn btn-success float-left">Add New Award Report</a>
<table class="table table-bordered tbl tbl__frg">
    <thead>
        <tr>
            <th>Award ID</th>
            <th>Soldier ID</th>
            <th>Soldier Name</th>
            <th>Award Name</th>
            <th>Present</th>
            <th>Reason</th>
            <th>Days</th>
            <th>remarks</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach ($Awards as $award) { ?>
            <tr>
                <td><?= $award->id; ?></td>
                <td><?= $award->user_id; ?></td>
                <td><?= $award->Username; ?></td>
                <td><?= $award->award; ?></td>
                <td><?= $award->present; ?></td>
                <td><?= $award->reason; ?></td>
                <td><?= $award->days; ?></td>
                <td><?= $award->remarks; ?></td>
                <td>
                    <form action="../Pages/awards_report_update.php" method="post">
                        <input type="hidden"  name="id" value="<?= $award->id; ?>"/>
                        <input type="submit"class="button btn btn-primary"  name="updateAward" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="../Pages/awards_report/awards_report_delete.php" method="post">
                        <input type="hidden" name="id" value="<?=  $award->id; ?>"/>
                        <input type="submit" class="button btn btn-danger"  name="deleteAward" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        
    </tbody>
</table>
</body>