<?php

/**
 * @file
 * Theme settings form for the AdminLTE 4 theme.
 */

declare(strict_types=1);

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function adminlte_form_system_theme_settings_alter(array &$form, FormStateInterface $form_state): void {
  $themeSettingsProvider = \Drupal::service('Drupal\Core\Extension\ThemeSettingsProvider');

  $form['adminlte'] = [
    '#type' => 'details',
    '#title' => t('AdminLTE layout'),
    '#open' => TRUE,
    '#weight' => -10,
  ];

  $form['adminlte']['default_color_mode'] = [
    '#type' => 'select',
    '#title' => t('Default color mode'),
    '#description' => t("Applied on a visitor's first visit. Visitors can override it with the navbar toggle; their choice is remembered in the browser."),
    '#options' => [
      'auto' => t('Auto (follow operating system)'),
      'light' => t('Light'),
      'dark' => t('Dark'),
    ],
    '#default_value' => $themeSettingsProvider->getSetting('default_color_mode') ?? 'auto',
  ];

  $form['adminlte']['sidebar_dark'] = [
    '#type' => 'checkbox',
    '#title' => t('Dark sidebar'),
    '#description' => t('Render the sidebar with a dark surface regardless of the page color mode. When off, the sidebar follows the active light/dark color mode.'),
    '#default_value' => $themeSettingsProvider->getSetting('sidebar_dark') ?? FALSE,
  ];

  $form['adminlte']['sidebar_collapsed'] = [
    '#type' => 'checkbox',
    '#title' => t('Start with the sidebar collapsed'),
    '#description' => t('Render the sidebar collapsed to icons by default. Visitors can still expand it with the navbar toggle.'),
    '#default_value' => $themeSettingsProvider->getSetting('sidebar_collapsed') ?? FALSE,
  ];

  $form['adminlte']['compact_mode'] = [
    '#type' => 'checkbox',
    '#title' => t('Compact mode'),
    '#description' => t('Tighten spacing throughout the shell (denser navbar, sidebar and content) for information-heavy admin screens.'),
    '#default_value' => $themeSettingsProvider->getSetting('compact_mode') ?? FALSE,
  ];

  $form['adminlte']['force_rtl'] = [
    '#type' => 'checkbox',
    '#title' => t('Force right-to-left (RTL) layout'),
    '#description' => t('Force the RTL stylesheet and <code>dir="rtl"</code> on every page. Leave off for RTL site languages — Drupal already loads the bundled RTL stylesheet automatically for those.'),
    '#default_value' => $themeSettingsProvider->getSetting('force_rtl') ?? FALSE,
  ];

  $form['adminlte']['primary_color'] = [
    '#type' => 'color',
    '#title' => t('Primary (accent) color'),
    '#description' => t('Recolors the primary accent — links, focus rings, active states and Bootstrap <code>.btn-primary</code>. Set it back to <code>#0d6efd</code> for the AdminLTE default. Note: Bootstrap components compiled with the default blue (e.g. <code>.alert-primary</code>) are not fully recolored at runtime; deep customisation is driven by <a href=":url">AdminLTE CSS variables</a>.', [':url' => 'https://adminlte.io/themes/v4/docs/customization.html']),
    '#default_value' => $themeSettingsProvider->getSetting('primary_color') ?: '#000000',
  ];

  $form['adminlte']['sidebar_width'] = [
    '#type' => 'number',
    '#title' => t('Default sidebar width (px)'),
    '#description' => t('Initial sidebar width in pixels (180–480). Visitors can drag the sidebar edge to resize it; their choice is remembered in the browser. Leave empty for the AdminLTE default (250).'),
    '#min' => 180,
    '#max' => 480,
    '#step' => 1,
    '#default_value' => $themeSettingsProvider->getSetting('sidebar_width') ?: NULL,
  ];

  $form['adminlte']['navigation_icons'] = [
    '#type' => 'details',
    '#title' => t('Navigation icons'),
    '#open' => FALSE,
  ];

  $form['adminlte']['navigation_icons']['nav_icon_top_level'] = [
    '#type' => 'textfield',
    '#title' => t('Top-level sidebar icon class'),
    '#description' => t('Bootstrap Icons class for top-level sidebar menu items that do not have a specific icon (e.g. <code>bi-record-circle</code>). Leave empty to hide icons at this level.'),
    '#default_value' => $themeSettingsProvider->getSetting('nav_icon_top_level') ?? 'bi-record-circle',
  ];

  $form['adminlte']['navigation_icons']['nav_icon_sub_level'] = [
    '#type' => 'textfield',
    '#title' => t('Sub-level sidebar icon class'),
    '#description' => t('Bootstrap Icons class for nested sidebar menu items (e.g. <code>bi-circle</code>). Leave empty to hide icons at this level.'),
    '#default_value' => $themeSettingsProvider->getSetting('nav_icon_sub_level') ?? 'bi-circle',
  ];
}
