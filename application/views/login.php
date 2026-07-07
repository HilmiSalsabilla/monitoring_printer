<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

	<title>Login - Monitoring Printer PT. Semen Padang</title>
	<meta name="description" content="Login ke sistem monitoring printer PT. Semen Padang untuk memantau dan mengelola perangkat, lokasi, dan pengguna secara real-time.">
	<meta name="robots" content="noindex, nofollow">

	<link rel="icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body class="min-h-screen bg-ink-50 text-ink-800">
	<div class="grid min-h-screen lg:grid-cols-2">

		<aside class="relative hidden flex-col justify-between overflow-hidden bg-ink-900 p-10 text-white lg:flex" aria-label="Tentang Monitoring Printer">
			<span class="flex h-11 w-11 items-center justify-center rounded-lg bg-white/10 text-sm font-bold" aria-hidden="true">MP</span>

			<div>
				<p class="text-3xl font-semibold leading-tight">Pantau seluruh printer perusahaan dalam satu dashboard.</p>
				<p class="mt-4 max-w-md text-ink-300">Sistem monitoring printer PT. Semen Padang &mdash; kelola perangkat, lokasi, dan pengguna secara real-time.</p>
			</div>

			<p class="text-sm text-ink-400">&copy; <?php echo date('Y') ?> PT. Semen Padang. All rights reserved.</p>
		</aside>

		<main class="flex flex-col justify-center px-6 py-12 sm:px-12 lg:px-16">
			<div class="mx-auto w-full max-w-sm">
				<!-- <img class="mb-8 h-12 w-auto" src="<?php echo base_url('assets/img/logo.jpeg') ?>" alt="Logo PT. Semen Padang"> -->

				<h1>Selamat Datang</h1>
				<p class="mt-1 text-sm text-ink-500">Masuk untuk melanjutkan ke Monitoring Printer</p>

				<?php if (validation_errors()) : ?>
					<div class="form-alert mt-6" role="alert">
						<?php echo validation_errors(); ?>
					</div>
				<?php endif; ?>

				<form class="mt-8" method="POST" action="<?php echo site_url('login') ?>" novalidate>
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

					<div class="field">
						<label for="nik">NIK</label>
						<input id="nik" type="text" name="nik" tabindex="1" required autofocus
							placeholder="Masukkan NIK Anda"
							aria-describedby="nik-hint">
						<span id="nik-hint" class="field-hint">Please fill in your NIK</span>
					</div>

					<div class="field">
						<div class="flex items-center justify-between">
							<label for="password">Password</label>
							<a class="text-xs font-medium text-brand-600 hover:text-brand-800 hover:underline" href="<?php echo base_url('lupa-password') ?>">Lupa Password?</a>
						</div>
						<input id="password" type="password" name="password" tabindex="2" required
							placeholder="Masukkan Password Anda"
							aria-describedby="password-hint">
						<span id="password-hint" class="field-hint">Please fill in your password</span>
					</div>

					<button type="submit" tabindex="3" class="btn-primary w-full justify-center">Login</button>
				</form>

				<footer class="mt-10">
					<p class="text-center text-xs text-ink-400">
						Copyright &copy; <?php echo date('Y') ?> &middot; <strong class="font-medium text-ink-500">Monitoring Printer</strong> PT. Semen Padang
					</p>
				</footer>
			</div>
		</main>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
	<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>

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
