<?php

/**
 * MembershipHistory.create API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_membership_history_create_spec(&$spec) {
  $spec['fk_membership_id']['api.required'] = 1;
  $spec['fk_contribution_id']['api.required'] = 1;
  $spec['start_date']['api.required'] = 1;
  $spec['end_date']['api.required'] = 0;
}

/**
 * MembershipHistory.create API
 *
 * @param array $params
 * @return array API result descriptor
 * @throws API_Exception
 */
function civicrm_api3_membership_history_create($params) {
  $dao = CRM_Membershiphistory_BAO_MembershipHistory::create($params);

  if (array_key_exists('is_error', $dao)) {
      return civicrm_api3_create_error(
          ts('The membership history can not be saved, no valid membership status for given dates')
      );
  }

  $result = array();
  _civicrm_api3_object_to_array($dao, $result[$dao->id]);

  return civicrm_api3_create_success(
      $result, $params, 'MembershipHistory', 'create', $dao
  );
}

/**
 * MembershipHistory.delete API
 *
 * @param array $params
 * @return array API result descriptor
 * @throws API_Exception
 */
function civicrm_api3_membership_history_delete($params) {
  return _civicrm_api3_basic_delete(_civicrm_api3_get_BAO(__FUNCTION__), $params);
}

/**
 * MembershipHistory.get API
 *
 * @param array $params
 * @return array API result descriptor
 * @throws API_Exception
 */
function civicrm_api3_membership_history_get($params) {
  $options = _civicrm_api3_get_options_from_params(
    $params, TRUE, 'MembershipHistory', 'get'
  );

  if ($options['is_count']) {
    return civicrm_api3_create_error(
      ts('MembershipHistory getcount not implemented')
    );
  }
}

/**
 * MembershipHistory.get API
 *
 * @param array $params
 * @return array API result descriptor
 * @throws API_Exception
 */
function civicrm_api3_membership_history_getlist($params) {
    $resolve = [];
    $sql = <<<EOF
SELECT a.display_name as display_name,
    m.id as membership_id,
    m.contact_id as cid,
    h.id as id,
    h.start_date as start_date,
    h.end_date as end_date,
    c.id as contribution_id
FROM civicrm_contact a
RIGHT JOIN civicrm_membership m
ON a.id = m.contact_id
JOIN dcw_hugocarmo_membershiphistory h
ON m.id = h.fk_membership_id
JOIN civicrm_contribution c
ON c.id = h.fk_contribution_id
WHERE a.is_deleted = 0

EOF;

    $resolveId = 1;
    if (isset($params['cid'])) {
        $resolve[$resolveId] = [$params['cid'], "Integer"];
        $sql .= "\n AND a.id = %${resolveId}\n";
        $resolveId++;
    }

    if (isset($params['membership_id'])) {
        $resolve[$resolveId] = [$params['membership_id'], "Integer"];
        $sql .= "\n AND m.id = %${resolveId}\n";
        $resolveId++;
    }

    $sql .= <<<EOF
ORDER BY m.id, h.id
EOF;

    $dao = CRM_Core_DAO::executeQuery($sql, $resolve);

    $props = [
        'display_name',
        'cid',
        'id',
        'start_date',
        'end_date',
        'membership_id',
        'contribution_id'
    ];

    $result = [];
    $i = 0;
    while ($dao->fetch()) {
        foreach ($props as $prop) {
            $result[$i][$prop] = $dao->$prop;
        }
        $i++;
    }

    return civicrm_api3_create_success(
        $result, $params, 'MembershipHistory', 'getquick'
    );
}
