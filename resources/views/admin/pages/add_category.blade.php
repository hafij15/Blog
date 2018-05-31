@extend('admin_master')
@section('admin_main_content')
  <section class="content-header">
      <h1>
        Add Category Form
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Add category</li>
      </ol>
    </section>
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Please fill up the field properly</h3>
              <h4 style="color:green">
                <?php
                  $message= Session::get('message');
                  if($message){
                    echo $message;
                    Session::put('message','');
                  }
                ?>
              </h4>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          {!! Form::open(['url' => '/save-category']) !!}
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Category Name">
              </div>
              <div class="form-group">
                  <label>Category Description</label>
                  <textarea name="category_description" class="form-control" rows="3" placeholder="Category Description"></textarea>
                </div>
              

              <div class="form-group">
                  <label>Publication Status</label>
                  <select name="publication_status" class="form-control">
                    <option>Select Status</option>
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                  </select>
                </div>
              
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          {!! Form::close() !!}
        </div>
        <!-- /.box -->
      </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
@endsection