// Calaps (Collapse) Block
document.addEventListener('DOMContentLoaded', function() {
  const calapsHeaders = document.querySelectorAll('.calaps-block .calaps-header');

  calapsHeaders.forEach(function(header) {
    header.addEventListener('click', function() {
      const calapsItem = this.closest('.calaps-item');
      const content = calapsItem.querySelector('.calaps-content');
      const isActive = calapsItem.classList.contains('active');

      // Toggle active state
      if (isActive) {
        calapsItem.classList.remove('active');
        this.setAttribute('aria-expanded', 'false');
        content.setAttribute('aria-hidden', 'true');
      } else {
        calapsItem.classList.add('active');
        this.setAttribute('aria-expanded', 'true');
        content.setAttribute('aria-hidden', 'false');
      }
    });

    // Keyboard accessibility
    header.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        this.click();
      }
    });
  });

  // Handle hash in URL
  if (window.location.hash) {
    const targetCalaps = document.querySelector(window.location.hash);
    if (targetCalaps && targetCalaps.classList.contains('calaps-block')) {
      const calapsItem = targetCalaps.querySelector('.calaps-item');
      const header = targetCalaps.querySelector('.calaps-header');
      const content = targetCalaps.querySelector('.calaps-content');
      
      if (calapsItem) {
        calapsItem.classList.add('active');
        header.setAttribute('aria-expanded', 'true');
        content.setAttribute('aria-hidden', 'false');
      }
    }
  }
});

