/*
 * Small extras. Every page works without this file; it only adds:
 *  - the × button that hides the announcement bar (remembered for this visit)
 *  - arrow buttons for the numbered slider on the Home page
 *  - closing the phone menu with Escape or a tap outside it
 */
(function () {
  // Announcement bar: show the close button, and keep it closed after closing.
  var bar = document.getElementById('announcement');
  if (bar) {
    var key = 'announcement-closed:' + bar.textContent.trim();
    try { if (sessionStorage.getItem(key)) bar.hidden = true; } catch (e) {}
    var close = bar.querySelector('.announcement-close');
    close.hidden = false;
    close.addEventListener('click', function () {
      bar.hidden = true;
      try { sessionStorage.setItem(key, '1'); } catch (e) {}
    });
  }

  // Slider arrows: move one slide left or right.
  document.querySelectorAll('[data-slider]').forEach(function (slider) {
    var arrows = document.querySelector('[data-slider-arrows="' + slider.id + '"]');
    if (!arrows) return;
    arrows.hidden = false;
    arrows.querySelectorAll('button').forEach(function (button) {
      button.addEventListener('click', function () {
        var slide = slider.querySelector('.slide');
        var step = slide ? slide.getBoundingClientRect().width + 32 : 300;
        slider.scrollBy({ left: step * Number(button.dataset.direction), behavior: 'smooth' });
      });
    });
  });

  // Phone menu: close with Escape, or when tapping anywhere else.
  var menu = document.querySelector('.menu-toggle');
  if (menu) {
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && menu.open) { menu.open = false; menu.querySelector('summary').focus(); }
    });
    document.addEventListener('click', function (e) {
      if (menu.open && !menu.contains(e.target)) menu.open = false;
    });
  }
})();
