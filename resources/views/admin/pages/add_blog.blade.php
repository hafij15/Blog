@extend('admin_master')
@section('admin_main_content')
  <section class="content-header">
      <h1>
        Add Blog Form
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Add blog</li>
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
          {!! Form::open(['url' => '/save-blog']) !!}
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Blog Title</label>
                <input type="text" name="blog_title" class="form-control" id="exampleInputEmail1" placeholder="Blog Title">
              </div>

              <div class="form-group">
                <label>Blog Category</label>
                <select name="publication_status" class="form-control">
                  <option>Select Category</option>
                  @foreach($all_published_category as $v_category)
                  <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Category Description</label>
                <textarea name="category_description" class="form-control" rows="3" placeholder="Category Description"></textarea>
              </div>
              
              <div class="form-group">
                <label>Short Description</label>
                <textarea name="short_description" class="form-control" rows="3" placeholder="Short Description"></textarea>
              </div>

              <div class="form-group">
                <label>Long Description</label>
                <textarea name="long_description" class="form-control" rows="3" placeholder="Long Description"></textarea>
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