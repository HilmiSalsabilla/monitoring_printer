			<footer class="border-t border-slate-200 px-4 py-6 sm:px-6 lg:px-8">
					<p class="text-center text-sm text-slate-500">
						Copyright &copy; <?php echo date('Y') ?> &middot; <strong class="font-medium text-slate-700">Monitoring Printer</strong> PT. Semen Padang
					</p>
				</footer>

			</div><!-- /.min-w-0.flex-1 (content column) -->
		</div><!-- /.flex (sidebar + content row) -->
	</div><!-- /.min-h-screen -->

	<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
	<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>

	<?php if ($this->session->flashdata('pesan')) : ?>
		<script>
			iziToast.success({
				title: 'Welcome!',
				message: '<?php echo addslashes($this->session->flashdata('pesan')); ?>',
				position: 'topRight'
			});
		</script>
	<?php endif; ?>

	<?php if ($this->session->flashdata('sukses')) : ?>
		<script>
			iziToast.success({
				title: 'Berhasil!',
				message: '<?php echo addslashes($this->session->flashdata('sukses')); ?>',
				position: 'topRight'
			});
		</script>
	<?php endif; ?>

	<?php if ($this->session->flashdata('error')) : ?>
		<script>
			iziToast.error({
				title: 'Gagal!',
				message: '<?php echo addslashes($this->session->flashdata('error')); ?>',
				position: 'topRight'
			});
		</script>
	<?php endif; ?>

</body>
</html>
