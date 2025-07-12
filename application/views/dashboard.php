<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>DASHBOARD</h1>
    </div>

    <div class="section-body">
    <div class="card card-danger">
    <div class="card-body">
      <?php if($this->session->userdata('level') == 'User') : ?>
        <div class="row">
          <div class="col-12 mb-4">
            <div class="hero text-white hero-bg-image hero-bg-parallax"style="background-image: url('<?php echo base_url() ?>/assets/img/dashboard_1.jpg');">
              <div class="hero-inner">
                <h2>Welcome, <?php echo $this->session->userdata('nama') ?>!</h2>
                <p class="lead">Salam hangat dari hati yang berbunga-bunga!</p>
              </div>
            </div>
          </div>
        </div>
      <?php endif;?>

      <?php if($this->session->userdata('level') == 'Admin') : ?>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Admin</h4>
                  </div>
                  <div class="card-body">
                    10
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>News</h4>
                  </div>
                  <div class="card-body">
                    42
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Reports</h4>
                  </div>
                  <div class="card-body">
                    1,201
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Online Users</h4>
                  </div>
                  <div class="card-body">
                    47
                  </div>
                </div>
              </div>
            </div>                  
          </div>
      <?php endif;?>

    </div>
    </div>
    </div>
  </section>
</div>
