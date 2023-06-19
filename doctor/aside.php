
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
            <strong><?php if(isset($doctor_name)){ echo $doctor_name; } echo $doctor_id;?></strong>
          </span>
          <span class="user-role">Doctor</span>
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
              <i class="fa fa-ambulance"></i>
              <span>Patient</span>
            </a>
            <div class="sidebar-submenu" style="display: block;">
              <ul>
                <li>
                  <a href="http://127.0.0.1/OCPMS/doctor/add-patient/">Add patient</a>
                </li>
                <li>
                  <a href="http://127.0.0.1/OCPMS/doctor/patients/">Patient</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-envelope"></i>
              <span>Mesages</span>
			  <?php 
				$status = '0'; $sender = 'Patient'; $no_messages = $msg->countUnread($doctor_id,$status,$sender);
				if($no_messages > 0){ ?><span class="badge-sonar" style="margin-top:10px;"></span><?php } ?>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="http://127.0.0.1/OCPMS/doctor/messages/">New Messages <span class="badge badge-pill badge-success notification"><?php  echo $no_messages; ?></span></a>
                </li>
                <li>
                  <a href="http://127.0.0.1/OCPMS/doctor/read-messages/">Read Messages <span class="badge badge-pill badge-warning notification"><?php $status = '1'; $sender = 'Patient'; $red_no_messages = $msg->countUnread($doctor_id,$status,$sender);  echo $red_no_messages; ?></span></a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="http://127.0.0.1/OCPMS/doctor/daily-updates/">
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
      <a href="../messages/">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification"><?php  echo $no_messages; ?></span>
      </a>
      <a href="http://127.0.0.1/OCPMS/doctor/logout.php">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>