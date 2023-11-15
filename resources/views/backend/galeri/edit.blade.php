@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Galeri Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit Galeri</a></li>
              <li class="breadcrumb-item active">Edit Galeri</li>
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
                <h3 class="card-title">Edit Galeri Page</h3>
              </div>

              <form class="form-horizontal" method="POST" action="{{ url('admin/galeri/edit/' . $galeriRecord->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Gambar
                      <span style="color: red;"> *</span>
                    </label>
                    <div class="col-sm-10">
                      <input type="file" name="image" class="form-control" required>
                      @if(!empty($galeriRecord->image))
                      {{-- @if(file_exist(public_path('public/galeri/'.$value->image))) --}}
                      <img src="{{ url('public/galeri/'.$galeriRecord->image) }}" style="height: 80px; width: 80px;">
                      {{-- @endif --}}
                    @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-lable">
                      Deskripsi
                      <span style="color: red;"> *</span>
                    </label>
                    <div class="col-sm-10">
                      <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" required value="{{ $galeriRecord->deskripsi }}">
       
                    </div>
                  </div>

    
                  


                </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="{{ url('admin/galeri') }}" class="btn btn-default float-right">Cancel</a>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
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
  <script>
  // Validasi sisi klien untuk Galeri 
  document.querySelector('form').addEventListener('submit', function (e) {
    var regexGaleriDeskripsi = /^[A-Za-z0-9\s]+$/;

    var galeriDeskripsi = document.querySelector('input[name="deskripsi"]').value;

    if (!regexGaleriDeskripsi.test(galeriDeskripsi)) {
      alert('Galeri Deskripsi hanya boleh berisi huruf, angka, dan spasi.');
      e.preventDefault(); // Menghentikan pengiriman formulir jika tidak valid
    }
  });
</script>
@endsection