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
  $form['adminlte'] = [
    '#type' => 'details',
    '#title' => t('AdminLTE layout'),
    '#open' => TRUE,
    '#weight' => -10,
  ];

  $form['adminlte']['default_color_mode'] = [
    '#type' => 'select',
    '#title' => t('Default colour mode'),
    '#description' => t("Applied on a visitor's first visit. Visitors can override it with the navbar toggle; their choice is remembered in the browser."),
    '#options' => [
      'auto' => t('Auto (follow operating system)'),
      'light' => t('Light'),
      'dark' => t('Dark'),
    ],
    '#default_value' => theme_get_setting('default_color_mode', 'adminlte') ?? 'auto',
  ];

  $form['adminlte']['sidebar_dark'] = [
    '#type' => 'checkbox',
    '#title' => t('Dark sidebar'),
    '#description' => t('Render the sidebar with a dark surface regardless of the page colour mode. When off, the sidebar follows the active light/dark colour mode.'),
    '#default_value' => theme_get_setting('sidebar_dark', 'adminlte') ?? FALSE,
  ];

  $form['adminlte']['sidebar_collapsed'] = [
    '#type' => 'checkbox',
    '#title' => t('Start with the sidebar collapsed'),
    '#description' => t('Render the sidebar collapsed to icons by default. Visitors can still expand it with the navbar toggle.'),
    '#default_value' => theme_get_setting('sidebar_collapsed', 'adminlte') ?? FALSE,
  ];

  $form['adminlte']['compact_mode'] = [
    '#type' => 'checkbox',
    '#title' => t('Compact mode'),
    '#description' => t('Tighten spacing throughout the shell (denser navbar, sidebar and content) for information-heavy admin screens.'),
    '#default_value' => theme_get_setting('compact_mode', 'adminlte') ?? FALSE,
  ];

  $form['adminlte']['force_rtl'] = [
    '#type' => 'checkbox',
    '#title' => t('Force right-to-left (RTL) layout'),
    '#description' => t('Force the RTL stylesheet and <code>dir="rtl"</code> on every page. Leave off for RTL site languages — Drupal already loads the bundled RTL stylesheet automatically for those.'),
    '#default_value' => theme_get_setting('force_rtl', 'adminlte') ?? FALSE,
  ];
}
