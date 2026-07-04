    <aside class="sidebar" id="sidebar">
      <div class="sidebar-brand">
        <a href="<?php echo base_url(); ?>">
          <span class="brand-mark">MP</span>
          <span class="brand-text">Monitoring Printer
            <small>PT. Semen Padang</small>
          </span>
        </a>
      </div>

      <nav class="sidebar-nav">
        <ul>
          <?php if ($this->session->userdata('level') == 'Admin'): ?>
          <li class="<?php echo $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>">
            <a href="<?php echo base_url('dashboard'); ?>">
              <i class="fas fa-chart-pie"></i><span>Dashboard</span>
            </a>
          </li>
          <li class="<?php echo $this->uri->segment(1) == 'user' ? 'active' : ''; ?>">
            <a href="<?php echo base_url('user'); ?>">
              <i class="far fa-user"></i><span>User</span>
            </a>
          </li>
          <li class="<?php echo $this->uri->segment(1) == 'printer' ? 'active' : ''; ?>">
            <a href="<?php echo base_url('printer'); ?>">
              <i class="fas fa-print"></i><span>Printer</span>
            </a>
          </li>
          <?php endif; ?>
          <?php if ($this->session->userdata('level') == 'User'): ?>
          <li class="<?php echo $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>">
            <a href="<?php echo base_url('dashboard'); ?>">
              <i class="fas fa-chart-pie"></i><span>Dashboard</span>
            </a>
          </li>
          <li class="<?php echo $this->uri->segment(1) == 'printer' ? 'active' : ''; ?>">
            <a href="<?php echo base_url('printer'); ?>">
              <i class="fas fa-print"></i><span>Printer</span>
            </a>
          </li>
          <?php endif; ?>
        </ul>
      </nav>

      <div class="sidebar-footer">
        &copy; <?php echo date('Y') ?> PT. Semen Padang
      </div>
    </aside>
