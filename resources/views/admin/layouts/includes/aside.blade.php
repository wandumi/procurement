<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('admin/dist/img/mineworkers.png') }}"
            height="120"
            width="110"
            alt="Mine Workers"
            {{-- class="brand-image img-circle elevation-3" --}}
            style=""
            class="img-fluid mx-auto d-block">

             
        {{-- <span class="brand-text font-weight-light">
            mwpf
        </span>  --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/boxed-bg.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
                {{-- {{ auth::user()->name }} --}}
        <a href="#" class="d-block">{{ auth::user()->name ?? 'Anonymous' }}</a>
        <span style="color:white;">
             <i>{{ collect(ucwords(auth::user()->Roles()->get()->pluck('name')->first()) )->implode(', ') }}</i>
        </span> 
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library menu-open -->
          <li class="nav-item has-treeview  ">
          <a href="{{ url('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">

                <i class="nav-icon fa fa-dashboard"></i>
                <p>Dashboard</p>

            </a>

          </li>

        @role('superadministrator|administrator')

           <!-- end of RFQ -->
           <li class="nav-item">
                <a href="{{ url('rfqs') }}" class="nav-link {{ Request::is('rfqs') ? 'active' : '' }}">
                <i class="nav-icon fa fa-address-book"></i>
                <p>
                    R.F.Q
                    {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
                </a>
            </li>
            <!-- end of RFQ -->
        @endrole
        @role('superadministrator')
            <li class="nav-item">
                    <a href="{{ url('rfqresponse') }}" class="nav-link {{ Request::is('rfqresponse') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-address-book"></i>
                    <p>
                        R.F.Q Userview
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                    </a>
                  
                </li>
                <!-- end of RFQ -->
            
        @endrole
           
    
        @role('superadministrator|user')

            <li class="nav-item has-treeview ">
                
             
                <a href="{{ url('tenders','tender') }}" class="nav-link {{ Request::is('tenders/*') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-cog"></i>
                    <p>
                        Adverts
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('tenders','tender') }}" class="nav-link {{ Request::is('tenders/tender') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-address-book"></i>
                        <p>
                            Tenders
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                       
                            <a href=" {{ url('tenders','usertenders') }}" class="nav-link {{ Request::is('tenders/usertenders') ? 'active' : '' }}">
                                <i class="fa fa-users nav-icon"></i>
                                <p>View Applied</p>
                            </a>
        

                    </li>
                </ul>
            </li>
        @endrole
           

        @role('superadministrator|administrator')

                    <li class="nav-item has-treeview ">
                        <a href="{{ url('manange','users') }}" class="nav-link {{ Request::is('manage/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                Settings
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            
                                <li class="nav-item">

                                    <a href=" {{ url('manage','users') }}" class="nav-link {{ Request::is('manage/users') ? 'active' : '' }}">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                
                                </li>

                                {{-- <li class="nav-item">

                                    <a href=" {{ url('teams') }}" class="nav-link {{ setActive('teams', 'active') }} ">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>Teams</p>
                                    </a>

                                </li> --}}
                                <li class="nav-item">

                                    <a href=" {{ url('manage','roles') }}" class="nav-link {{ Request::is('manage/roles') ? 'active' : '' }}">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                
                                </li>

                                <li class="nav-item">

                                        <a href=" {{ url('manage','permissions') }}" class="nav-link {{ Request::is('manage/permissions') ? 'active' : '' }}" >
                                            <i class="fa fa-users nav-icon"></i>
                                            <p>Permissions</p>
                                        </a>
                    
                                    </li>

                            <li class="nav-item">

                                <a href=" {{ url('manage','departments') }}" class="nav-link {{ Request::is('manage/departments') ? 'active' : '' }}" >
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Departments</p>
                                </a>

                            </li>

                            @role('superadministrator')
                                <li class="nav-item">

                                    <a href=" {{ url('manage','requesttypes') }}" class="nav-link {{ Request::is('manage/requesttypes') ? 'active' : '' }}" >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Request Type</p>
                                    </a>

                                </li>
                                <li class="nav-item">

                                    <a href=" {{ url('manage','procategories') }}" class="nav-link {{ Request::is('manage/procategories') ? 'active' : '' }}" >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Procurement Category</p>
                                    </a>

                                </li>
                                <li class="nav-item">

                                    <a href=" {{ url('manage','suppliertypes') }}" class="nav-link {{ Request::is('manage/suppliertypes') ? 'active' : '' }}" >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>Supplier Types</p>
                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href=" {{ url('manage','rfqstatus') }}" class="nav-link {{ Request::is('manage/rfqstatus') ? 'active' : '' }}" >
                                    <i class="fa fa-circle nav-icon"></i>
                                    <p>RFQ Status</p>
                                    </a>

                                </li>
                            @endrole

                        </ul>

                </li>


        @endrole

          <li class="nav-item">
            <a href="{{ url('profile') }}" class="nav-link {{ Request::is('profile') ? 'active' : '' }}">
                <i class="nav-icon fa fa-user"></i>
                <p>
                Profile
                {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
            </a>
          </li>

          <li class="nav-item" style="padding-bottom: 400px;">
                <a class="nav-link" href="{{ route('logout') }}"
                            onclick="
                        if(confirm('Are you sure you want to Logout?')){
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                        }else{
                            event.preventDefault();
                        }
                            ">
                    <i class="nav-icon fa fa-power-off"></i>
                    <p>
                        Logout
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
