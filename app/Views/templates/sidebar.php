 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

         <div class="sidebar-brand-text mx-3">
             <img src="/img/logo.png" height="25" alt="MDB Logo" loading="lazy" />
         </div>
     </a>

     <!-- Divider -->

     <!-- User Status section -->
     <div class="nav-item w-50 pt-2 ml-4 mb-5 d-flex flex-column align-items-center justify-content-center">
         <img class="img-profile rounded-circle img-fluid" src="<?= base_url('img/' . user()->user_image); ?>">

         <div class="mt-2 mx-2 text-center mt-auto text-md-start">
             <span class="text-light"><?= user()->username; ?></span>
             <span class="badge badge-success">online</span>
         </div>
     </div>
     <!-- end of user status section -->








     <!-- Divider -->
     <hr class="sidebar-divider">



     <?php if (in_groups('Admin')) : ?>
         <!-- ADMIN -->
         <!-- Heading -->
         <div class="sidebar-heading">
             User List
         </div>



         <!-- Nav Item - Admin -->
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('Admin'); ?>">
                 <i class="fas fa-fw fa-users"></i>
                 <span>List</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">



     <?php endif ?>



     <!-- USER -->

     <!-- Heading -->
     <div class="sidebar-heading">
         User Profile
     </div>

     <!-- Nav Item - User -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('user'); ?>">
             <i class="fas fa-fw fa-user"></i>
             <span>My Profile</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('User/Edit'); ?>">
             <i class="fas fa-fw fa-address-book"></i>
             <span>Edit Profile</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">
     <div class="sidebar-heading">
         Menu
     </div>
     </li>
     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="/performance">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Performance</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">



     <!-- Nav Item - logout -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('logout'); ?>">
             <i class="fas fa-fw fa-sign-out-alt"></i>
             <span>Logout</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">



     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>




 </ul>
 <!-- End of Sidebar -->