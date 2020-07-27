<!-- Sidebar -->
<ul class="sidebar navbar-nav bg-dark pt-2">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>"> <!-- Mengecek segmen URL aktif atau tidak -->
        <a class="nav-link" href="<?php echo site_url('admin') ?>"><i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item pt-2 <?php echo $this->uri->segment(2) == 'reports' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/reports') ?>"><i class="fab fa-teamspeak"></i></i>
        <span>Reports</span></a>
    </li>
</ul>