

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" wire:model="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
 
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('images/pg.jpg')}}" alt="PGC Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PGC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/{{'storage/profile/'.Auth::user()->passport}}" class="brand-image img-circle elevation-3" alt="User Image">
        </div>
        <div class="info">
          <a href="/profile" class="d-block"><i class="fa fa-circle text-success"></i> {{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/profile" class="nav-link">
                  <i class="fas fa-edit nav-icon"></i>
                  <p>My Profile</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/create" class="nav-link">
                  <i class="fas fa-comment nav-icon"></i>
                  <p>Create Message</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/inbox" class="nav-link active">
                  <i class="fas fa-comments nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/archives" class="nav-link">
                  <i class="fas fa-archive nav-icon"></i>
                  <p>Archives</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/sent" class="nav-link">
                  <i class="fas fa-file-export nav-icon"></i>
                  <p>Sent</p>
                </a>
              </li>
              @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
              <li class="nav-item">
                <a href="/incoming" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              @endif
              <li class="nav-item">

                    <livewire:logout />
                
              </li>
            </ul>
          </li>
        
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inbox</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> All Messages </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
  </div>

    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-12">
         
          <!-- /.card -->
            @if(session()->has('message'))
            <div class="alert alert-success"><span class='closebtn' onclick='this.parentElement.style.display="none";'>&times;</span>
                {{session('message')}}
            </div>
            @endif
          <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
            @if(count($users) == 0)
                <p style="text-align: center;">You have no message yet</p>
            @else
          <div class="table-responsive">
            <table id="" class="table">
                <thead>
                <tr>
                  <th>From </th>
                  <th>Subject</th>
                  <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                 
                @foreach($users as $user)
                @if($user->message_status == 0)
                 <tr style="background-color: rgb(235, 230, 230);">
                  <td><a href="/read/{{$user->id}}" style="text-decoration: none; color:black">{{$user->sender}}</a></td>
                  <td><a href="/read/{{$user->id}}" style="text-decoration: none; color:black">{{substr($user->subject, 0, 200)}}</a></td>
                  <td class="text-center"><i class="fa fa-archive" wire:click='archive({{$user->id}})' style="cursor: pointer;"></i>&nbsp; &nbsp;&nbsp; &nbsp; <i class="fa fa-trash text-danger" wire:click="remove({{$user->id}})" style="cursor: pointer;"></i> </td>
                </tr>
                @else
                <tr>
                  <td><a href="/read/{{$user->id}}" style="text-decoration: none;">{{$user->sender}}</a></td>
                  <td><a href="/read/{{$user->id}}" style="text-decoration: none;">{{substr($user->subject, 0, 200)}}</a></td>
                  <td class="text-center"><i class="fa fa-archive" wire:click='archive({{$user->id}})' style="cursor: pointer;"></i>&nbsp; &nbsp;&nbsp; &nbsp; <i class="fa fa-trash text-danger" wire:click="remove({{$user->id}})" style="cursor: pointer;"></i> </td>
                </tr>
                @endif
                @endforeach
              
                </tbody>
                
              </table>
              {{ $users->links() }}
              </div>
                @endif
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
    <strong>Copyright &copy; <?php echo date("Y")?> <a href="https://www.pgcollege.ui.edu.ng" target="_blank">PGC</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


