<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="konten-utama" class="p-4 sm:p-6 lg:p-8">
	<header class="mb-6">
		<p class="page-eyebrow">Overview</p>
		<h1>Dashboard</h1>
	</header>

	<?php if ($this->session->userdata('level') == 'User') : ?>
		<section
			class="mb-8 flex min-h-[220px] flex-col justify-end rounded-2xl bg-cover bg-center p-6 text-white shadow-sm sm:p-8"
			style="background-image: linear-gradient(180deg, rgba(16,31,77,0.2), rgba(16,31,77,0.85)), url('<?php echo base_url() ?>assets/img/dashboard.jpg');"
			aria-label="Sambutan"
		>
			<h2 class="text-white">Selamat Datang, <?php echo htmlspecialchars($this->session->userdata('nama'), ENT_QUOTES, 'UTF-8') ?></h2>
			<p class="text-ink-200">Salam hangat dari hati yang berbunga-bunga!</p>
		</section>
	<?php endif; ?>

	<?php if ($this->session->userdata('level') == 'Admin') : ?>
		<section aria-labelledby="statistik-heading">
			<h2 id="statistik-heading" class="sr-only">Statistik</h2>

			<dl class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
				<div class="stat-card">
					<dt>Total User</dt>
					<dd><?php echo (int) $total_user ?></dd>
				</div>

				<div class="stat-card">
					<dt>Total Printer</dt>
					<dd><?php echo (int) $total_printer ?></dd>
				</div>
			</dl>
		</section>
	<?php endif; ?>
</main>
