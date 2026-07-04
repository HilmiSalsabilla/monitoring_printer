/* ==========================================================================
   Monitoring Printer — Modern Theme JS
   Handles sidebar toggle / overlay. No dependency on Stisla.
   ========================================================================== */
(function ($) {
  "use strict";

  $(function () {
    var $shell = $("#appShell");
    var $toggle = $("#sidebarToggle");
    var $overlay = $("#sidebarOverlay");

    function openSidebar() {
      $shell.addClass("sidebar-open");
    }
    function closeSidebar() {
      $shell.removeClass("sidebar-open");
    }
    function toggleSidebar() {
      $shell.toggleClass("sidebar-open");
    }

    $toggle.on("click", function (e) {
      e.preventDefault();
      toggleSidebar();
    });

    $overlay.on("click", function () {
      closeSidebar();
    });

    // Close the mobile sidebar automatically after navigating
    $(".sidebar-nav a").on("click", function () {
      if (window.innerWidth < 992) {
        closeSidebar();
      }
    });

    // Close on resize back to desktop
    $(window).on("resize", function () {
      if (window.innerWidth >= 992) {
        closeSidebar();
      }
    });
  });
})(jQuery);
