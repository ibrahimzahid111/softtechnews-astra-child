(function () {
  function markRevealTargets() {
    var targets = document.querySelectorAll(
      '.wp-block-latest-posts__list.is-grid > li, .entry-content > h2, .entry-content > h3, .entry-content > p, .entry-content > img, .entry-content > figure'
    );
    targets.forEach(function (el) {
      el.classList.add('stn-reveal');
    });
  }

  function initObserver() {
    var elements = document.querySelectorAll('.stn-reveal');
    if (!('IntersectionObserver' in window)) {
      elements.forEach(function (el) { el.classList.add('stn-visible'); });
      return;
    }
    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('stn-visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
    );
    elements.forEach(function (el) { observer.observe(el); });
  }

  document.addEventListener('DOMContentLoaded', function () {
    markRevealTargets();
    initObserver();
  });
})();
