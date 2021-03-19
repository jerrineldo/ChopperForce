
<div class="container report_page">
    <h2 class="report-title">Weapon Qualifications: MR1</h2>
    <form class="form-inline report_page-search">
        <input type="text" class="form-control" id="frg_search" placeholder="Search By Name">
        <input type="submit" value="Search" class="btn btn-success"/>
        <a class="btn btn-danger back-button" href="weapons.php">Back to Weapons</a>
    </form>
    <table class="table table-dark table-striped table-responsive tbl__frg">
        <thead>
            <tr>
                <th scope="col">User Id</th>
                <th scope="col">Rank</th>
                <th scope="col">Full Name</th>
                <th scope="col">Date</th>
                <th scope="col">Next Date</th>
                <th scope="col">Hits</th>
                <th scope="col">Qualification</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>001</td>
            <td>CPT</td>
            <td>John Doe</td>
            <td>10-Dec-19</td>
            <td>7-Jun-20</td>
            <td>23</td>
            <td>Marksman</td>
            <td>
                <form action="wq_update.php" method="post">
                    <input type="submit" class="button btn btn-primary" name="updateWeaponQualification" value="Update"/>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="submit" class="button btn btn-danger" name="deleteWeaponQualification" value="Delete"/>
                </form>
            </td>
        </tr>
        <tr>
            <td>002</td>
            <td>CPT</td>
            <td>Bran Min</td>
            <td>12-Mar-19</td>
            <td>15-April-21</td>
            <td>51</td>
            <td>Marksman</td>
            <td>
                <form action="wq_update.php" method="post">
                    <input type="submit" class="button btn btn-primary" name="updateWeaponQualification" value="Update"/>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="submit" class="button btn btn-danger" name="deleteWeapon" value="Delete"/>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
</div>