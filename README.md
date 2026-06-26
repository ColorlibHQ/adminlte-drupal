# AdminLTE 4 for Drupal

[![License: GPL v2+](https://img.shields.io/badge/License-GPL%20v2+-blue.svg)](LICENSE)
[![Drupal 10.3+ | 11](https://img.shields.io/badge/Drupal-10.3%2B%20%7C%2011-0678BE.svg?logo=drupal&logoColor=white)](https://www.drupal.org/)
[![Bootstrap 5.3](https://img.shields.io/badge/Bootstrap-5.3-7952b3.svg?logo=bootstrap&logoColor=white)](https://getbootstrap.com/docs/5.3/)

Official **AdminLTE 4** admin theme for **Drupal** — Bootstrap 5.3, vanilla JS
(no jQuery), light & dark colour modes. Self-contained: all assets are bundled
locally, no CDN required. By [Colorlib](https://colorlib.com).

> **Status: early scaffold.** This is a first, structurally complete version that
> has **not yet been verified on a live Drupal install**. See
> [Known limitations](#known-limitations) before using in production.

## Also available for your stack

The same AdminLTE 4 dashboard, in the framework you know best — you're looking at the **Drupal** edition:

<p align="center">
  <a href="https://github.com/ColorlibHQ/adminlte-react"><img height="36" alt="React" src="https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB"></a>
  <a href="https://github.com/ColorlibHQ/adminlte-vue"><img height="36" alt="Vue" src="https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D"></a>
  <a href="https://github.com/ColorlibHQ/adminlte-laravel"><img height="36" alt="Laravel" src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"></a>
  <a href="https://github.com/ColorlibHQ/adminlte-django"><img height="36" alt="Django" src="https://img.shields.io/badge/Django-092E20?style=for-the-badge&logo=django&logoColor=white"></a>
  <a href="https://www.drupal.org/project/adminlte"><img height="36" alt="Drupal — you are here" src="https://img.shields.io/badge/Drupal-you%20are%20here-0678BE?style=for-the-badge&logo=drupal&logoColor=white"></a>
</p>

> Also available as the original [AdminLTE](https://github.com/ColorlibHQ/AdminLTE) (HTML · Bootstrap 5.3 · vanilla JS — [demo](https://adminlte.io/themes/v4/)).

## Requirements

- Drupal **10.3+** or **11**
- PHP 8.1+ (as required by your Drupal core version)

## Installation

### With Composer (recommended)

```bash
composer require drupal/adminlte
drush theme:enable adminlte
drush config:set system.theme admin adminlte   # use as the administration theme
```

### Manual

1. Download the theme and extract it into `themes/contrib/adminlte`.
2. Visit **Appearance** (`/admin/appearance`).
3. Under *Uninstalled themes*, click **Install** (or **Install and set as default**)
   next to **AdminLTE 4**.
4. To use it only for the admin UI, set it as the **Administration theme** at
   `/admin/appearance` → *Administration theme*.

On enable, the theme ships default block placement (`config/install`), so the
sidebar menu, navbar, breadcrumbs, tabs, messages and content render immediately.

## Regions

| Region          | AdminLTE location                          |
|-----------------|--------------------------------------------|
| `navbar_left`   | Top navbar, after the sidebar toggle       |
| `navbar_right`  | Top navbar, right (account menu, toggle)   |
| `sidebar_brand` | Sidebar header (site logo + name)          |
| `sidebar`       | Sidebar treeview menu                      |
| `page_title`    | Content header (left)                      |
| `breadcrumb`    | Content header (right)                     |
| `highlighted`   | Status messages                            |
| `help`          | Contextual help                            |
| `content`       | Main content (tabs, actions, page content) |
| `footer`        | App footer                                  |
| `page_top` / `page_bottom` | Reserved for core (admin toolbar) |

## Theme settings

At `/admin/appearance/settings/adminlte`:

- **Default colour mode** — `auto` (follow OS), `light` or `dark`. Visitors can
  override it with the navbar toggle; their choice is remembered in the browser.
- **Dark sidebar** — render the sidebar dark regardless of page mode (applied via
  `data-bs-theme="dark"` on the sidebar).

## What's bundled

| Asset | Notes |
|-------|-------|
| `css/adminlte.css` | AdminLTE 4 styles — **Bootstrap 5.3 CSS included** |
| `js/adminlte.js` | AdminLTE behaviours (sidebar, treeview) |
| `js/vendor/bootstrap.bundle.min.js` | Bootstrap 5.3 + Popper |
| `css/vendor/bootstrap-icons.min.css` + fonts | Bootstrap Icons 1.13 |

Everything is served from the theme — no external CDN calls.

## Known limitations

This is a **first scaffold**. Before relying on it:

- It has not yet been installed/tested on a running Drupal site.
- `screenshot.png` (294×219) still needs to be captured.
- Admin **toolbar** / **Gin** coexistence uses Drupal's displacement variable but
  needs real-world verification.
- The bridge CSS covers common form/button/table markup; complex admin screens
  (Views UI, Field UI, Media Library) may need extra styling.

Issues and patches welcome.

## Credits

Built on [AdminLTE 4](https://github.com/ColorlibHQ/AdminLTE) by
[Colorlib](https://colorlib.com). Drupal theme requested in
[ColorlibHQ/AdminLTE#6057](https://github.com/ColorlibHQ/AdminLTE/discussions/6057).

## License

GPL-2.0-or-later, per Drupal.org requirements. Bundled AdminLTE, Bootstrap and
Bootstrap Icons assets are MIT (GPL-compatible). See [LICENSE](LICENSE).
