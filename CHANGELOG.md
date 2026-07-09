# Changelog

All notable changes to the AdminLTE 4 Drupal theme are documented here. The
format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and
this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- **Primary/accent colour picker** in theme settings — recolours links, focus
  rings, active states and `.btn-primary`
  ([#3608660](https://www.drupal.org/project/adminlte/issues/3608660)).
- **Drag-resizable sidebar** with a localStorage-persisted width and a
  configurable default width setting
  ([#3609296](https://www.drupal.org/project/adminlte/issues/3609296)).
- **Bootstrap Icons pack** for Drupal's Icon API (`adminlte.icons.yml`) — optional,
  activates when `ui_icons` (`ui_icons_font`) is enabled
  ([#3609048](https://www.drupal.org/project/adminlte/issues/3609048)).
- **Components demo** at `docs/components.html`
  ([#3608677](https://www.drupal.org/project/adminlte/issues/3608677)).
- Bundle **Source Sans 3** (the default AdminLTE/Bootstrap body font) locally —
  weights 300/400/700, Latin + Latin-Extended, under the SIL OFL. The intended
  default typography now renders without a CDN or a system-installed font
  ([#3609458](https://www.drupal.org/project/adminlte/issues/3609458)).
- Theme setting **Start with the sidebar collapsed** — first-load `sidebar-collapse`
  ([#3608687](https://www.drupal.org/project/adminlte/issues/3608687)).
- Theme setting **Compact mode** — denser shell via `compact-mode`
  ([#3608663](https://www.drupal.org/project/adminlte/issues/3608663)).
- Theme setting **Force RTL layout** — `dir="rtl"` + the bundled RTL stylesheet.
  (RTL site languages already auto-load `adminlte.rtl.css`.)
  ([#3608661](https://www.drupal.org/project/adminlte/issues/3608661)).
- `.gitlab-ci.yml` using the Drupal Association contrib CI template, plus a
  cspell project dictionary
  ([#3607152](https://www.drupal.org/project/adminlte/issues/3607152)).
- README: navigation-block guidance (frontend vs. admin theme), a CSS Editor
  recommendation, and a first-party-by-Colorlib note
  ([#3608681](https://www.drupal.org/project/adminlte/issues/3608681),
  [#3608659](https://www.drupal.org/project/adminlte/issues/3608659),
  [#3608672](https://www.drupal.org/project/adminlte/issues/3608672)).

### Changed

- **Base theme is now Bootstrap5** instead of the deprecated Stable9. This
  supplies Drupal core-markup glue CSS (fields, forms, tables, pager, messages)
  and adds a `drupal/bootstrap5` dependency; AdminLTE keeps its own bundled
  Bootstrap build (Bootstrap5's CSS/JS is disabled)
  ([#3609244](https://www.drupal.org/project/adminlte/issues/3609244),
  [#3608934](https://www.drupal.org/project/adminlte/issues/3608934)).
- **Dark sidebar is now off by default** — the sidebar follows the active
  light/dark colour mode unless the setting is enabled
  ([#3608682](https://www.drupal.org/project/adminlte/issues/3608682)).
- Login / register / reset-password pages render as a centred, constrained card
  instead of spanning the full content width
  ([#3608688](https://www.drupal.org/project/adminlte/issues/3608688)).

### Fixed

- Lower the `.app-header` / `.app-sidebar` z-index below Drupal's admin toolbar
  so the toolbar (and Admin Toolbar Search autocomplete) is no longer hidden
  behind the theme chrome
  ([#3608932](https://www.drupal.org/project/adminlte/issues/3608932)).

## [1.0.0-beta1] - 2026-06-29

First public release. Official **AdminLTE 4** admin theme for **Drupal 10.3+ / 11**
— Bootstrap 5.3, vanilla JS (no jQuery), light & dark modes, fully self-contained
(no CDN). Verified on a clean Drupal 11.3.13 install (standard profile, PHP 8.5):
every core admin screen renders with the AdminLTE shell in both colour modes, with
no errors or warnings in the log.

### Added

- AdminLTE 4 application shell (`html.html.twig`, `page.html.twig`) mapping Drupal
  regions onto the navbar, sidebar, content header, content and footer.
- Self-contained, locally bundled assets: `adminlte.css` (Bootstrap 5.3 included),
  `adminlte.js`, `bootstrap.bundle.min.js` and Bootstrap Icons — no CDN required.
- **Sidebar** shows Drupal's Administration menu as a collapsible AdminLTE treeview
  with per-section icons, shipped as a default block placement. The active section
  is highlighted and auto-expanded. Clicking a parent item's **label navigates** to
  its section page; clicking the **chevron expands/collapses** the submenu in place
  (a real toggle button with `aria-expanded`). "Main navigation" renders below it.
- **Navbar user dropdown** (user picture/icon + name, a header, and icon-prefixed
  account links); anonymous users get an inline "Log in" link.
- **Admin components** bridged to Bootstrap/AdminLTE: operations **dropbuttons**
  (floating, opaque menu), **tabledrag** handles, **vertical tabs**, **pagers**,
  jQuery-UI **modal dialogs**, admin **tabs** (nav-tabs/pills) and **status
  messages** (dismissible alerts), plus `.form-actions`, `.action-links`, inline
  containers and the AJAX throbber. Full module descriptions on the Extend page.
- **Light / dark** colour modes with a navbar toggle, OS-preference auto mode, and
  a flash-free inline theme initialiser (mirrors AdminLTE core #6043).
- **Theme settings**: default colour mode and dark sidebar.
- Default block placement in `config/install` (and an optional Help block in
  `config/optional`) so the theme renders immediately on enable.
- Bridge CSS mapping Drupal's admin form/button/table markup onto Bootstrap, and a
  displacement offset so the shell coexists with the core admin toolbar.
- Passes Drupal coding standards (PHPCS `Drupal` + `DrupalPractice`).

### Known limitations

- Deeper admin screens (Views UI drag-and-drop, Field UI, Media Library) may
  benefit from additional bridge styles.
- Gin-style toolbar coexistence is not specifically tuned (the core toolbar is).

[Unreleased]: https://github.com/ColorlibHQ/adminlte-drupal/compare/1.0.0-beta1...HEAD
[1.0.0-beta1]: https://github.com/ColorlibHQ/adminlte-drupal/releases/tag/1.0.0-beta1
