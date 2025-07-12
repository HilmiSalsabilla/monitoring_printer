<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Monitoring Printer</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/components.css">
  
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

<body  style="background-color: #c3271f;">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url() ?>/assets/img/logo PT.jpeg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-danger"><br>
              <div>
                <h5 style="color: black; text-align: center;">LOGIN</h5>
              </div>

              <div class="card-body">
                <!-- Flash message if exists -->
                <?php if ($this->session->flashdata('pesan')) : ?>
                  <div class="alert alert-success text-center">
                    <?php echo $this->session->flashdata('pesan'); ?>
                  </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')) : ?>
                  <div class="alert alert-danger text-center">
                    <?php echo $this->session->flashdata('error'); ?>
                  </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo site_url('login/proses_login') ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input id="nik" type="nik" class="form-control" name="nik" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your NIK
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Please fill in your password
                    </div>
                    <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small" style="color: #c3271f;">
                          Forgot Password?
                        </a>
                    </div>
                  </div>
                  <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">Login</button>
                  </div>
                </form>
              </div>
            </div><br><br><br>
            <div class="simple-footer" style="color: white;">
              Copyright &copy; PT. Semen Padang
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url() ?>/assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/modules/popper.js"></script>
  <script src="<?php echo base_url() ?>/assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url() ?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>/assets/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/custom.js"></script>
  
  <?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success text-center">
        <?php echo $this->session->flashdata('pesan'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger text-center">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
  
</body>
</html>
