/**
 * Blockquote Animation
 *
 * Handles the animation for animated blockquotes based on scroll position.
 * When elements with class starting with "pen-" come into view, they are animated.
 */

function initBlockquoteAnimation() {
  // Find all marks with a class starting with pen-
  const markers = document.querySelectorAll('mark[class^="pen-"]');

  // Only proceed if there are markers to animate
  if (markers.length === 0) {
    return;
  }

  // Create an IntersectionObserver and add it to each marker
  // When the marker is in view, add the animate-bg-in-scroll class
  const observer = new IntersectionObserver(
    entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("animate-bg-in-scroll");
        } else {
          entry.target.classList.remove("animate-bg-in-scroll");
        }
      });
    },
    {
      threshold: 0.1,
    }
  );

  // Observe each marker
  markers.forEach(mark => {
    observer.observe(mark);
  });
}

// Initialize on DOM content loaded
document.addEventListener('DOMContentLoaded', initBlockquoteAnimation);

// Also initialize on window load as fallback
window.addEventListener('load', initBlockquoteAnimation);