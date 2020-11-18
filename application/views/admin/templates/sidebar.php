 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
     <img style="width: 60px; height:60px;" src="<?= base_url('assets/admin/img/logosekolah.gif'); ?>">
     <div class="sidebar-brand-text mx-3">Siakad Admin</div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider my-0">

   <!-- Nav Item - Tables -->
   <li class="nav-item active">
     <a class="nav-link" href="<?= base_url('Admin/datasiswa'); ?>">
       <i class="fas fa-fw fa-table"></i>
       <span>Data Siswa</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

   <!-- Nav Item - Tables -->
   <li class="nav-item active">
     <a class="nav-link" href="<?= base_url('Admin/dataguru'); ?>">
       <i class="fas fa-fw fa-table"></i>
       <span>Data Guru</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

   <!-- Nav Item - Dashboard -->
   <li class="nav-item active">
     <a class="nav-link" href="<?= base_url('Admin/mapel'); ?>">
       <i class="fas fa-fw fa-folder"></i>
       <span>Data Mapel</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider d-none d-md-block">

   <!-- Nav Item - Dashboard -->
   <li class="nav-item active">
     <a class="nav-link" href="<?= base_url('Admin/walikelas'); ?>">
       <i class="fas fa-fw fa-folder"></i>
       <span>Wali Kelas</span></a>
   </li>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
     <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>

 </ul>
 <!-- End of Sidebar -->