<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Monitoring Printer PT. Semen Padang</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/modules/izitoast/css/iziToast.min.css">

  <!-- Modern Theme CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/modern-theme.css">

  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div class="app-shell" id="appShell">

    <!-- Sidebar overlay (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Topbar -->
    <header class="topbar">
      <button type="button" class="topbar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
        <i class="fas fa-bars"></i>
      </button>
      <div class="topbar-spacer"></div>
      <div class="dropdown">
        <a href="#" data-toggle="dropdown" class="topbar-user-link dropdown-toggle">
          <span class="avatar-circle"><?php echo strtoupper(substr($this->session->userdata('nama'), 0, 1)) ?></span>
          <span class="topbar-user-name d-none d-sm-inline">Hi, <?php echo $this->session->userdata('nama') ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right topbar-dropdown">
          <a href="<?php echo base_url('logout') ?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </div>
    </header>
