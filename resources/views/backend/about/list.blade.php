@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">About Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">About</a></li>
              <li class="breadcrumb-item active">About</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @include('_message')

        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">About Page</h3>
              </div>

              <form class="form-horizontal" method="POST" action="{{ url('admin/about/post')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      First Name
                    </label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ @$aboutRecord[0]->first_name}}" name="first_name" class="form-control" placeholder="First Name">

                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Last Name
                    </label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ @$aboutRecord[0]->last_name}}" name="last_name" class="form-control" placeholder="Last Name">

                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Date of Birth 
                    </label>
                    <div class="col-sm-10">
                      <input type="date" value="{{ @$aboutRecord[0]->date_of_birth}}" name="date_of_birth" class="form-control" placeholder="Date of Birth">

                    </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-sm-2 col-form-label">
                          Gender
                      </label>
                      <div class="col-sm-10">
                          <select name="gender" class="form-control">
                              <option value="Pria" {{ @$aboutRecord[0]->gender == 'Pria' ? 'selected' : '' }}>Pria</option>
                              <option value="Wanita" {{ @$aboutRecord[0]->gender == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                          </select>
                      </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Nationality
                    </label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ @$aboutRecord[0]->nationality}}" name="nationality" class="form-control" placeholder="Nationality">

                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Address
                    </label>
                    <div class="col-sm-10">
                      <textarea type="text" value="{{ @$aboutRecord[0]->address}}" name="address" class="form-control" placeholder="Address"></textarea>

                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Phone
                    </label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ @$aboutRecord[0]->phone}}" name="phone" class="form-control" placeholder="Phone Number">

                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Email
                    </label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ @$aboutRecord[0]->email}}" name="email" class="form-control" placeholder="Email">

                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Languages
                    </label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ @$aboutRecord[0]->languages}}" name="languages" class="form-control" placeholder="Languages">

                    </div>
                  </div>

                  <input type="hidden" name="id" value="{{ @$aboutRecord[0]->id }}">
                </div>
                <div class="card-footer">
                  <button type="submit" name="add_to_update" id="add_to_update" class="btn btn-info" value="@if(count($aboutRecord)>0) Edit @else Add @endif">@if(count($aboutRecord)>0) Edit @else Add @endif</button>
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
                  @foreach ($aboutRecord as $value)
                  <a onclick="return confirm('Are you sure want to delete?')"  href="{{ url('admin/about/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                  @endforeach
                </div>

              </div>
            </form>
          </div>
          
        </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection