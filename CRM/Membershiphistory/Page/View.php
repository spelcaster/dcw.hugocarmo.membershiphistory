<?php

class CRM_Membershiphistory_Page_View extends CRM_Core_Page {

  public function run() {
    $getFields = ['cid', 'membership_id'];

    $params = [];

    foreach ($getFields as $key) {
      if (isset($_GET[$key])) {
        $params[$key] = $_GET[$key];
      }
    }

    $result = civicrm_api3(
        'MembershipHistory',
        'getlist',
        $params
    );

    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(ts('Membership History'));

    // Example: Assign a variable for use in a template
    $this->assign('data', $result['values']);

    parent::run();
  }

}
