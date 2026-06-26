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

### Known limitations / TODO

- Not yet verified on a live Drupal install — treat as a first scaffold.
- `screenshot.png` still needs to be captured from a running site (294×219).
- Admin toolbar / Gin coexistence offset is best-effort and needs testing.
- Form/table coverage is intentionally minimal; deeper admin screens (Views UI,
  Field UI, media library) may need additional bridge styles.
