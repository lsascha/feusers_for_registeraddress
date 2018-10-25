#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (
    module_sys_dmail_html tinyint(3) unsigned NOT NULL DEFAULT '0',
    registeraddresshash varchar(40) DEFAULT '' NOT NULL,
    eigene_anrede varchar(255) DEFAULT '' NOT NULL,
    tx_directmailsubscription_localgender varchar(255) DEFAULT '' NOT NULL,
    gender varchar(1) DEFAULT '' NOT NULL,
    consent text,
);
