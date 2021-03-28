<?php


$dbcon= DatabaseContext::dbConnect();//DatabaseContext
$s = new Oer();
$oers = $s->getAllOers(DatabaseContext::dbConnect());
?>

?>
<html lang="en">

<body>
<h2 class="report-title">OER Report</h2>
<div class="m-1">
    <!--    Displaying Data in Table-->
    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">OER_ID</th><!--//The individual oer ID-->
            <th scope="col">Rank </th><!--generated by USER table.Rank-->
            <th scope="col">First Name</th><!--generated by USER table.FirstName-->
            <th scope="col">Last Name</th><!--generated by USER table.LastName-->
            <th scope="col">Rater</th><!--Who is writing OER, Varchar for now-->
            <th scope="col">Int Rater</th><!--Who is signing off on oer-->
            <th scope="col">Senior Rater</th><!--reviewer name , work-->
            <th scope="col">Last OER</th><!--Date-->
            <th scope="col">THRU Date</th><!--Count Down to due date-->
            <th scope="col">Due</th><!--Due-->
            <th scope="col">Type</th><!--Type of OER-->
            <th scope="col">Remarks</th><!--Notes-->
        </tr>
        </thead>
        <tbody>
        <!--This Will be a for each loop to generate the rows & buttons-->
        <?php foreach ($oers as $oer) { ?>
        <tr>
            <!--$id, $user_id, $rank, $rater,
             $int_rater, $senior_rater, $last_oer, $thru_date, $due, $type, $remarks-->
            <th><?= $oer->id; ?></th>
            <th><?= $oer->rank; ?></th>
            <th>First Name</th><!--generated by USER table.FirstName-->
            <th>Last Name</th><!--generated by USER table.LastName-->
            <th><?= $oer->rater; ?></th>
            <th><?= $oer->int_rater; ?></th>
            <th><?= $oer->senior_rater; ?></th>
            <th><?= $oer->last_oer; ?></th>
            <th><?= $oer->thru_date; ?></th>
            <th><?= $oer->due; ?></th>
            <th><?= $oer->type; ?></th>
            <th><?= $oer->remarks; ?></th>
            <th><?= $oer->id; ?></th>

                <!--UPDATE AND DELETE BUTTONS-->
                <td>
                    <form action="updateOER.php" method="post">
                        <input type="hidden" name="id" value="<?= $oer->id; ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateOER" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="deleteOER.php" method="post">
                        <input type="hidden" name="id" value="<?= $oer->id; ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteOER" value="Delete"/>
                    </form>
                </td>
            </tr>

        <?php } ?>
        </tbody>
    </table>
    <a href="addOER.php" id="btn_addOER" class="btn btn-success btn-lg float-right">Add OER</a>

</div>
</body>
</html>


<!--//create button to update the table
//create button to delete table
//create button to add to table
//ASIA LEVESQUE-->