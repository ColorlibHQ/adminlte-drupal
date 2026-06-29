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
    '#description' => t('Render the sidebar with a dark surface regardless of the page colour mode.'),
    '#default_value' => theme_get_setting('sidebar_dark', 'adminlte') ?? TRUE,
  ];
}
