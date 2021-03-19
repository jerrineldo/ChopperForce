
<div class="container">
    <h2 class="report-title">Update Weapons Qualification Page</h2>
    <form method="POST" class="center-form">
        <div class="form-group">
            <label for="wq_date">Date</label>
            <input type="date" class="form-control" id="wq_date" >
        </div>
        <div class="form-group">
            <label for="wq_nextDate">Next Date</label>
            <input type="date" class="form-control" id="wq_nextDate">
        </div>
        <div class="form-group">
            <label for="wq_hits">Hits</label>
            <input type="number" min=0 class="form-control" id="wq_hits">
        </div>
        <div class="form-group">
            <label for="wq_qualifications">Qualification</label>
            <input type="text" class="form-control" id="wq_qualifications" >
        </div>

        <div class="form-row">
            <div class="form-group col-md-8">
                <a class="btn btn-success col-md-12">Update</a>
            </div>
            <div class="form-group col-md-4">
                <a href="weapons_qualification.php" class="btn btn-primary col-md-12" >Go Back</a>
            </div>
        </div>
    </form>
</div>