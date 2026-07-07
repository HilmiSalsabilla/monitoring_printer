<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$current_segment = $this->uri->segment(1);
$level           = $this->session->userdata('level');

// Build the nav items for the current role once, instead of repeating the
// same <li> markup twice with two near-identical if-blocks.
$nav_items = [];

if ($level === 'Admin' || $level === 'User') {
	$nav_items[] = [
		'segment' => 'dashboard',
		'url'     => base_url('dashboard'),
		'icon'    => 'fa-gauge',
		'label'   => 'Dashboard',
	];
}

if ($level === 'Admin') {
	$nav_items[] = [
		'segment' => 'user',
		'url'     => base_url('user'),
		'icon'    => 'fa-users',
		'label'   => 'User',
	];
}

if ($level === 'Admin' || $level === 'User') {
	$nav_items[] = [
		'segment' => 'printer',
		'url'     => base_url('printer'),
		'icon'    => 'fa-print',
		'label'   => 'Printer',
	];
}
?>
			<aside
				id="sidebar-navigasi"
				class="fixed inset-y-0 left-0 z-40 flex w-64 -translate-x-full flex-col border-r border-ink-800 bg-ink-900 transition-transform duration-200 ease-in-out lg:sticky lg:top-0 lg:h-screen lg:translate-x-0"
				data-sidebar
			>
				<a class="flex h-16 shrink-0 items-center gap-3 border-b border-ink-800 px-5" href="<?php echo base_url(); ?>" aria-label="Monitoring Printer PT. Semen Padang - Beranda">
					<span class="flex h-9 w-9 items-center justify-center rounded-lg bg-brand-600 text-sm font-bold text-white" aria-hidden="true">MP</span>
					<span class="leading-tight">
						<span class="block text-sm font-semibold text-white">Monitoring Printer</span>
						<span class="block text-xs text-ink-400">PT. Semen Padang</span>
					</span>
				</a>

				<nav class="flex-1 space-y-1 overflow-y-auto px-3 py-4" aria-label="Navigasi utama">
					<?php foreach ($nav_items as $item): ?>
						<?php $is_active = ($current_segment === $item['segment']); ?>
						<a
							href="<?php echo $item['url']; ?>"
							<?php echo $is_active ? 'aria-current="page"' : ''; ?>
							class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition-colors
								<?php echo $is_active
									? 'bg-brand-600 text-white'
									: 'text-ink-300 hover:bg-ink-800 hover:text-white'; ?>"
						>
							<i class="fas <?php echo $item['icon']; ?> w-4 text-center <?php echo $is_active ? 'text-white' : 'text-ink-400'; ?>" aria-hidden="true"></i>
							<span><?php echo $item['label']; ?></span>
						</a>
					<?php endforeach; ?>
				</nav>
			</aside>

			<div class="min-w-0 flex-1">
