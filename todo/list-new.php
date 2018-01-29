<form action='list-new-add.php' method="get">
    <h2>Enter new To-Do</h2>

    <!-- <input type="text" class="form-control" id="state" aria-describedby="emailHelp" value="added"> -->

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="formTitle">Title</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="formTitle" id="formTitle" aria-describedby="emailHelp" placeholder="Enter To-Do Name">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="formDescription">Description</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="formDescription" id="formDescription" placeholder="Enter To-Do Description">
        </div>
    </div>

    <div class="form-group row">
        <label for="formDeadline" class="col-md-2 col-form-label">Deadline</label>
        <div class="col-md-10">
            <input class="form-control" type="date" name="formDeadline" value="2018-01-01" id="formDeadline">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label" for="formPriority">Priority</label>
        <div class="col-md-10">
            <select class="form-control" name="formPriority" id="formPriority">
                <option>Unimporant</option>
                <option>Moderate</option>
                <option>Urgent</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php?state=display"><button type="button" class="btn btn-primary">Cancel</button></a>
    </div>
</form>
