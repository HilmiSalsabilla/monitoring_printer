<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Every page that loads this template can optionally set $page_title
// before calling $this->load->view('template/header'). Falls back to a
// sensible default so <title> is never empty.
$page_title = isset($page_title) && $page_title !== ''
	? $page_title . ' - Monitoring Printer PT. Semen Padang'
	: 'Monitoring Printer PT. Semen Padang';
?><!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

	<title><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?></title>
	<meta name="description" content="Dashboard internal untuk memantau dan mengelola data printer, lokasi, dan pengguna di PT. Semen Padang.">

	<!-- Internal, login-gated application: keep it out of search results. -->
	<meta name="robots" content="noindex, nofollow">

	<link rel="icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body class="h-full bg-ink-50 text-ink-800">

	<!-- Lets keyboard/screen-reader users bypass the sidebar and jump straight to the page content. -->
	<a class="skip-link" href="#konten-utama">Langsung ke konten utama</a>

	<div class="min-h-screen">

		<header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b-2 border-brand-600 bg-white px-4 sm:px-6">
			<button type="button" class="btn-icon-only lg:hidden" aria-label="Buka atau tutup menu navigasi" aria-controls="sidebar-navigasi" aria-expanded="false" data-sidebar-toggle>
				<i class="fas fa-bars" aria-hidden="true"></i>
			</button>

			<div class="ml-auto flex items-center gap-4">
				<span class="flex items-center gap-2">
					<span class="flex h-8 w-8 items-center justify-center rounded-full bg-brand-100 text-sm font-semibold text-brand-700" aria-hidden="true">
						<?php echo strtoupper(substr($this->session->userdata('nama'), 0, 1)) ?>
					</span>
					<span class="hidden text-sm font-medium text-ink-600 sm:inline">
						Hi, <?php echo htmlspecialchars($this->session->userdata('nama'), ENT_QUOTES, 'UTF-8') ?>
					</span>
				</span>

				<a class="btn-secondary" href="<?php echo base_url('logout') ?>">
					<i class="fas fa-right-from-bracket" aria-hidden="true"></i>
					<span class="hidden sm:inline">Logout</span>
				</a>
			</div>
		</header>

		<div class="flex">

			<!-- Backdrop shown on small screens while the sidebar is open. -->
			<div class="fixed inset-0 z-30 hidden bg-ink-900/50 lg:hidden" data-sidebar-backdrop hidden></div>
