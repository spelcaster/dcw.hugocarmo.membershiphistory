<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2017                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2017
 *
 * Generated from xml/schema/CRM/Membershiphistory/MembershipHistory.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 * (GenCodeChecksum:5a292bdd8df8b9cafeaaa5a5c254ac06)
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
/**
 * CRM_Membershiphistory_DAO_MembershipHistory constructor.
 */
class CRM_Membershiphistory_DAO_MembershipHistory extends CRM_Core_DAO {
  /**
   * Static instance to hold the table name.
   *
   * @var string
   */
  static $_tableName = 'dcw_hugocarmo_membershiphistory';
  /**
   * Should CiviCRM log any modifications to this table in the civicrm_log table.
   *
   * @var boolean
   */
  static $_log = true;
  /**
   * MembershipHistory unique id
   *
   * @var int unsigned
   */
  public $id;
  /**
   * Membership period start date
   *
   * @var date
   */
  public $start_date;
  /**
   * Membership period end date
   *
   * @var end_date
   */
  public $end_date;
  /**
   * FK to Membership
   *
   * @var int unsigned
   */
  public $fk_membership_id;
  /**
   * FK to Contribution
   *
   * @var int unsigned
   */
  public $fk_contribution_id;
  /**
   * Class constructor.
   */
  function __construct() {
    $this->__table = 'dcw_hugocarmo_membershiphistory';
    parent::__construct();
  }
  /**
   * Returns foreign keys and entity references.
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  static function getReferenceColumns() {
    if (!isset(Civi::$statics[__CLASS__]['links'])) {
      Civi::$statics[__CLASS__]['links'] = static ::createReferenceColumns(__CLASS__);
      Civi::$statics[__CLASS__]['links'][] = new CRM_Core_Reference_Basic(self::getTableName() , 'fk_membership_id', 'civicrm_contribution', 'id');
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'links_callback', Civi::$statics[__CLASS__]['links']);
    }
    return Civi::$statics[__CLASS__]['links'];
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields() {
    if (!isset(Civi::$statics[__CLASS__]['fields'])) {
      Civi::$statics[__CLASS__]['fields'] = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => 'MembershipHistory unique id',
          'required' => true,
          'table_name' => 'dcw_hugocarmo_membershiphistory',
          'entity' => 'MembershipHistory',
          'bao' => 'CRM_Membershiphistory_DAO_MembershipHistory',
          'localizable' => 0,
        ) ,
        'start_date' => array(
          'name' => 'start_date',
          'type' => CRM_Utils_Type::T_DATE,
          'title' => ts('Start Date') ,
          'description' => 'Membership period start date',
          'required' => true,
          'table_name' => 'dcw_hugocarmo_membershiphistory',
          'entity' => 'MembershipHistory',
          'bao' => 'CRM_Membershiphistory_DAO_MembershipHistory',
          'localizable' => 0,
        ) ,
        'end_date' => array(
          'name' => 'end_date',
          'type' => CRM_Utils_Type::T_DATE,
          'title' => ts('End Date') ,
          'description' => 'Membership period end date',
          'required' => false,
          'table_name' => 'dcw_hugocarmo_membershiphistory',
          'entity' => 'MembershipHistory',
          'bao' => 'CRM_Membershiphistory_DAO_MembershipHistory',
          'localizable' => 0,
        ) ,
        'fk_membership_id' => array(
          'name' => 'fk_membership_id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => 'FK to Membership',
          'table_name' => 'dcw_hugocarmo_membershiphistory',
          'entity' => 'MembershipHistory',
          'bao' => 'CRM_Membershiphistory_DAO_MembershipHistory',
          'localizable' => 0,
          'FKClassName' => 'CRM_Contribute_DAO_Contribution',
        ) ,
        'fk_contribution_id' => array(
          'name' => 'fk_contribution_id',
          'type' => CRM_Utils_Type::T_INT,
          'description' => 'FK to Contribution',
          'table_name' => 'dcw_hugocarmo_membershiphistory',
          'entity' => 'MembershipHistory',
          'bao' => 'CRM_Membershiphistory_DAO_MembershipHistory',
          'localizable' => 0,
        ) ,
      );
      CRM_Core_DAO_AllCoreTables::invoke(__CLASS__, 'fields_callback', Civi::$statics[__CLASS__]['fields']);
    }
    return Civi::$statics[__CLASS__]['fields'];
  }
  /**
   * Return a mapping from field-name to the corresponding key (as used in fields()).
   *
   * @return array
   *   Array(string $name => string $uniqueName).
   */
  static function &fieldKeys() {
    if (!isset(Civi::$statics[__CLASS__]['fieldKeys'])) {
      Civi::$statics[__CLASS__]['fieldKeys'] = array_flip(CRM_Utils_Array::collect('name', self::fields()));
    }
    return Civi::$statics[__CLASS__]['fieldKeys'];
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTableName() {
    return self::$_tableName;
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog() {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false) {
    $r = CRM_Core_DAO_AllCoreTables::getImports(__CLASS__, 'membershiphistory', $prefix, array());
    return $r;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false) {
    $r = CRM_Core_DAO_AllCoreTables::getExports(__CLASS__, 'membershiphistory', $prefix, array());
    return $r;
  }
  /**
   * Returns the list of indices
   */
  public static function indices($localize = TRUE) {
    $indices = array();
    return ($localize && !empty($indices)) ? CRM_Core_DAO_AllCoreTables::multilingualize(__CLASS__, $indices) : $indices;
  }
}
