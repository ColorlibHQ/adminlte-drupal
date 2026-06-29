# Changelog

All notable changes to the AdminLTE 4 Drupal theme are documented here. The
format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and
this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

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
