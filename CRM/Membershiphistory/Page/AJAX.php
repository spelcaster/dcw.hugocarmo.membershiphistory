<?php

require_once 'CRM/Core/Page.php';

class CRM_Membershiphistory_Page_AJAX extends CRM_Core_Page {
  public static function getMembershipHistory() {
    $result = civicrm_api3(
        'MembershipHistory', 'getlist', []
    );

    CRM_Utils_JSON::output($result['values']);
  }
}
