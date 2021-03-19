<?php include "header.php"; include "nav.php"; ?>
<link rel="stylesheet" href="../Stylesheets/reports_page.css">
<div class="m-1">
  <table class="table table-bordered tbl">
    <thead>
      <tr>
        <th scope="col">MOS</th>
        <th scope="col">Rank</th>
        <th scope="col">Last Name</th>
        <th scope="col">First Name</th>
        <th scope="col">M</th>
        <th scope="col">SSN</th>
        <th scope="col">DOD ID</th>
        <th scope="col">Bloodtype</th>
        <th scope="col">DOB</th>
        <th scope="col">Address</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>15B</td>
        <td>CPT</td>
        <td>Elliot</td>
        <td>Tyler</td>
        <td>J</td>
        <td>ENCRYPTED</td>
        <td>ENCRYPTED</td>
        <td>A+</td>
        <td>12-12-1989</td>
        <td>ENCRYPTED</td>
        <td>
            <form action="" method="post">
                <input type="hidden" name="id" value=""/>
                <input type="submit" class="button btn btn-primary" name="updateSoldier" value="Update"/>
            </form>
        </td>
        <td>
            <form action="" method="post">
                <input type="hidden" name="id" value=""/>
                <input type="submit" class="button btn btn-danger" name="deleteSoldier" value="Delete"/>
            </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<?php include "footer.php"; ?>
