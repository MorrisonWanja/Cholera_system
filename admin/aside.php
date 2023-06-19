
	<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fa fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">OCPMS</a>
        <div id="close-sidebar">
          <i class="fa fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="http://127.0.0.1/OCPMS/img/user.jpg" alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">
            <strong><?php if(isset($admin_name)){ echo $admin_name; } ?></strong>
          </span>
          <span class="user-role">Administrator</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li class="sidebar-dropdown active">
            <a href="#">
              <i class="fa fa-hospital-o"></i>
              <span>Hospital</span>
            </a>
            <div class="sidebar-submenu" style="display: block;">
              <ul>
                <li>
                  <a href="http://127.0.0.1/OCPMS/admin/add-hospital/">Add Hospital
                    
                  </a>
                </li>
                <li>
                  <a href="http://127.0.0.1/OCPMS/admin/hospitals/">Hospitals</span></a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-medkit"></i>
              <span>Doctor</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="http://127.0.0.1/OCPMS/admin/add-doctor/">Add doctor</a>
                </li>
                <li>
                  <a href="http://127.0.0.1/OCPMS/admin/doctors/">Doctors</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-ambulance"></i>
              <span>Patient</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="http://127.0.0.1/OCPMS/admin/add-patient/">Add patient</a>
                </li>
                <li>
                  <a href="http://127.0.0.1/OCPMS/admin/patients/">Patient</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Admin</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="http://127.0.0.1/OCPMS/admin/add-admin/">Add Admin</a>
                </li>
                <li>
                  <a href="http://127.0.0.1/OCPMS/admin/admins/">Admins</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="http://127.0.0.1/OCPMS/admin/daily-updates/">
              <i class="fa fa-bell"></i>
              <span>Daily Updates</span>
            </a>
            
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="http://127.0.0.1/OCPMS/admin/add-admin/logout.php">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>