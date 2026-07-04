<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login - Monitoring Printer</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/modules/izitoast/css/iziToast.min.css">

  <!-- Modern Theme CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/modern-theme.css">

  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div class="auth-page">

    <!-- Brand panel -->
    <div class="auth-brand-panel">
      <div>
        <span class="brand-mark">MP</span>
        <h1>Pantau seluruh printer perusahaan dalam satu dashboard.</h1>
        <p>Sistem monitoring printer PT. Semen Padang &mdash; kelola perangkat, lokasi, dan pengguna secara real-time.</p>
      </div>
      <div class="auth-footnote">&copy; <?php echo date('Y') ?> PT. Semen Padang. All rights reserved.</div>
    </div>

    <!-- Form panel -->
    <div class="auth-form-panel">
      <div class="auth-card">
        <div class="auth-logo">
          <img src="<?php echo base_url() ?>/assets/img/logo PT.jpeg" alt="logo">
        </div>
        <h2>Selamat Datang</h2>
        <p class="auth-subtitle">Masuk untuk melanjutkan ke Monitoring Printer</p>

        <div class="card">
          <form method="POST" action="<?php echo site_url('login') ?>" class="needs-validation" novalidate="">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="form-group">
              <label for="nik">NIK</label>
              <input id="nik" type="text" class="form-control" name="nik" tabindex="1" required autofocus placeholder="Masukkan NIK Anda">
              <div class="invalid-feedback">
                Please fill in your NIK
              </div>
            </div>
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <label for="password" class="control-label mb-0">Password</label>
                <a href="auth-forgot-password.html" class="forgot-link">Lupa Password?</a>
              </div>
              <input id="password" type="password" class="form-control" name="password" tabindex="2" required placeholder="Masukkan Password Anda">
              <div class="invalid-feedback">
                Please fill in your password
              </div>
            </div>
            <div class="form-group mb-0">
              <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">Login</button>
            </div>
          </form>
        </div>

        <div class="simple-footer">
          Copyright &copy; PT. Semen Padang
        </div>
      </div>
    </div>

  </div>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url() ?>/assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/modules/popper.js"></script>
  <script src="<?php echo base_url() ?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>

  <!-- JS Libraries -->
  <script src="<?php echo base_url() ?>/assets/modules/izitoast/js/iziToast.min.js"></script>

  <?php if($this->session->flashdata('error')) : ?>
  <script type="">
  iziToast.error({
    title: 'Gagal!',
    message: '<?php echo $this->session->flashdata('error'); ?>',
    position: 'topRight'
    });
  </script>
<?php endif; ?>

</body>
</html>
