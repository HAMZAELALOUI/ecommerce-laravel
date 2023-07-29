@extends('admin.layouts.master')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Slider</h1>
    
  </div>

  <div class="section-body">
  
    <div class="row">
      <div class="col-12 ">
        <div class="card">
          <div class="card-header">
            <h4>Create Slider </h4>
            <div class="card-header-action">
           </div>
          </div>
          <div class="card-body">
            <form action="" class="">

              <div class="form-group">
                <label for="">Banner</label>
                <input type="file" class="form-control" >
              </div>
              <div class="form-group">
                <label for="">Type</label>
                <input type="text" class="form-control" >
              </div>

              <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" >
              </div>

              <div class="form-group">
                <label for="">Starting Price</label>
               <input type="text" class="form-control" >
              </div>
            <div class="form-group">
              <label for="">Button Url</label>
              <input type="text" class="form-control" >
            </div>
            <div class="form-group">
              <label for="">Serial</label>
              <input type="text" class="form-control" >
            </div>
            <div class="form-group ">
              <label for="inputeState">Status</label>
              <select class="form-control" id="inputeState">
                <option>Active</option>
                <option>inactive</option>
              </select>

            </div>
            <Button type="submit" class="btn btn-primary">Create</Button>
          </form>

          </div>
             
        </div>
      </div>
    
    </div>

  </div>
</section>
@endsection