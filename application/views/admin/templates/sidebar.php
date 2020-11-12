    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider ">

      <!-- Query Menu -->
      <?php
      $role_id = $this->session->userdata('role_id');

      $queryMenu = "SELECT `user_menu`.`id`, `menu` FROM `user_menu` JOIN `user_access_menu` 
      ON `user_menu`.`id` = `user_access_menu`.`menu_id` WHERE `user_access_menu`.`role_id` = $role_id
      ORDER BY `user_access_menu`.`menu_id` ASC";

      $menu = $this->db->query($queryMenu)->result_array();

      ?>

      <!-- Heading -->
      <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
          <?= $m['menu']; ?>
        </div>

        <!-- SUB MENU -->
        <?php
        $menuID = $m['id'];
        $querySubMenu = "SELECT * FROM `user_sub_menu` WHERE `menu_id` = $menuID AND `is_active` = 1";

        $Submenu = $this->db->query($querySubMenu)->result_array();
        ?>
        <!-- Nav Item - Dashboard -->
        <?php foreach ($Submenu as $S) : ?>
          <?php if ($title == $S['title']) : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url($S['url']); ?>">
              <i class="<?= $S['icon']; ?>"></i>
              <span><?= $S['title']; ?></span></a>
            </li>
          <?php endforeach; ?>
          <!-- Divider -->
          <hr class="sidebar-divider">
        <?php endforeach; ?>


        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="logged out" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Log Out</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->