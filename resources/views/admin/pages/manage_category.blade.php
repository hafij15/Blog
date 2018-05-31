@extend('admin_master')
@section('admin_main_content')
  <section class="content-header">
      <h1>
        Manage Category Form
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Manage category</li>
      </ol>
    </section>
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Category Name</th>
                  <th>Caegory Description</th>
                  <th>Status</th>
                  <th>Status Change</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($all_category as $v_category)
                <tr>
                  <td>{{$v_category->category_id}}</td>
                  <td>{{$v_category->category_name}}</td>
                  <!-- <td style="width:550px;">{{$v_category->category_description}}</td> -->
                  @if($v_category->publication_status==1)
                  <td>Published</td>
                  @else
                  <td>Unpublished</td>
                  @endif
                  <td>{{$v_category->publication_status}}</td>
                  @if($v_category->publication_status==1)
                  <td><a href="{{URL::to('/published-category/'.$v_category->category_id)}}" class="btn btn-primary">Publish</a></td>
                  @else
                  <td><a href="{{URL::to('/unpublished-category/'.$v_category->category_id)}}" class="btn btn-danger">Unpublish</a></td>
                  @endif
                  <td>
                    <a type="button" class="btn btn-info">View</a>
                    <a href={{URL::to('/edit-category/'.$v_category->category_id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{URL::to('/delete-category/'.$v_category->category_id)}}" onclick="return check_delete()" class="btn btn-danger">Delete</a>
                  </td>
                  
                </tr>
                @endforeach
                
                
                </tbody>
                <tfoot>
                <!-- <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr> -->
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
  <!-- /.content -->
@endsection