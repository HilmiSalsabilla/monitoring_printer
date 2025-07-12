<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <h5><a href="<?php echo base_url(); ?>"><br>Monitoring <br>Printer</a></h5>
    </div><br>

    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>">MP</a>
    </div><br>

    <ul class="sidebar-menu">
      <?php if($this->session->userdata('level') == 'admin'): ?>
      <li class="" >
        <a class="nav-link" href="<?php echo $this->uri->segment(1)=='dashboard' ? 'active' : ''; ?>">
        <i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li> 
      <li class="">
        <a class="nav-link" href="<?php echo $this->uri->segment(1)=='user' ? 'active' : ''; ?>">
        <i class="far fa-user"></i><span>User</span></a>
      </li>  
      <li class="">
        <a class="nav-link" href="<?php echo $this->uri->segment(1)=='printer' ? 'active' : ''; ?>">
        <i class="far fa-file"></i><span>Printer</span></a>
      </li>
      <?php endif; ?>
     <?php if($this->session->userdata('level') == 'user'): ?>
      <li class="" >
        <a class="nav-link" href="<?php echo $this->uri->segment(1)=='dashboard' ? 'active' : ''; ?>">
        <i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="">
        <a class="nav-link" href="<?php echo $this->uri->segment(1)=='printer' ? 'active' : ''; ?>">
        <i class="far fa-file"></i><span>Printer</span></a>
      </li>
      <?php endif; ?>
    </ul>
  </aside>
</div>
      