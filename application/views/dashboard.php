<main class="main-content">
  <div class="page-header">
    <div>
      <span class="page-eyebrow">Overview</span>
      <h1>Dashboard</h1>
    </div>
  </div>

  <?php if($this->session->userdata('level') == 'User') : ?>
    <div class="row">
      <div class="col-12 mb-4">
        <div class="welcome-banner" style="--hero-img: url('<?php echo base_url() ?>/assets/img/dashboard_1.jpg');">
          <h2>Selamat Datang, <?php echo $this->session->userdata('nama') ?></h2>
          <p>Salam hangat dari hati yang berbunga-bunga!</p>
        </div>
      </div>
    </div>
  <?php endif;?>

  <?php if($this->session->userdata('level') == 'Admin') : ?>
    <div class="row">
      <div class="col-lg-6 col-md-8 col-sm-8 col-12 mb-4">
        <div class="stat-card">
          <div class="stat-icon is-black">
            <i class="far fa-user"></i>
          </div>
          <div>
            <p class="stat-label">Total User</p>
            <div class="stat-value"><?php echo $total_user ?></div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-8 col-sm-8 col-12 mb-4">
        <div class="stat-card">
          <div class="stat-icon is-red">
            <i class="fas fa-print"></i>
          </div>
          <div>
            <p class="stat-label">Total Printer</p>
            <div class="stat-value"><?php echo $total_printer ?></div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="chart-card">
          <h5>Grafik Penggunaan Printer <?php echo date('Y') ?></h5>
          <canvas id="myChart" width="400" height="125"></canvas>
        </div>
      </div>
    </div>
  <?php endif;?>
</main>

<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: <?php echo json_encode($bulan) ?>,
          datasets: [{
              label: '# Look',
              data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
              backgroundColor: 'rgba(195, 30, 35, 0.15)',
              borderColor: 'rgba(195, 30, 35, 1)',
              borderRadius: 6,
              borderWidth: 1.5
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          },
          plugins: {
              legend: { display: false }
          }
      }
  });
</script>
