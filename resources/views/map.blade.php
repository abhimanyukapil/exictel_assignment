<h2>Enter Address</h2>
 
    <form method="post" action="/show" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="titleid" class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-9">
                <input name="address" type="text" class="form-control" id="titleid" placeholder="Address">
            </div>
        </div>        
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>