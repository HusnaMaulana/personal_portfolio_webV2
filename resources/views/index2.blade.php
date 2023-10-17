<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <meta name="copyright" content="MACode ID, https://www.macodeid.com/">

  
  <title>Personal Portfolio Website</title>
  
  <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/assets2/favicon.ico') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ url('public/assets2/css/themify-icons.css') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ url('public/assets2/css/bootstrap.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ url('public/assets2/vendor/animate/animate.css') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ url('public/assets2/vendor/owl-carousel/owl.carousel.css') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ url('public/assets2/vendor/perfect-scrollbar/css/perfect-scrollbar.css') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ url('public/assets2/vendor/nice-select/css/nice-select.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ url('public/assets2/vendor/fancybox/css/jquery.fancybox.min.css') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ url('public/assets2/css/virtual.css') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ url('public/assets2/css/minibar.virtual.css') }}">
</head>
<body class="theme-red">
  
  <!-- Back to top button -->
  <div class="btn-back_to_top">
    <span class="ti-arrow-up"></span>
  </div>
  
  <!-- Setting button -->
  <div class="config">
    <div class="template-config">
      <!-- Settings -->
      <div class="d-block">
        <button class="btn btn-fab btn-sm" id="sideel" title="Settings"><span class="ti-settings"></span></button>
      </div>

      <!-- Help -->
      <div class="d-block">
        <a href="#" class="btn btn-fab btn-sm" title="Help" data-toggle="tooltip" data-placement="left"><span class="ti-help"></span></a>
      </div>
    </div>
    <div class="set-menu">
      <p>Select Color</p>
      <div class="color-bar" data-toggle="selected">
        <span class="color-item bg-theme-red selected" data-class="theme-red"></span>
        <span class="color-item bg-theme-blue" data-class="theme-blue"></span>
        <span class="color-item bg-theme-green" data-class="theme-green"></span>
        <span class="color-item bg-theme-orange" data-class="theme-orange"></span>
        <span class="color-item bg-theme-purple" data-class="theme-purple"></span>
      </div>
    </div>
  </div>
  
  <div class="topbar-nav fixed-top">
    <div class="brand">
      <img src="../assets/favicon.ico" alt="" width="30" height="30">
    </div>
    <h3 class="ml-1">Gram</h3>
    <button class="btn-fab toggle-menu mr-3"><span class="ti-menu"></span></button>
  </div>
  
  <!-- Minibar -->
  <div class="minibar">
    <div class="header">
      <div class="brand">
        
      </div>
    </div>
    <div class="content">
      <ul class="main-menu">
        <li class="menu-item active">
          <a href="#home" class="menu-link">
            <span class="icon ti-home"></span>
            <span class="caption">Home</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="#about" class="menu-link">
            <span class="icon ti-user"></span>
            <span class="caption">About</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="#skill" class="menu-link">
            <span class="icon ti-file"></span>
            <span class="caption">Skill</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="#education" class="menu-link">
            <span class="icon ti-file"></span>
            <span class="caption">Education</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="#experience" class="menu-link">
            <span class="icon ti-file"></span>
            <span class="caption">Experience</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="#portfolio" class="menu-link">
            <span class="icon ti-briefcase"></span>
            <span class="caption">Portfolio</span>
          </a>
        </li>
        <li class="menu-item">
          <a onclick="redirectToIndex()" class="menu-link">
            <span class="icon ti-reload"></span>
            <span class="caption">Switch</span>
          </a>
        {{-- </li>
        <li class="nav-item">
          <button class="btn btn-theme-outline" style="margin-right:10px" onclick="redirectToIndex()">Switch</button>
        </li> --}}
        
        <script>
          function redirectToIndex() {
            window.location.href = '/personal_portfolio_website/';
          }
        </script>
      </ul>
    </div>
  </div>
  
  <div class="vg-main-wrapper">
    <div class="vg-page page-home" id="home" style="background-image:url('{{ asset('public/assets/img/bg_image_2.jpg') }}')">
      <div class="caption wow zoomInUp">
        <h1 class="fw-normal">Welcome</h1>
        <h2 class="fw-medium fg-theme">{{ @$homeRecord[0]->your_name}}</h2>
        <p class="tagline">{{ @$homeRecord[0]->work_experience}}</p>
      </div>
    </div>
    
    <!-- Page About -->
    <div class="vg-page page-about" id="about">
      <!-- Profile -->
      <div class="container py-3">
        <div class="row">
          <div class="col-md-6">
            <div class="img-place wow zoomIn">
              <img src="{{ url('public/assets/imgs/'.@$homeRecord[0]->profile) }}" alt="Photo Profile">
            </div>
          </div>
          <div class="col-md-6">
            <div class="caption wow fadeInRight">
              <h2 class="fg-dark">{{ @$homeRecord[0]->your_name}}</h2>
              <p class="fg-theme fw-medium">{{ @$homeRecord[0]->work_experience}}</p>
              <p>{{ @$homeRecord[0]->description}}</p>
              <ul class="theme-list">
                <li><b>Date of Birth:</b>{{ @$aboutRecord[0]->date_of_birth }}</li>
                <li><b>Gender:</b>{{ @$aboutRecord[0]->gender }}</li>
                <li><b>Nationality:</b>{{ @$aboutRecord[0]->nationality }}</li>
                <li><b>Phone:</b>{{ @$aboutRecord[0]->phone }}</li>
                <li><b>Email:</b>{{ @$aboutRecord[0]->email }}</li>
              </ul>
              <a class="btn btn-theme btn-rounded" href="{{ url('download-pdf') }}">Download CV</a>
            </div>
          </div>
        </div>
      </div> <!-- End profile -->
      <!-- Skills -->
      <div class="container mt-5" id="skill">
        <h1 class="text-center fg-dark wow fadeInUp">My Skills</h1>
        <div class="row py-3">
          <div class="col-md-6">
            {{-- <h4 class="wow fadeInUp">Coding skills</h4> --}}
            <div class="progress-wrapper wow fadeInUp">
              <span class="caption">{{ @$skillRecord[0]->skill }}</span>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ @$skillRecord[0]->percentage }}% " aria-valuenow="{{ @$skillRecord[0]->percentage }}" aria-valuemin="0" aria-valuemax="100">{{ @$skillRecord[0]->percentage }}%</div>
              </div>
            </div>
            <div class="progress-wrapper wow fadeInUp">
              <span class="caption">{{ @$skillRecord[2]->skill }}</span>
              <div class="progress">
                <div class="progress-bar" role="progressbar"  style="width: {{ @$skillRecord[2]->percentage }}% " aria-valuenow="{{ @$skillRecord[2]->percentage }}" aria-valuemin="0" aria-valuemax="100">{{ @$skillRecord[2]->percentage }}%</div>
              </div>
            </div>

            {{-- <div class="progress-wrapper wow fadeInUp">
              <span class="caption">{{ @$skillRecord[4]->skill }}</span>
              <div class="progress">
                <div class="progress-bar" role="progressbar"  style="width: {{ @$skillRecord[4]->percentage }}% " aria-valuenow="{{ @$skillRecord[4]->percentage }}" aria-valuemin="0" aria-valuemax="100">{{ @$skillRecord[4]->percentage }}%</div>
              </div>
            </div> --}}

          </div>
          <div class="col-md-6">
            {{-- <h4 class="wow fadeInUp">Design Skills</h4> --}}
            <div class="progress-wrapper wow fadeInUp">
              <span class="caption">{{ @$skillRecord[1]->skill }}</span>
              <div class="progress">
                <div class="progress-bar" role="progressbar"  style="width: {{ @$skillRecord[1]->percentage }}% " aria-valuenow="{{ @$skillRecord[1]->percentage }}" aria-valuemin="0" aria-valuemax="100">{{ @$skillRecord[1]->percentage }}%</div>
              </div>
            </div>
            <div class="progress-wrapper wow fadeInUp">
              <span class="caption">{{ @$skillRecord[3]->skill }}</span>
              <div class="progress">
                <div class="progress-bar" role="progressbar"  style="width: {{ @$skillRecord[3]->percentage }}% " aria-valuenow="{{ @$skillRecord[3]->percentage }}" aria-valuemin="0" aria-valuemax="100">{{ @$skillRecord[3]->percentage }}%</div>
              </div>
            </div>
            {{-- <div class="progress-wrapper wow fadeInUp">
              <span class="caption">{{ @$skillRecord[5]->skill }}</span>
              <div class="progress">
                <div class="progress-bar" role="progressbar"  style="width: {{ @$skillRecord[5]->percentage }}% " aria-valuenow="{{ @$skillRecord[5]->percentage }}" aria-valuemin="0" aria-valuemax="100">{{ @$skillRecord[5]->percentage }}%</div>
              </div>
            </div> --}}
          </div>
        </div>
      </div> <!-- End skills -->
      <!-- Resume -->
      <div class="container pt-5" id="education">
        <div class="row">
          <div class="col-md-6 wow fadeInRight">
            <h2 class="fg-dark">Education</h2>
            <ul class="timeline mt-4 pr-md-5">
              <li>
                <div class="title">{{ @$educationRecord[0]->periode_pt}}</div>
                <div class="details">
                  <h5>Perguruan Tinggi</h5>
                  <small class="fg-theme">{{ @$educationRecord[0]->perguruan_tinggi}}</small> 
                </div>
              </li>
              <li>
                <div class="title">{{ @$educationRecord[0]->periode_sma}}</div>
                <div class="details">
                  <h5>Sekolah Menengah Atas</h5>
                  <small class="fg-theme">{{ @$educationRecord[0]->sma}}</small>
                </div>
              </li>
  
              <li>
                <div class="title">{{ @$educationRecord[0]->periode_smp}}</div>
                <div class="details">
                  <h5>Sekolah Menengah Pertama</h5>
                  <small class="fg-theme">{{ @$educationRecord[0]->smp}}</small>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-md-6 wow fadeInRight" data-wow-delay="200ms" id="experience">
            <h2 class="fw-normal">Experience</h2>
            <ul class="timeline mt-4 pr-md-5">
              <li>
                <div class="title">{{ @$experienceRecord[0]->periode}}</div>
                <div class="details">
                  <h5>{{ @$experienceRecord[0]->organisasi}}</h5>
                  <small class="fg-theme">{{ @$experienceRecord[0]->jabatan}} {{ @$experienceRecord[0]->bidang}} </small>
                  <p>{{ @$experienceRecord[0]->keterangan}}</p>
                </div>
              </li>
              <li>
                <div class="title">{{ @$experienceRecord[1]->periode}}</div>
                <div class="details">
                  <h5>{{ @$experienceRecord[1]->organisasi}}</h5>
                  <small class="fg-theme">{{ @$experienceRecord[1]->jabatan}} {{ @$experienceRecord[1]->bidang}} </small>
                  <p>{{ @$experienceRecord[1]->keterangan}}</p>
                </div>
              </li>
              <li>
                <div class="title">{{ @$experienceRecord[2]->periode}}</div>
                <div class="details">
                  <h5>{{ @$experienceRecord[2]->organisasi}}</h5>
                  <small class="fg-theme">{{ @$experienceRecord[2]->jabatan}} {{ @$experienceRecord[2]->bidang}} </small>
                  <p>{{ @$experienceRecord[2]->keterangan}}</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div> <!-- End resume -->
    </div> <!-- End page about -->
    


    <!-- Portfolio page -->
    <div class="vg-page page-portfolio" id="portfolio">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <div class="badge badge-subhead">Portfolio</div>
        </div>
        <h1 class="text-center fw-normal wow fadeInUp">See my work</h1>
  
        <div class="gridder my-3">
          @foreach($portfolioRecord as $value)
          <div class="grid-item apps wow zoomIn">
            <div class="img-place" data-src="{{ url('public/portfolio/'.$value->image) }}" data-fancybox data-caption="<h5 class='fg-theme'>{{ $value->title }}</h5>">
              <img src="{{ url('public/portfolio/'.$value->image) }}"  alt="">
              <div class="img-caption">
                <h5 class="fg-theme">{{ $value->title }}</h5>
  
              </div>
            </div>
          </div>
          @endforeach
       </div>
  
    </div> <!-- End Portfolio page -->
    
 
    

  <!-- Footer -->
  <div class="vg-footer">
    <h1 class="text-center">Personal Portfolio Website</h1>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 py-3">
          <div class="footer-info">
            <p>Where to find me</p>
            <hr class="divider">
            <p class="fs-large fg-white">{{ @$aboutRecord[0]->address }}</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 py-3">
        </div>
        <div class="col-md-6 col-lg-3 py-3">
          <div class="float-lg-right">
            <p>Contact me</p>
            <hr class="divider">
            <ul class="list-unstyled">
              <li>{{ @$aboutRecord[0]->email }}</li>
              <li>{{ @$aboutRecord[0]->phone }}</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row justify-content-center mt-3">

        <div class="col-12">
          <p class="text-center mb-0 mt-4">Copyright &copy;2023. All right reserved | Personal Portfolio Website <span class="ti-heart fg-theme-red"></span></p>
        </div>
      </div>
    </div>
  </div> <!-- End footer -->
  
  
  <script src="{{ url('public/assets2/js/jquery-3.5.1.min.js') }}"></script>
  
  <script src="{{ url('public/assets2/js/bootstrap.bundle.min.js') }}"></script>
  
  <script src="{{ url('public/assets2/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
  
  <script src="{{ url('public/assets2/vendor/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  
  <script src="{{ url('public/assets2/vendor/isotope/isotope.pkgd.min.js') }}"></script>
  
  <script src="{{ url('public/assets2/vendor/nice-select/js/jquery.nice-select.min.js') }}"></script>
  
  <script src="{{ url('public/assets2/vendor/fancybox/js/jquery.fancybox.min.js') }}"></script>

  <script src="{{ url('public/assets2/vendor/wow/wow.min.js') }}"></script>

  <script src="{{ url('public/assets2/vendor/animateNumber/jquery.animateNumber.min.js') }}"></script>

  <script src="{{ url('public/assets2/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  
  <script src="{{ url('public/assets2/js/google-maps.js') }}"></script>
  
  <script src="{{ url('public/assets2/js/minibar-virtual.js') }}"></script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>

</body>
</html>