<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ayman Sohag">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('backend/') }}/images/favicon.ico">

    <title>Ecommerce Solution - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend/') }}/css/vendors_css.css">
	{{-- <link rel="stylesheet" href="{{ asset('backend/css/jquery.dataTables.min.css') }}"> --}}
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend/') }}/css/style.css">
	<link rel="stylesheet" href="{{ asset('backend/') }}/css/skin_color.css">

  <style>
    .swal2-popup.swal2-toast .swal2-title {
        margin: 0.5em 1em;
        padding: 0;
        font-size: 1em;
        text-align: initial;
        color: black;
    }
    h2#swal2-title {
      color: black !important;
    }
  </style>

    @stack('style')
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

    @include('admin.layouts.includes.header')
  
  <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layouts.includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        @yield('admin')
  </div>
  <!-- /.content-wrapper -->

  @include('admin.layouts.includes.footer')

  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src="{{ asset('backend/') }}/js/vendors.min.js"></script>
  <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>	
	<script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
  <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
  <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js') }}"></script>
	<script src="{{ asset('backend/') }}/js/pages/data-table.js"></script>
  <script src="https://kit.fontawesome.com/01308a4090.js" crossorigin="anonymous"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{ asset('backend/') }}/js/template.js"></script>
	<script src="{{ asset('backend/') }}/js/pages/dashboard.js"></script>

  <script>
    let _token = '{!! csrf_token() !!}';
    function notification(type, message){
        Swal.fire({
            position: 'top-end',
            toast: true,
            icon: type,
            title: message,
            showConfirmButton: false,
            timer: 1500
        })
    }
    $(document).ready(function () {
      @if (session('success'))
       notification('success', "{{ session('success') }}");
      @endif
    });
  </script>

  @stack('script')
	
	
</body>
</html>
