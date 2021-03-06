
<div class="wrapper">
  <!-- Navbar -->
  <livewire:navbar />
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('images/pg.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PGC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/{{'storage/profile/'.Auth::user()->passport}}" class="img-circle elevation-2" alt="User Image">
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
                  <i class="far fa-edit nav-icon"></i>
                  <p>My Profile</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/create" class="nav-link">
                  <i class="far fa-comment nav-icon"></i>
                  <p>Create Message</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/inbox" class="nav-link">
                  <i class="far fa-comments nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/archives" class="nav-link">
                  <i class="far fa-folder nav-icon"></i>
                  <p>Archives</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/sent" class="nav-link active">
                  <i class="far fa-file nav-icon"></i>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
               
            <h1>{{$messages->subject}} : {{$messages->owner}}</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-10">
         
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-6">
                        
                        
                        <strong>To : 
                          @foreach($recipents as $user)
                          {{$user->name}} {{$user->othername}},
                          @endforeach
                        </strong>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                         {{$messages->created_at}} ({{ \Carbon\Carbon::parse($messages->created_at)->diffForHumans() }})
                         
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        
                    </div>
                </div>
                <div class="row" style="margin-bottom: 5px; padding:10px;">
                    {!! $messages->description !!}
                </div>
                
                    @if($attachments)
                    @foreach($attachments as $image)
                    <div class="row">
                      <div class="col-md-6">
                    <a href="/{{'storage/'.$image->attachment}}" class="text-success" download="Attachment"><i class="fas fa-paperclip"></i> download</a>&nbsp;&nbsp; <a href="/{{'storage/'.$image->attachment}}" target="_blank"><i class="fas fa-edit"></i> preview</a>

                      </div>
                  </div>
                  @endforeach
                    @endif
                <br>
                


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
    <strong>Copyright &copy; <?php echo date("Y")?> <a href="pgcollege.ui.edu.ng">PGC</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
