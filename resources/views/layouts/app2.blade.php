<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
      E-Work BD
  </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('backend/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('backend/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- Toastr css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <!-- Sweetalert css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.css">
  <!-- Custom css -->
  <link rel="stylesheet" href="{{asset('backend/custom/style.css') }}">

  <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css ') }}">

    <style>
    .nav-pills .nav-link {
    color: #f5f5f5;
    }
    .nav-pills .nav-link:not(.active):hover {
        color: #e2fb10;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        background-color: #d8f1057a;
    }

    .nav-pills .nav-link {
        color: #fff;
    }

    [class*=sidebar-dark-] {
    background-color: #28a745;
    }

    [class*=sidebar-dark-] .sidebar a {
    color: #fff;
    }

    [class*=sidebar-dark] .user-panel {
    border-bottom: 1px solid #fff;
  }
  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
 		<!-- <h4 style="text-align: center; margin:0 auto; color: white;">Welcome Mazid Cavel TV Connection</h4> -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
                @csrf
          <a class="nav-link text-light" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                          this.closest('form').submit();">
                         <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
          </a>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="#" class="brand-link">
      <img  src="{{ asset('backend/dist/img/logo.PNG')}}" class="img-fluid" alt="Logo" style="opacity: .8">
    </a>
 -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info" style="display: inline-block; padding: 5px 5px 5px 61px;">
          <a href="#" class="d-block"><span>Hellow! {{ Auth::user()->name }}</span></a></a>
        </div>
      </div>
            @php
              $myadminrole=Auth::user()->adminrole;
            @endphp

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if($myadminrole=='27')
                <li class="nav-item menu-open ">
              <a href="{{ route('dashboard') }}" class="nav-link {{(request()->route()->getName()=='dashboard')?'active':''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</i>
                </p>
              </a>
            </li>
                @endif
            

           

             <li class="nav-item">
              <a href="#" class="nav-link 
               {{(request()->route()->getName()=='customer.index')?'active':''}}
               {{(request()->route()->getName()=='customer.create')?'active':''}}
               {{(request()->route()->getName()=='customer.edit')?'active':''}}
              ">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  @if($myadminrole=='27')
                  <p>Customer<i class="right fas fa-angle-right"></i></p>
                  @else
                  <p>Profile<i class="right fas fa-angle-right"></i></p>
                  @endif
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('customer.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    @if($myadminrole=='27')
                      <p> Customer Add</p>
                    @else
                      <p>Add Profile</p>
                     @endif
                  </a>
              </li>
              @if($myadminrole=='27')
                <li class="nav-item">
                  <a href="{{ route('customer.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Customer</p>
                  </a>
                </li>
                @endif
              </ul>
            </li>
<!-- 
            <li class="nav-item">
              <a href="#" class="nav-link 
               {{(request()->route()->getName()=='category.create')?'active':''}}
              ">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>Category<i class="right fas fa-angle-right"></i></p>
              </a>
              <ul class="nav nav-treeview">
                @if($myadminrole=='27')
                <li class="nav-item">
                  <a href="{{ route('category.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Category</p>
                  </a>
                </li>
                @endif
              </ul>
            </li> -->


            <!-- <li class="nav-item">
              <a href="#" class="nav-link 
               {{(request()->route()->getName()=='division.create')?'active':''}}
               {{(request()->route()->getName()=='district.create')?'active':''}}
              ">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>Area<i class="right fas fa-angle-right"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('division.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Division</p>
                  </a>
              </li>
               <li class="nav-item">
                  <a href="{{ route('district.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>District</p>
                  </a>
                </li>
                 <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Thana</p>
                  </a>
                </li>
              </ul>
            </li> -->


            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                      @csrf
                <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                this.closest('form').submit();">
                               <i class="nav-icon fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>
              </form>
            </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  @yield('content')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<!-- <script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script> -->
<!-- Sparkline -->
<!-- <script src="{{asset('backend/plugins/sparklines/sparkline.js')}}"></script> -->
<!-- JQVMap -->
<script src="{{asset('backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script> -->
<!-- Summernote -->
<script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script> -->
<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Toastr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Sweetalert js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/dist/js/pages/dashboard3.js ') }}"></script>

<!-- data table -->
<!-- DataTables  & Plugins -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js ') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js ') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js ') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js ') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js ') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js ') }}"></script>
<script src="{{ asset('backend/plugins/jszip/jszip.min.js ') }}"></script>
<script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js ') }}"></script>
<script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js ') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js ') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js ') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js ') }}"></script>

<!-- start Brand img -->
<script>
  $(document).ready(function(){
      $('#image').change(function(event){
          var reader = new FileReader();
          reader.onload = function(event){
              $('#showImage').attr('src',event.target.result);
          }
          reader.readAsDataURL(event.target.files['0']);
      });
  });
</script>


<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



<script type="text/javascript">
  // Package Section Start //
  @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
  @endif

   @if(Session::has('info'))
    toastr.info("{{Session::get('info')}}");
  @endif
</script>
<!-- skummernote -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#content').summernote();
  });
</script>
<!-- fade show -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.post_show').fadeToggle(5000);
  });

  $(document).ready(function(){
    $('.tag_show').fadeToggle(5000);
  });
</script>

<!-- sweetalerat link -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- sweetalerat delete data -->
<!-- <script type="text/javascript">
$(function(){
  $(document).on('click','#del',function(e){
    e.preventDefault();
    var link = $(this).attr("href");

  Swal.fire({
  title: 'Are you sure?',
  text: "Delete This Data!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

  });
});
</script> -->
<!-- disqus -->
<script id="dsq-count-scr" src="//magazine-13.disqus.com/count.js" async></script>

@stack('footer-script')
</body>
</html>
