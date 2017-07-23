-- Author: Hugo Augusto Freitas do Carmo <hugrito.kun@gmail.com
--
-- > every civicrm_membership entry must have an id, start_date and an entry in
--   civicrm_membership_payment;
-- > members with lifetime membership doesn't have an end_date;


-- Create Table dcw_hugocarmo_membershiphistory
CREATE TABLE dcw_hugocarmo_membershiphistory (
    id int(10) unsigned NOT NULL AUTO_INCREMENT,
    fk_membership_id int(10) unsigned NOT NULL,
    fk_contribution_id int(10) unsigned NOT NULL,
    start_date date NOT NULL,
    end_date date,

    PRIMARY KEY (id),
    INDEX (fk_membership_id),
    INDEX (fk_contribution_id),

    FOREIGN KEY (fk_membership_id) REFERENCES civicrm_membership(id),
    FOREIGN KEY (fk_contribution_id) REFERENCES civicrm_contribution(id)
) ENGINE=INNODB;

-- Populate the dcw_hugocarmo_membershiphistory with existing data
INSERT INTO dcw_hugocarmo_membershiphistory (
    fk_membership_id,
    fk_contribution_id,
    start_date,
    end_date)
SELECT civicrm_membership.id,
    civicrm_membership_payment.contribution_id ,
    civicrm_membership.start_date,
    civicrm_membership.end_date
FROM civicrm_membership
LEFT JOIN civicrm_membership_payment
ON civicrm_membership.id = civicrm_membership_payment.membership_id;
