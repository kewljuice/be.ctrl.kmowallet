<?php

require_once 'kmowallet.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function kmowallet_civicrm_config(&$config) {
  _kmowallet_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function kmowallet_civicrm_xmlMenu(&$files) {
  _kmowallet_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function kmowallet_civicrm_install() {
  _kmowallet_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function kmowallet_civicrm_postInstall() {
  _kmowallet_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function kmowallet_civicrm_uninstall() {
  _kmowallet_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function kmowallet_civicrm_enable() {
  _kmowallet_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function kmowallet_civicrm_disable() {
  _kmowallet_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function kmowallet_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _kmowallet_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function kmowallet_civicrm_managed(&$entities) {
  $entities[] = [
    'module' => 'be.ctrl.kmowallet',
    'name' => 'KMO Wallet',
    'entity' => 'PaymentProcessorType',
    'params' => [
      'version' => 3,
      'name' => 'KMO_wallet',
      'title' => 'KMO wallet payment',
      'description' => 'KMO wallet payment option.',
      'class_name' => 'Payment_KMOPayment',
      'billing_mode' => 'notify',
      'user_name_label' => 'Username',
      'is_recur' => 0,
      'payment_type' => 1,
    ],
  ];
  $entities[] = [
    'module' => 'be.ctrl.kmowallet',
    'name' => 'KMO Wallet',
    'entity' => 'OptionValue',
    'params' => [
      'version' => 3,
      'option_group_id' => 'payment_instrument',
      'label' => 'KMO',
      'name' => 'KMO',
    ],
  ];
  _kmowallet_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function kmowallet_civicrm_caseTypes(&$caseTypes) {
  _kmowallet_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function kmowallet_civicrm_angularModules(&$angularModules) {
  _kmowallet_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function kmowallet_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _kmowallet_civix_civicrm_alterSettingsFolders($metaDataFolders);
}
