@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Home Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        @include('_message')
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Home Page</h3>
              </div>

              <form class="form-horizontal" method="POST" action="{{ url('admin/home/post') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Profile Image
                    </label>
                    <div class="col-sm-10">
                      <input type="file" name="profile" class="form-control">
                      @if(@$homeRecord[0]->profile)
                      <img src="{{ url('public/assets/imgs/' .@$homeRecord[0]->profile) }}" width="200" height="200" />
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Your Name
                    </label>
                    <div class="col-sm-10">
                      <input type="text" name="your_name" class="form-control" placeholder="Enter Your Name" value="{{ @$homeRecord[0]->your_name}}">
       
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Work Experience
                    </label>
                    <div class="col-sm-10">
                      <input type="text" name="work_experience" class="form-control" placeholder="Enter Your Work Experience" value="{{ @$homeRecord[0]->work_experience}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Description
                    </label>
                    <div class="col-sm-10">
                      <textarea name="description" class="form-control" placeholder="Enter Your Description">{{ @$homeRecord[0]->description}}</textarea>
                    </div>
                  </div>

                  <input type="hidden" name="id" value="{{ @$homeRecord[0]->id}}">

                </div>
                  <div class="card-footer">
                    <button type="submit" name="add_to_update" id="add_to_update" class="btn btn-info" value="@if(count($homeRecord)>0) Edit @else Add @endif">@if(count($homeRecord)>0) Edit @else Add @endif</button>
                    <a href="" class="btn btn-default float-right">Cancel</a>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @foreach ($homeRecord as $value)
                    <a onclick="return confirm('Are you sure want to delete?')"  href="{{ url('admin/home/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                    @endforeach
                  </div>
                  

                </div>
              </form>
            </div>
            
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection