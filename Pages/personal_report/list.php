
<div class="container personnelreport">
  <h2 class="report-title">Personnel Report</h2>
  <form class="form-inline personnelreport-search">
        <input type="text" class="form-control" id="personnelreport-search_input" placeholder="Search By Name">
        <button type="submit" class="btn btn-success">Search</button>
  </form>
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
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
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
              <form action="personnel_update.php " method="post">
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
    <a href="" id="Personnel_Add" class="btn btn-success btn-lg float-right">Add Soldier</a>
  </div>
</div>