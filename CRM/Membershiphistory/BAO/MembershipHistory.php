<?php

class CRM_Membershiphistory_BAO_MembershipHistory extends CRM_Membershiphistory_DAO_MembershipHistory {
  /**
   * Class constructor.
   */
  public function __construct() {
    parent::__construct();
  }

  /**
   * Create a new MembershipHistory based on array-data
   *
   * @param array $params key-value pairs
   * @return CRM_Membershiphistory_DAO_MembershipHistory|NULL
   */
  public static function create($params) {
    $className = 'CRM_Membershiphistory_DAO_MembershipHistory';
    $entityName = 'MembershipHistory';

    $sql = <<<EOF
SELECT *
FROM dcw_hugocarmo_membershiphistory
WHERE dcw_hugocarmo_membershiphistory.fk_membership_id = %1
ORDER BY dcw_hugocarmo_membershiphistory.id DESC
LIMIT 1
EOF;

    $resolve = [
        1 => array($params['fk_membership_id'], 'Integer')
    ];

    $dao = CRM_Core_DAO::executeQuery($sql, $resolve);

    if ($dao->fetch()) {
        $params['start_date'] = $dao->end_date;
    }

    CRM_Utils_Hook::pre('create', $entityName, CRM_Utils_Array::value('id', $params), $params);

    $instance = new $className();
    $instance->copyValues($params);
    $instance->save();

    CRM_Utils_Hook::post('create', $entityName, $instance->id, $instance);

    return $instance;
  }
}
