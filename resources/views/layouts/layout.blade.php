{{-- Admin layout --}}
<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.png') }}" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- DataTables CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/af-2.3.4/b-1.6.1/datatables.min.css"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

    <!-- DatePicker CSS/JS -->
    {{-- <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-datepicker.js') }}" defer></script> --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">

    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Fontawesome CDN --}}
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
  </head>
  <body>

    <div class="d-flex" id="wrapper">

      <!-- Sidebar -->
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"> <h4>ADMIN</h4> </div>
        <div class="list-group">
          <a href="/home" class="list-item {{ 'home' == request()->path() ? 'active' : '' }}"><i class="fa fa-home mr-2"></i> Dashboard</a>
          <a href="/department" class="list-item {{ 'department' == request()->path() ? 'active' : '' }}"><i class="fa fa-project-diagram mr-2"></i> Department</a>
          <a href="/employee" class="list-item {{ 'employee' == request()->path() ? 'active' : '' }}"><i class="fa fa-user-tie mr-2"></i> Employee</a>
          <a href="/intern" class="list-item {{ 'intern' == request()->path() ?  'active' : '' }}"><i class="fa fa-user-graduate mr-2"></i> Intern</a>
        <a href="/restore" class="list-item {{ 'restore' == request()->path() ?  'active' : '' }}"><i class="fas fa-undo"></i> Restore</a>
        </div>
      </div>
      <!-- /#sidebar-wrapper -->
  
      <!-- Page Content -->
      <div id="page-content-wrapper">
  
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom py-1">
          <button class="btn" id="menu-toggle"><i class="fa fa-bars"></i></button>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
          </ul>
        </nav>
        
        @yield('content')

      </div>
      <!-- /#page-content-wrapper -->
  
    </div>
    <!-- /#wrapper -->
  
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/af-2.3.4/b-1.6.1/datatables.min.js"></script>
  
    <!-- Menu Toggle Script -->
    <script>
      $(document).ready(function () {
          $("#menu-toggle").click(function(e) {
            e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });

        // Dashboard DataTable
        $('#dashboardTable').DataTable({
          "order": [[ 2, "desc" ]]
        });

        // Department DataTable
        $('#departmentTable').DataTable();

        // Employee DataTable
        $('#employeeTable').DataTable({
          "order": [[ 1, "asc" ]]
        });

        //Intern DataTable
        $('#internTable').DataTable({
          "order": [[ 1, "asc" ]]
        });
        
      });
     
    </script>
    @include('sweetalert::alert')
  </body>
</html>