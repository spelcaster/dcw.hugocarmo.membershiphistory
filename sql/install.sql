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

    FOREIGN KEY (fk_membership_id)
        REFERENCES civicrm_membership(id)
        ON DELETE CASCADE,
    FOREIGN KEY (fk_contribution_id)
        REFERENCES civicrm_contribution(id)
        ON DELETE CASCADE
) ENGINE=INNODB;

-- Populate the dcw_hugocarmo_membershiphistory with existing data
INSERT INTO dcw_hugocarmo_membershiphistory (
    fk_membership_id,
    fk_contribution_id,
    start_date,
    end_date)
SELECT m.id,
    p.contribution_id ,
    m.start_date,
    m.end_date
FROM civicrm_membership m
LEFT JOIN civicrm_membership_payment p
ON m.id = p.membership_id;
