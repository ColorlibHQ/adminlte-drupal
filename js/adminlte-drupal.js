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

  /**
   * Marks the current page's sidebar link active and opens its section.
   *
   * The link is resolved client-side by longest matching path. This is robust
   * across menus (the Administration menu's server-side active trail is not
   * always populated for the active block) and gives AdminLTE's own `active` /
   * `menu-open` classes so the treeview reflects where you are.
   */
  Drupal.behaviors.adminlteSidebarActive = {
    attach(context) {
      const current = window.location.pathname.replace(/\/+$/, '') || '/';
      once('adminlte-sidebar-active', '.app-sidebar .sidebar-menu', context).forEach(
        (menu) => {
          let best = null;
          let bestLen = -1;
          menu.querySelectorAll('a.nav-link[href]').forEach((link) => {
            const href = link.getAttribute('href');
            if (!href || href === '#') {
              return;
            }
            let path;
            try {
              path =
                new URL(href, window.location.origin).pathname.replace(/\/+$/, '') ||
                '/';
            } catch {
              return;
            }
            const matches =
              current === path || (path !== '/' && current.startsWith(`${path}/`));
            if (matches && path.length > bestLen) {
              best = link;
              bestLen = path.length;
            }
          });

          if (!best) {
            return;
          }
          best.classList.add('active');

          // Open every ancestor treeview section so the active item is visible.
          let item = best.closest('.nav-item');
          while (item && menu.contains(item)) {
            const submenu = item.querySelector(':scope > .nav-treeview');
            if (submenu) {
              item.classList.add('menu-open');
              submenu.style.display = 'block';
              const toggle = item.querySelector(':scope > .nav-treeview-toggle');
              if (toggle) {
                toggle.setAttribute('aria-expanded', 'true');
              }
            }
            item = item.parentElement ? item.parentElement.closest('.nav-item') : null;
          }
        },
      );
    },
  };

  /**
   * Sidebar submenu expand/collapse.
   *
   * The chevron is a dedicated button (sibling of the link), so clicking the
   * link navigates to the section page while the chevron toggles the submenu in
   * place. CSS shows `.menu-open > .nav-treeview`, so we just toggle the class.
   */
  Drupal.behaviors.adminlteTreeviewToggle = {
    attach(context) {
      once(
        'adminlte-treeview-toggle',
        '.app-sidebar .sidebar-menu .nav-treeview-toggle',
        context,
      ).forEach((button) => {
        button.addEventListener('click', (event) => {
          event.preventDefault();
          const item = button.closest('.nav-item');
          if (!item) {
            return;
          }
          const isOpen = item.classList.toggle('menu-open');
          // Drive display inline: AdminLTE's slideDown leaves an inline
          // display:block on initially-open sections that a class alone can't undo.
          const submenu = item.querySelector(':scope > .nav-treeview');
          if (submenu) {
            submenu.style.display = isOpen ? 'block' : 'none';
          }
          button.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
      });
    },
  };

  /**
   * Moves a multi-action dropbutton's secondary actions into a floating menu.
   *
   * Drupal's dropbutton keeps the secondary actions inline in the same list,
   * which (without Claro's CSS) overflows onto neighbouring table rows when
   * opened. Relocating them into a positioned menu lets it float above content
   * like a Bootstrap dropdown. Drupal still toggles `.open` on the wrapper.
   */
  Drupal.behaviors.adminlteDropbutton = {
    attach(context) {
      // Core's dropbutton.js adds `.dropbutton-multiple` / `.secondary-action`
      // during this same attach cycle. Defer to a microtask so it has run first.
      Promise.resolve().then(() => {
        once('adminlte-dropbutton', '.dropbutton-multiple', context).forEach(
          (wrapper) => {
            const widget = wrapper.querySelector('.dropbutton-widget');
            const secondary = wrapper.querySelectorAll('.secondary-action');
            if (!widget || !secondary.length) {
              return;
            }
            const menu = document.createElement('ul');
            menu.className = 'dropbutton-menu';
            secondary.forEach((item) => menu.appendChild(item));
            widget.appendChild(menu);
          },
        );
      });
    },
  };
})(Drupal, once);
