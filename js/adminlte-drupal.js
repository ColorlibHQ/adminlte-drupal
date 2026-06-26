/**
 * @file
 * AdminLTE 4 Drupal behaviours.
 *
 * Provides the navbar light/dark mode toggle. The initial mode is resolved
 * inline in html.html.twig (to prevent a flash); this only handles the toggle
 * interaction and persists the choice in localStorage under "lte-theme".
 */

((Drupal, once) => {
  'use strict';

  const STORAGE_KEY = 'lte-theme';

  const currentMode = () =>
    document.documentElement.getAttribute('data-bs-theme') === 'dark'
      ? 'dark'
      : 'light';

  const applyMode = (mode) => {
    document.documentElement.setAttribute('data-bs-theme', mode);
    document.documentElement.style.colorScheme = mode;
    try {
      localStorage.setItem(STORAGE_KEY, mode);
    } catch {
      // localStorage may be unavailable (private mode, sandboxed iframe).
    }
  };

  Drupal.behaviors.adminlteThemeToggle = {
    attach(context) {
      once('adminlte-theme-toggle', '[data-adminlte-theme-toggle]', context).forEach(
        (button) => {
          const syncIcon = () => {
            const icon = button.querySelector('i');
            if (icon) {
              icon.className =
                currentMode() === 'dark' ? 'bi bi-sun' : 'bi bi-moon-stars';
            }
          };

          syncIcon();

          button.addEventListener('click', (event) => {
            event.preventDefault();
            applyMode(currentMode() === 'dark' ? 'light' : 'dark');
            syncIcon();
          });
        },
      );
    },
  };
})(Drupal, once);
