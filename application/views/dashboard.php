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
                <h2>Selamat Datang, <?php echo $this->session->userdata('nama') ?></h2>
                <p class="lead">Salam hangat dari hati yang berbunga-bunga!</p>
              </div>
            </div>
          </div>
        </div>
      <?php endif;?>

      <?php if($this->session->userdata('level') == 'Admin') : ?>
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-8 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total User</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $total_user ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-8 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-plug"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Printer</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $total_printer ?>
                  </div>
                </div>
              </div>
            </div>                  
          </div>
            <div class="col-md-12">
              <h5 style="color: black; text-align: center;">Grafik pengguna Printer <?php echo date('Y') ?></h5>
              <canvas id="myChart" width="400" height="125"></canvas>
            </div>
        <?php endif;?>
    </div>
    </div>
    </div>
  </section>
</div>

<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: <?php echo json_encode($bulan) ?>,
          datasets: [{
              label: '# Look',
              data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });