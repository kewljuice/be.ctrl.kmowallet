<?php

require_once 'CRM/Core/Payment.php';

use CRM_ctrl_Kmowallet_ExtensionUtil as E;

class CRM_Core_Payment_KMOPayment extends CRM_Core_Payment {

  /**
   * We only need one instance of this object. So we use the singleton
   * pattern and cache the instance in this variable
   *
   * @var object
   * @static
   */
  static private $_singleton = NULL;

  /**
   * mode of operation: live or test
   *
   * @var object
   * @static
   */
  static protected $_mode = NULL;

  /**
   * Constructor
   *
   * @param string $mode the mode of operation: live or test
   *
   * @return void
   */
  function __construct($mode, &$paymentProcessor) {
    $this->_paymentProcessor = $paymentProcessor;
    $this->_processorName = E::ts('KMO Wallet', ['domain' => 'be.ctrl.kmowallet']);
  }

  /**
   * singleton function used to manage this object
   *
   * @param string $mode the mode of operation: live or test
   *
   * @return object
   * @static
   *
   */
  static function &singleton($mode, &$paymentProcessor) {
    $processorName = $paymentProcessor['name'];
    if (self::$_singleton[$processorName] === NULL) {
      self::$_singleton[$processorName] = new CRM_Core_Payment_KMOPayment($mode, $paymentProcessor);
    }
    return self::$_singleton[$processorName];
  }

  /**
   * This function checks to see if we have the right config values
   *
   * @return string the error message if any
   * @public
   */
  function checkConfig() {
    return NULL;
  }

  /**
   * Sets appropriate parameters for checking out KMO wallet
   *
   * @param array $params name value pair of contribution data
   *
   * @return void
   * @access public
   *
   */
  function doTransferCheckout(&$params, $component = 'contribute') {

    // Message.
    $message = E::ts("Process your payment with the 'kmo-portefeuille'.", ['domain' => 'be.ctrl.kmowallet']);
    CRM_Core_Session::setStatus($message, '', 'success');

    // Change participant status to "pending from pay later".
    try {
      $participant = civicrm_api3('Participant', 'create', [
        'id' => $params['participantID'],
        'status_id' => "Pending from pay later",
      ]);
    } catch (Exception $e) {
      // Log
      // watchdog("doTransferCheckout", print_r($e, true));
    }

    // Send confirmation email.
    try {
      $confirmation = civicrm_api3('Contribution', 'sendconfirmation', [
        'id' => $params['contributionID'],
      ]);
    } catch (Exception $e) {
      // Log
      // watchdog("doTransferCheckout", print_r($e, true));
    }

  }
}
