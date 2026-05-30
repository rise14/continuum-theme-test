(function() {
  var BREAKPOINT = 640;

  function setupMobileNav() {
    var menu = document.getElementById('main-menu');
    if (!menu) return;

    var btn = document.getElementById('mobile-nav-toggle');

    if (window.innerWidth <= BREAKPOINT) {
      // Insert button if not already present
      if (!btn) {
        btn = document.createElement('button');
        btn.id = 'mobile-nav-toggle';
        btn.setAttribute('aria-label', 'Toggle navigation');
        btn.innerHTML = '&#9776; Menu';
        menu.parentNode.insertBefore(btn, menu);

        btn.addEventListener('click', function() {
          menu.classList.toggle('nav-open');
          btn.innerHTML = menu.classList.contains('nav-open') ? '&#x2715; Close' : '&#9776; Menu';
        });
      }
    } else {
      // Remove button and close nav if window is desktop-sized
      if (btn) btn.parentNode.removeChild(btn);
      menu.classList.remove('nav-open');
    }
  }

  document.addEventListener('DOMContentLoaded', setupMobileNav);
  window.addEventListener('resize', setupMobileNav);
})();
