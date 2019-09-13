    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/divoffadmin/admin/index">
        <div class="sidebar-brand-icon">
<!--          <i class="fas fa-laugh-wink"></i>-->
            <img style="height: 50px; width:50px; border-radius: 50%;" src="/divoffadmin/admin/resources/img/background_divoff.png">
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: 70%;">SDO Rizal Personnel Section</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="/divoffadmin/admin/index">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

<?php // if($_SERVER['PHP_SELF'] !== '/divoffadmin/admin/index.php') { ?>
<!--       <li class="nav-item">
        <a class="nav-link" href="employees.php">
          <i class="fas fa-users"></i>
          <span>Employees</span></a>
      </li> -->

    <?php // } ?>  


<?php // if($_SERVER['PHP_SELF'] !== '/divoffadmin/admin/index.php') { ?>
      <li class="nav-item">
        <a class="nav-link" href="/divoffadmin/admin/categories/employees">
          <i class="fas fa-users"></i>
          <span>Employees</span></a>
      </li>

    <?php // } ?>      

      <li class="nav-item">
        <a class="nav-link" href="/divoffadmin/admin/add_employee">
          <i class="fas fa-user-plus"></i>
          <span>Add Employee</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/divoffadmin/admin/search_count">
          <i class="fas fa-search"></i>
          <span>Search</span></a>
      </li> 

      <li class="nav-item">
        <a class="nav-link" href="/divoffadmin/admin/gen_all_pdf">
          <i class="fas fa-download"></i>
          <span>Generate Copies</span></a>
      </li>     

      <li class="nav-item">
        <a class="nav-link" href="/divoffadmin/admin/set_service_record">
          <i class="fas fa-user"></i>
          <span>Service Record</span></a>
      </li>             

      <li class="nav-item">
        <a class="nav-link" href="/divoffadmin/admin/backuptables">
          <i class="fas fa-save"></i>
          <span>Import &amp; Export Data</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/divoffadmin/admin/manage_account">
          <i class="fas fa-user"></i>
          <span>Manage Account</span></a>
      </li>      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
<!--       <div class="sidebar-heading">
        Interface
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
<!--       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>My Details</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="buttons.html">Service Record</a>
            <a class="collapse-item" href="cards.html">Service Card</a>
          </div>
        </div>
      </li>  -->



      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Divider -->
      <!-- <hr class="sidebar-divider d-none d-md-block"> -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>