      <footer class="main-footer">
        <div class="footer-left">
          &copy; 2023 <div class="bullet"></div> Design By 
          <a href="#">Monitoring Printer PT. Semen Padang</a>
        </div>
        <div class="footer-right"></div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url('assets/modules/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/modules/popper.js') ?>"></script>
  <script src="<?= base_url('assets/modules/tooltip.js') ?>"></script>
  <script src="<?= base_url('assets/modules/bootstrap/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/modules/nicescroll/jquery.nicescroll.min.js') ?>"></script>
  <script src="<?= base_url('assets/modules/moment.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/stisla.js') ?>"></script>
  
  <!-- JS Libraries -->
  <script src="<?= base_url('assets/modules/simple-weather/jquery.simpleWeather.min.js') ?>"></script>
  <script src="<?= base_url('assets/modules/chart.min.js') ?>"></script>
  <script src="<?= base_url('assets/modules/jqvmap/dist/jquery.vmap.min.js') ?>"></script>
  <script src="<?= base_url('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') ?>"></script>
  <script src="<?= base_url('assets/modules/summernote/summernote-bs4.js') ?>"></script>
  <script src="<?= base_url('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') ?>"></script>

  <!-- Page Specific JS -->
  <script src="<?= base_url('assets/js/page/index-0.js') ?>"></script>
  
  <!-- Template JS -->
  <script src="<?= base_url('assets/js/scripts.js') ?>"></script>
  <script src="<?= base_url('assets/js/custom.js') ?>"></script>

  <!-- Ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <!-- iziToast for flash message -->
  <?php if($this->session->flashdata('pesan')): ?>
    <script>
      iziToast.success({
        title: 'Welcome!',
        message: '<?= $this->session->flashdata('pesan') ?>',
        position: 'topRight'
      });
    </script>
  <?php endif; ?>

  <?php if($this->session->flashdata('sukses')): ?>
    <script>
      iziToast.success({
        title: 'Berhasil!',
        message: '<?= $this->session->flashdata('sukses') ?>',
        position: 'topRight'
      });
    </script>
  <?php endif; ?>

  <?php if($this->session->flashdata('gagal')): ?>
    <script>
      iziToast.error({
        title: 'Gagal!',
        message: '<?= $this->session->flashdata('gagal') ?>',
        position: 'topRight'
      });
    </script>
  <?php endif; ?>

</body>
</html>