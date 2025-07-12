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
                <div class="hero text-white hero-bg-image hero-bg-parallax"
                     style="background-image: url('<?php echo base_url() ?>/assets/img/dashboard_1.jpg');">
                  <div class="hero-inner">
                    <h2>Welcome, <?php echo $this->session->userdata('nama') ?>!</h2>
                    <p class="lead">Salam hangat dari hati yang berbunga-bunga!</p>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <?php if($this->session->userdata('level') == 'Admin') : ?>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary"><i class="far fa-user"></i></div>
                  <div class="card-wrap">
                    <div class="card-header"><h4>Total Admin</h4></div>
                    <div class="card-body" id="total-admin">0</div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-dark"><i class="fas fa-users"></i></div>
                  <div class="card-wrap">
                    <div class="card-header"><h4>Total User</h4></div>
                    <div class="card-body" id="total-user">0</div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning"><i class="fas fa-print"></i></div>
                  <div class="card-wrap">
                    <div class="card-header"><h4>Total Printer</h4></div>
                    <div class="card-body" id="total-printer">0</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Aktivitas Login Terakhir -->
            <div class="card mt-4">
              <div class="card-header bg-danger text-white">
                <h4 class="mb-0">Aktivitas Login Terakhir</h4>
              </div>
              <div class="card-body p-0">
                <ul class="list-group" id="last-login-list" style="max-height: 250px; overflow-y: auto;"></ul>
              </div>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </section>
</div>

<!-- Script realtime -->
<script>
function loadDashboardData() {
  $.ajax({
    url: '<?php echo base_url("dashboard/data_realtime"); ?>',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      $('#total-admin').text(data.total_admin);
      $('#total-user').text(data.total_user);
      $('#total-printer').text(data.total_printer);

      let loginList = '';
      data.last_logins.forEach(function(user) {
        loginList += `
          <li class="list-group-item d-flex justify-content-between align-items-start flex-column">
            <div class="d-flex w-100 justify-content-between">
              <strong>${user.nama}</strong>
              <span class="badge badge-danger">${user.level}</span>
            </div>
            <small class="text-muted">${user.last_login}</small>
          </li>`;
      });
      $('#last-login-list').html(loginList);
    }
  });
}

loadDashboardData();
setInterval(loadDashboardData, 5000); // update setiap 5 detik
</script>