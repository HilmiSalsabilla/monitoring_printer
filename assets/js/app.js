/**
 * Small, dependency-free behaviors for the admin views:
 *  1. Off-canvas sidebar toggle for small screens (toggles Tailwind's
 *     `hidden` / translate utility classes directly - no custom CSS classes
 *     to keep in sync).
 *  2. Accessible tabs (role="tablist") used on the Printer and User pages.
 */
(function () {
	'use strict';

	function initSidebar() {
		var toggle = document.querySelector('[data-sidebar-toggle]');
		var sidebar = document.querySelector('[data-sidebar]');
		var backdrop = document.querySelector('[data-sidebar-backdrop]');
		if (!toggle || !sidebar || !backdrop) return;

		function setOpen(isOpen) {
			sidebar.classList.toggle('-translate-x-full', !isOpen);
			sidebar.classList.toggle('translate-x-0', isOpen);
			backdrop.classList.toggle('hidden', !isOpen);
			toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		}

		toggle.addEventListener('click', function () {
			var isOpen = sidebar.classList.contains('-translate-x-full');
			setOpen(isOpen);
		});

		backdrop.addEventListener('click', function () {
			setOpen(false);
		});
	}

	function initTabs(root) {
		var tabs = Array.prototype.slice.call(root.querySelectorAll('[role="tab"]'));
		if (!tabs.length) return;

		function selectTab(tab) {
			tabs.forEach(function (t) {
				var selected = t === tab;
				t.setAttribute('aria-selected', selected ? 'true' : 'false');
				t.tabIndex = selected ? 0 : -1;

				var panel = document.getElementById(t.getAttribute('aria-controls'));
				if (panel) panel.hidden = !selected;
			});
			tab.focus();
		}

		tabs.forEach(function (tab, index) {
			tab.addEventListener('click', function () {
				selectTab(tab);
			});

			tab.addEventListener('keydown', function (event) {
				var newIndex = null;

				if (event.key === 'ArrowRight' || event.key === 'ArrowDown') {
					newIndex = (index + 1) % tabs.length;
				} else if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') {
					newIndex = (index - 1 + tabs.length) % tabs.length;
				} else if (event.key === 'Home') {
					newIndex = 0;
				} else if (event.key === 'End') {
					newIndex = tabs.length - 1;
				}

				if (newIndex !== null) {
					event.preventDefault();
					selectTab(tabs[newIndex]);
				}
			});
		});
	}

	document.addEventListener('DOMContentLoaded', function () {
		initSidebar();
		document.querySelectorAll('[data-tabs]').forEach(initTabs);
	});
})();
