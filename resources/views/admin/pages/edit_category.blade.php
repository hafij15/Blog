@extend('admin_master')
@section('admin_main_content')
  <section class="content-header">
      <h1>
        Edit Category Form
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Edit category</li>
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
              <!-- <h4 style="color:green">
                <?php
                  $message= Session::get('message');
                  if($message){
                    echo $message;
                    Session::put('message','');
                  }
                ?>
              </h4> -->
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <!-- {!! Form::open(['url'=>'/update-category/'.$category_info->category_id]) !!} -->
          {!! Form::open(array('url'=>'/update-category/'.$category_info->category_id,'name'=>'edit_category','role'=>'form', 'method'=>'POST')) !!}
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" name="category_name" value="{{$category_info->category_name}}" class="form-control" id="exampleInputEmail1" placeholder="Category Name">
              </div>
              <div class="form-group">
                  <label>Category Description</label>
                  <textarea name="category_description"  class="form-control" rows="3" placeholder="Category Description">{{$category_info->category_description}}</textarea>
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
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          {!! Form::close() !!}
        </div>
        <!-- /.box -->
      </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
<script type="text/javascript">
    document.forms['edit_category'].elements['publication_status'].value = {{$category_info->publication_status}};
</script>
@endsection