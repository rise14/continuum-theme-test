(function() {
  document.addEventListener('DOMContentLoaded', function() {
    var menu = document.getElementById('main-menu');
    if (!menu) return;

    // Insert hamburger button before the menu
    if (window.innerWidth > 640) return;

    var btn = document.createElement('button');
    btn.id = 'mobile-nav-toggle';
    btn.setAttribute('aria-label', 'Toggle navigation');
    btn.innerHTML = '&#9776; Menu';
    menu.parentNode.insertBefore(btn, menu);

    btn.addEventListener('click', function() {
      menu.classList.toggle('nav-open');
      btn.innerHTML = menu.classList.contains('nav-open') ? '&#x2715; Close' : '&#9776; Menu';
    });
  });
})();
