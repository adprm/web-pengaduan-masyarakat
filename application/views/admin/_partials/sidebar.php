<!-- Sidebar -->
<ul class="sidebar navbar-nav pt-2">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>"> <!-- Mengecek segmen URL aktif atau tidak -->
        <a class="nav-link" href="<?php echo site_url('admin') ?>"><i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- start -->
    <li class="nav-item dropdown pt-2 <?php echo $this->uri->segment(2) == 'infos'? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-school"></i>
            <span>Academy</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item pt-3" href="<?php echo site_url('admin/infos') ?>">Information</a>
            <a class="dropdown-item pt-3" href="<?php echo site_url('admin/abouts') ?>">About</a>
            <a class="dropdown-item pt-3" href="<?php echo site_url('admin/contacts') ?>">Contact</a>
            <a class="dropdown-item pt-3" href="<?php echo site_url('admin/visis') ?>">Visi</a>
            <a class="dropdown-item pt-3" href="<?php echo site_url('admin/misis') ?>">Misi</a>
        </div>
    </li>
    <!-- end -->
    <li class="nav-item pt-2 <?php echo $this->uri->segment(2) == 'learnings' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/learnings') ?>"><i class="fas fa-fw fa-chalkboard-teacher"></i>
        <span>Learnings</span></a>
    </li>
    <li class="nav-item pt-2 <?php echo $this->uri->segment(2) == 'achievements' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/achievements') ?>"><i class="fas fa-fw fa-medal"></i>
        <span>Achievements</span></a>
    </li>
    <li class="nav-item pt-2 <?php echo $this->uri->segment(2) == 'careers' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/careers') ?>"><i class="fas fa-fw fa-briefcase"></i>
        <span>Careers</span></a>
    </li>
    <li class="nav-item pt-2 <?php echo $this->uri->segment(2) == 'events' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/events') ?>"><i class="fas fa-fw fa-calendar-alt"></i>
        <span>Events</span></a>
    </li>
</ul>

<style>
.sidebar {
    background-color: #480048;
}
</style>