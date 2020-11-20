 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
     <img style="width: 60px; height:60px;" src="<?= base_url('assets/admin/img/logosekolah.gif'); ?>">
     <div class="sidebar-brand-text mx-3">Siakad Admin</div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Nav Item - Tables -->
   <div class="sidebar-heading">Data Master</div>
   <?php if ($title == 'Data Siswa') : ?>
     <li class="nav-item active">
     <?php else : ?>
     <li class="nav-item">
     <?php endif; ?>
     <a class="nav-link" href="<?= base_url('Admin/datasiswa'); ?>">
       <i class="fas fa-fw fa-table"></i>
       <span>Data Siswa</span></a>
     </li>
     <!-- Divider -->
     <!-- Nav Item - Tables -->
     <?php if ($title == 'Data Guru') : ?>
       <li class="nav-item active">
       <?php else : ?>
       <li class="nav-item">
       <?php endif; ?>
       <a class="nav-link" href="<?= base_url('Admin/dataguru'); ?>">
         <i class="fas fa-fw fa-table"></i>
         <span>Data Guru</span></a>
       </li>

       <!-- Nav Item - Dashboard -->
       <?php if ($title == 'Data Mapel') : ?>
         <li class="nav-item active">
         <?php else : ?>
         <li class="nav-item">
         <?php endif; ?>
         <a class="nav-link" href="<?= base_url('Admin/mapel'); ?>">
           <i class="fas fa-fw fa-folder"></i>
           <span>Mata Pelajaran</span></a>
         </li>
         <!-- Nav Item - Dashboard -->
         <?php if ($title == 'Kelas') : ?>
           <li class="nav-item active">
           <?php else : ?>
           <li class="nav-item">
           <?php endif; ?>
           <a class="nav-link" href="<?= base_url('Admin/kelas'); ?>">
             <i class="fas fa-fw fa-folder"></i>
             <span>Kelas</span></a>
           </li>
           <!-- Nav Item - Dashboard -->
           <?php if ($title == 'Wali Kelas') : ?>
             <li class="nav-item active">
             <?php else : ?>
             <li class="nav-item">
             <?php endif; ?>
             <a class="nav-link" href="<?= base_url('Admin/walikelas'); ?>">
               <i class="fas fa-fw fa-folder"></i>
               <span>Wali Kelas</span></a>
             </li>

             <!-- Divider -->
             <hr class="sidebar-divider">

             <!-- Nav Item - Tables -->
             <div class="sidebar-heading">Absensi Guru</div>
             <?php if ($title == 'Absensi guru') : ?>
               <li class="nav-item active">
               <?php else : ?>
               <li class="nav-item">
               <?php endif; ?>
               <a class="nav-link" href="<?= base_url('Admin/datasiswa'); ?>">
                 <i class="fas fa-fw fa-table"></i>
                 <span>Absen guru</span></a>
               </li>
               <!-- Sidebar Toggler (Sidebar) -->
               <div class="text-center d-none d-md-inline">
                 <button class="rounded-circle border-0" id="sidebarToggle"></button>
               </div>

 </ul>
 <!-- End of Sidebar -->