<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../img/logo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">My Blog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../img/logo.jpeg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <router-link :to="{name: 'Admin.Dashboard'}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt blue"></i>
              <p>
                Dashboard
              </p>
            </router-link>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-cog green"></i>
              <p>
                User Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name: 'Admin.User'}" class="nav-link">
                  <i class="fas fa-users nav-icon "></i>
                  <p>Users</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <router-link :to="{name: 'Admin.Category'}" class="nav-link">
              <i class="nav-icon fas fa-mercury teal"></i>
              <p>
                Category
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{name: 'Admin.SubCategory'}" class="nav-link">
              <i class="nav-icon fas fa-venus-double purple"></i>
              <p>
                Sub Category
              </p>
            </router-link>
          </li>
          <!-- <li class="nav-item">
            <router-link :to="{name: 'Admin.Post'}" class="nav-link">
              <i class="nav-icon  fab fa-megaport blue"></i>
              <p>
                Post
              </p>
            </router-link>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-plus-square-o blue"></i>
              <p>
                Post Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link :to="{name: 'Admin.Post'}" class="nav-link">
                  <i class="nav-icon fa fa-th pink"></i>
                  <p>All Posts</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link :to="{name: 'Admin.PostPending'}" class="nav-link">
                  <i class="fas fa-check-square orange nav-icon "></i>
                  <p>Pending Posts</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link :to="{name: 'Admin.PostApproved'}" class="nav-link">
                  <i class="nav-icon fas fa-check success"></i>
                  <p>Approved Posts</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <router-link :to="{name: 'Admin.Developer'}" class="nav-link">
              <i class="nav-icon fa fa-user orange"></i>
              <p>
                Developer
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{name: 'Admin.Profile'}" class="nav-link">
              <i class="nav-icon fa fa-user orange"></i>
              <p>
                Profile
              </p>
            </router-link>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                 <i class="nav-icon fas fa-power-off red"></i>
                 <p>
                  {{ __('Logout') }}
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