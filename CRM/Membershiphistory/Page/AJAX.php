<?php

require_once 'CRM/Core/Page.php';

class CRM_Membershiphistory_Page_AJAX extends CRM_Core_Page {
  public static function getMembershipHistory() {
    $params = [];

    if (isset($_GET['cid'])) {
      $params['cid'] = $_GET['cid'];
    }

    if (isset($_GET['membership_id'])) {
      $params['membership_id'] = $_GET['membership_id'];
    }

    $result = civicrm_api3(
        'MembershipHistory',
        'getlist',
        $params
    );

    CRM_Utils_JSON::output($result['values']);
  }
}
