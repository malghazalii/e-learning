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
       <i class="fas fa-fw fa-layer-group"></i>
       <span>Data Siswa</span></a>
     </li>
     <!-- Divider -->
     <!-- Nav Item - Tables -->
     <?php if ($title == 'Data Guru') : ?>
       <li class="nav-item active">
       <?php else : ?>
       <li class="nav-item">
       <?php endif; ?>
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         <i class="fas fa-fw fa-layer-group"></i>
         <span>Data Guru</span>
       </a>
       <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
           <h6 class="collapse-header">Data Guru:</h6>
           <?php if ($title == 'Guru') : ?>
             <a class="collapse-item active" href="<?= base_url('Admin/Dataguru'); ?>">Guru</a>
           <?php else : ?>
             <a class="collapse-item" href="<?= base_url('Admin/Dataguru'); ?>">Guru</a>
           <?php endif; ?>
           <?php if ($title == 'Guru Mengajar') : ?>
             <a class="collapse-item active" href="<?= base_url('Admin/GuruMengajar'); ?>">Guru Mengajar</a>
           <?php else : ?>
             <a class="collapse-item" href="<?= base_url('Admin/GuruMengajar'); ?>">Guru Mengajar</a>
           <?php endif; ?>
         </div>
       </div>
       </li>

       <!-- Nav Item - Dashboard -->
       <?php if ($title == 'Data Mapel') : ?>
         <li class="nav-item active">
         <?php else : ?>
         <li class="nav-item">
         <?php endif; ?>
         <a class="nav-link" href="<?= base_url('Admin/mapel'); ?>">
           <i class="fas fa-fw fa-book"></i>
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
           <?php if ($title == 'Tahun Angkatan') : ?>
             <li class="nav-item active">
             <?php else : ?>
             <li class="nav-item">
             <?php endif; ?>
             <a class="nav-link" href="<?= base_url('Admin/tahunangkatan'); ?>">
               <i class="fas fa-fw fa-folder"></i>
               <span>Tahun Angkatan</span></a>
             </li>
             <!-- Nav Item - Dashboard -->
             <?php if ($title == 'Wali Kelas') : ?>
               <li class="nav-item active">
               <?php else : ?>
               <li class="nav-item">
               <?php endif; ?>
               <a class="nav-link" href="<?= base_url('Admin/walikelas'); ?>">
                 <i class="fas fa-fw fa-chalkboard-teacher"></i>
                 <span>Wali Kelas</span></a>
               </li>

               <!-- Divider -->
               <hr class="sidebar-divider">

               <?php if ($title == 'Absensi Guru') : ?>
                 <li class="nav-item active">
                 <?php else : ?>
                 <li class="nav-item">
                 <?php endif; ?>
                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                   <i class="fas fa-fw fa-folder"></i>
                   <span>Absensi Guru</span>
                 </a>
                 <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                   <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Absensi Guru:</h6>
                     <?php if ($title == 'Absensi Guru') : ?>
                       <a class="collapse-item active" href="<?= base_url('Admin/Absensi_Guru'); ?>">Aktif/NonAktif</a>
                     <?php else : ?>
                       <a class="collapse-item" href="<?= base_url('Admin/Absensi_Guru'); ?>">Aktif/NonAktif</a>
                     <?php endif; ?>
                     <?php if ($title == 'Absensi Guru PNS') : ?>
                       <a class="collapse-item active" href="<?= base_url('Admin/Dataabsenpns'); ?>">Absensi Guru PNS</a>
                     <?php else : ?>
                       <a class="collapse-item" href="<?= base_url('Admin/Dataabsenpns'); ?>">Absensi Guru PNS</a>
                     <?php endif; ?>
                     <?php if ($title == 'Absensi Guru Non PNS') : ?>
                       <a class="collapse-item active" href="<?= base_url('Admin/Dataabsengtt'); ?>">Absensi Guru GTT</a>
                     <?php else : ?>
                       <a class="collapse-item" href="<?= base_url('Admin/Dataabsengtt'); ?>">Absensi Guru GTT</a>
                     <?php endif; ?>
                   </div>
                 </div>
                 </li>
                 <!-- Sidebar Toggler (Sidebar) -->
                 <div class="text-center d-none d-md-inline">
                   <button class="rounded-circle border-0" id="sidebarToggle"></button>
                 </div>

 </ul>
 <!-- End of Sidebar -->