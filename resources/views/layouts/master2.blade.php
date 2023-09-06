<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin, dashboard">
	<meta name="author" content="Soeng Souy">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Soeng Souy : Admin Template">
	<meta property="og:title" content="Soeng Souy : Admin Template">
	<meta property="og:description" content="Soeng Souy:Admin Template">
	<meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	<!-- PAGE TITLE HERE -->
    <title>SynopticXpress - Synops control</title>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/image/png" href="{{URL::to('img/Logoc.png')}}" />
	<!-- <link rel="shortcut icon" type="image/png" href="{{URL::to('assets/images/favicon.png')}}"> -->
	<link href="{{URL::to('assets/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{URL::to('assets/vendor/nouislider/nouislider.min.css')}}">
	<!-- Datatable -->
	<link href="{{URL::to('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<!-- Custom Stylesheet -->
	<link href="{{URL::to('assets/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<!-- Style css -->
    <link href="{{URL::to('assets/css/style.css')}}" rel="stylesheet">
	
	{{-- message toastr --}}
	<link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
	<script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
	
</head>
<style>
	ul.nav.nav-pills li a {
  		color: #000080;
		font-weight: bold;
		}
	.username{
		color:#2F4F4F;
	}

</style>
<body>

    <!-- Preloader start -->
    <div id="preloader">
        <div class="waviy">
		   <span style="--i:1">L</span>
		   <span style="--i:2">o</span>
		   <span style="--i:3">a</span>
		   <span style="--i:4">d</span>
		   <span style="--i:5">i</span>
		   <span style="--i:6">n</span>
		   <span style="--i:7">g</span>
		   <span style="--i:8">.</span>
		   <span style="--i:9">.</span>
		   <span style="--i:10">.</span>
		</div>
    </div>
    <!-- Preloader end -->
	

    <!-- Main wrapper start -->
    <div id="main-wrapper">
       
	<div class="container-fluid ">
    <div class="row flex-nowrap" >
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light" style="font-size:large;position:fixed;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/home" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">
						<img src="{{URL::to('img/logoWB.png')}}" width=200 />
					</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="/home" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/UserMessages/table" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Manage Messages</span></a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{URL::to('img/user.png')}}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="username d-sm-inline mx-1"><div>{{ Auth::user()->name }}</div></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
						<li>
						<form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
						</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
            <!-- Content body start -->
        		@yield('content')
        	<!-- Content body end -->
        </div>
    </div>
</div>


	</div>
    <!-- Main wrapper end -->

    <!-- Scripts -->
    <!-- Required vendors -->
    <script src="{{URL::to('assets/vendor/global/global.min.js')}}"></script>
	<script src="{{URL::to('assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{URL::to('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	<!-- Apex Chart -->

	<!-- Datatable -->
	<script src="{{URL::to('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::to('assets/js/plugins-init/datatables.init.js')}}"></script>

	<script src="{{URL::to('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

	<script src="{{URL::to('assets/vendor/apexchart/apexchart.js')}}"></script>
	<script src="{{URL::to('assets/vendor/nouislider/nouislider.min.js')}}"></script>
	<script src="{{URL::to('assets/vendor/wnumb/wNumb.js')}}"></script>
	<!-- Dashboard 1 -->
	<script src="{{URL::to('assets/js/dashboard/dashboard-1.js')}}"></script>
    <script src="{{URL::to('assets/js/custom.min.js')}}"></script>
	<script src="{{URL::to('assets/js/dlabnav-init.js')}}"></script>
	<script src="{{URL::to('assets/js/demo.js')}}"></script>
    <script src="{{URL::to('assets/js/styleSwitcher.js')}}"></script>
	@yield('script')
</body>
</html>