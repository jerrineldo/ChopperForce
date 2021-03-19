<?php include "header.php"; include "nav.php"; ?>
<div class="main-companytable">
  <table>
    <thead>
      <tr>
        <th>MOS</th>
        <th>Rank</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>M</th>
        <th>SSN</th>
        <th>DOD ID</th>
        <th>Bloodtype</th>
        <th>DOB</th>
        <th>Address</th>
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
