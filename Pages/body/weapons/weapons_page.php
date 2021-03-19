
<div class="container report_page">
    <h2 class="report-title">Weapons Page</h2>
    <form class="form-inline report_page-search">
        <input type="text" class="form-control" id="frg_search" placeholder="Search By Weapon Name">
        <input type="submit" value="Search" class="btn btn-success"/>
    </form>
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
        <tr>
            <td>001</td>
            <td>MR1</td>
            <td><a href="weapons_qualification.php?id=001" class="btn btn-info">View Qualified Soldiers</a></td>
            <td>
                <form action="" method="post">
                    <input type="submit" class="button btn btn-danger" name="deleteWeapon" value="Delete"/>
                </form>
            </td>
        </tr>
        <tr>
            <td>002</td>
            <td>MR3</td>
            <td><a href="weapons_qualification.php?id=001" class="btn btn-info">View Qualified Soldiers</a></td>
            <td>
                <form action="" method="post">
                    <input type="submit" class="button btn btn-danger" name="deleteWeapon" value="Delete"/>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
</div>