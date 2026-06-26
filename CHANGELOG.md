# Changelog

All notable changes to the AdminLTE 4 Drupal theme are documented here. The
format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and
this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- Initial AdminLTE 4 admin theme for Drupal 10.3+ / 11.
- AdminLTE application shell (`html.html.twig`, `page.html.twig`) mapping Drupal
  regions onto AdminLTE's navbar, sidebar, content header, content and footer.
- Self-contained, locally bundled assets: `adminlte.css` (Bootstrap 5.3 included),
  `adminlte.js`, `bootstrap.bundle.min.js` and Bootstrap Icons — no CDN required.
- Sidebar treeview menu via `menu--main.html.twig`.
- Admin tabs styled as Bootstrap nav-tabs/pills (`menu-local-tasks`).
- Status messages rendered as dismissible Bootstrap alerts.
- Light / dark colour modes with a navbar toggle, OS-preference auto mode, and a
  flash-free inline theme initialiser (mirrors AdminLTE core #6043).
- Theme settings: default colour mode and dark sidebar.
- Default block placement shipped in `config/install` (and an optional Help block
  in `config/optional`) so the theme renders immediately on enable.
- Bridge CSS mapping Drupal's admin form/button/table markup onto Bootstrap, plus
  a toolbar-displacement offset.

### Changed

- The sidebar now surfaces Drupal's **Administration menu** as a collapsible
  AdminLTE treeview (Content, Structure, Appearance, Extend, Configuration,
  People, Reports, Help) with per-section icons, shipped as a default block
  placement (`adminlte_admin`). The active section is highlighted and
  auto-expanded — resolved client-side by longest matching path, which is robust
  across menus. The "Main navigation" menu still renders below it. New
  `menu--admin.html.twig` + `adminlte_preprocess_menu__admin()` (which also
  unwraps the redundant "Administration" root), and an `adminlteSidebarActive`
  JS behavior.
- The navbar account menu is now a proper AdminLTE **user dropdown** (avatar/icon
  with username, plus a header and icon-prefixed "My account" / "Log out" items)
  instead of a bare bulleted list. Anonymous users see an inline "Log in" link.
  New `menu--account.html.twig`, `block--adminlte-account-menu.html.twig`, and
  `adminlte_preprocess_menu__account()`; the colour-mode toggle moves left of it.

### Verified

- Tested on a clean Drupal 11.3.13 install (standard profile, PHP 8.5): all core
  admin screens render with the AdminLTE shell, both colour modes work, and the
  Drupal log is free of errors and warnings after a full browse.
- `screenshot.png` captured from the running site; screenshots added under
  `docs/screenshots/`.
- Fixed admin-toolbar coexistence: the AdminLTE header is `position: relative`, so
  offsetting it with `top` shifted the navbar over the content header (hiding the
  page title and breadcrumb). Drupal's toolbar already offsets the body, so the
  header offset was removed; only the sticky sidebar's stick point is nudged.

### Known limitations

- Form/table coverage is intentionally pragmatic; deeper admin screens (Views UI,
  Field UI, media library) may need additional bridge styles.
- Gin-style toolbar coexistence is not specifically tuned (core toolbar is).
