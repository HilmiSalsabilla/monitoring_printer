    <footer class="app-footer">
      Copyright &copy; <?php echo date('Y') ?> &middot; <strong>Monitoring Printer</strong> PT. Semen Padang
    </footer>
  </div><!-- /.app-shell -->

  <!-- General JS Scripts -->
  <script src="<?php echo base_url() ?>/assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/modules/popper.js"></script>
  <script src="<?php echo base_url() ?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>

  <!-- JS Libraries -->
  <script src="<?php echo base_url() ?>/assets/modules/izitoast/js/iziToast.min.js"></script>

  <!-- Modern Theme JS -->
  <script src="<?php echo base_url() ?>/assets/js/modern-app.js"></script>

  <?php if($this->session->flashdata('pesan')) : ?>
  <script type="">
  iziToast.success({
    title: 'Welcome!',
    message: '<?php echo $this->session->flashdata('pesan'); ?>',
    position: 'topRight'
    });
  </script>
<?php endif; ?>

<?php if($this->session->flashdata('sukses')) : ?>
  <script type="">
  iziToast.success({
    title: 'Berhasil!',
    message: '<?php echo $this->session->flashdata('sukses'); ?>',
    position: 'topRight'
    });
  </script>
<?php endif; ?>

</body>
</html>
