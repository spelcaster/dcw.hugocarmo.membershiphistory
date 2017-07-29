<?php

function membershiphistory_civicrm_post($action, $objectName, $objectId, &$objectRef ) {
    if ($objectName != "LineItem") {
        return;
    } else if (($objectRef->entity_table != "civicrm_membership")
        && ($action != "create") && ($action != "delete")) {
        return;
    }

    $membershipId = $objectRef->entity_id;

    $result = civicrm_api3(
        'Membership', 'get', array('id' => $membershipId)
    );

    if (!$result["count"]) {
        return;
    }

    $arr = [
        "fk_membership_id" => $membershipId,
        "fk_contribution_id" => $objectRef->contribution_id,
        "start_date" => $result["values"][$membershipId]["start_date"],
        "end_date" => $result["values"][$membershipId]["end_date"],
    ];

    $result = civicrm_api3(
        'MembershipHistory', $action, $arr
    );
}

function membershiphistory_civicrm_tabs (&$tabs, $contactId) {
    // add membershipperiod tab
}
