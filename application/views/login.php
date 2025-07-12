<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Monitoring Printer</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/modules/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/modules/fontawesome/css/all.min.css') ?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('assets/modules/bootstrap-social/bootstrap-social.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/modules/izitoast/css/iziToast.min.css') ?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/components.css') ?>">

  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){ dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'UA-94034622-3');
  </script>
</head>

<body style="background-color: #c3271f;">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url('assets/img/logo_PT.jpeg') ?>" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-danger">
              <div class="card-header justify-content-center">
                <h5 class="text-dark">LOGIN</h5>
              </div>
              <div class="card-body">

                <form method="POST" action="<?= site_url('login/proses_login') ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input id="nik" type="text" class="form-control" name="nik" tabindex="1" required autofocus>
                    <div class="invalid-feedback">Please fill in your NIK</div>
                  </div>

                  <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">Please fill in your password</div>
                    <div class="float-right">
                      <a href="#" class="text-small" style="color: #c3271f;">Forgot Password?</a>
                    </div>
                  </div>

                  <div class="form-group mt-4">
                    <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>

            <div class="simple-footer text-white mt-3 text-center">
              &copy; <?= date('Y') ?> PT. Semen Padang
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url('assets/modules/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/modules/popper.js') ?>"></script>
  <script src="<?= base_url('assets/modules/tooltip.js') ?>"></script>
  <script src="<?= base_url('assets/modules/bootstrap/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/modules/nicescroll/jquery.nicescroll.min.js') ?>"></script>
  <script src="<?= base_url('assets/modules/moment.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/stisla.js') ?>"></script>

  <!-- iziToast -->
  <script src="<?= base_url('assets/modules/izitoast/js/iziToast.min.js') ?>"></script>

  <!-- Template JS -->
  <script src="<?= base_url('assets/js/scripts.js') ?>"></script>
  <script src="<?= base_url('assets/js/custom.js') ?>"></script>

  <!-- Flashdata Notifications -->
  <?php if ($this->session->flashdata('pesan')): ?>
    <script>
      iziToast.success({
        title: 'Success!',
        message: '<?= $this->session->flashdata('pesan') ?>',
        position: 'topRight'
      });
    </script>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <script>
      iziToast.error({
        title: 'Error!',
        message: '<?= $this->session->flashdata('error') ?>',
        position: 'topRight'
      });
    </script>
  <?php endif; ?>
</body>
</html>