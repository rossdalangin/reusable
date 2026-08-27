/**
 * Client Growth System - Interactive JavaScript (cgs-interactive.js)
 * Provides simple, fast vanilla JS functionality for FAQ accordions, mobile menu toggling, and form validation.
 */

document.addEventListener('DOMContentLoaded', function() {
  // Mobile Navigation Toggle
  const toggleBtn = document.querySelector('.cgs-mobile-toggle');
  const navMenu = document.querySelector('.cgs-nav');

  if (toggleBtn && navMenu) {
    toggleBtn.addEventListener('click', function() {
      navMenu.classList.toggle('cgs-nav-open');
      const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
      toggleBtn.setAttribute('aria-expanded', !isExpanded);
    });
  }

  // FAQ Accordion Toggles
  const faqToggles = document.querySelectorAll('.cgs-faq-toggle');

  faqToggles.forEach(function(toggle) {
    toggle.addEventListener('click', function() {
      const targetId = toggle.getAttribute('aria-controls');
      const answerEl = document.getElementById(targetId);

      if (answerEl) {
        const isHidden = answerEl.hasAttribute('hidden');

        // Close all other answers
        document.querySelectorAll('.cgs-faq-answer').forEach(function(ans) {
          ans.setAttribute('hidden', '');
        });
        document.querySelectorAll('.cgs-faq-toggle').forEach(function(t) {
          t.setAttribute('aria-expanded', 'false');
        });

        // Toggle clicked answer
        if (isHidden) {
          answerEl.removeAttribute('hidden');
          toggle.setAttribute('aria-expanded', 'true');
        }
      }
    });
  });
});
