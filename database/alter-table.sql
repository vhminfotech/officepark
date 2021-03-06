ALTER TABLE `addressbook` ADD `gender` ENUM('M','F') NOT NULL DEFAULT 'M' AFTER `company`, ADD `mobile` INT NULL AFTER `gender`, ADD `telefax` INT NULL AFTER `mobile`, ADD `note` TEXT NULL AFTER `telefax`;
ALTER TABLE `order_info` ADD `status` ENUM('new','viewed') NOT NULL DEFAULT 'new' AFTER `aggrement`; 
ALTER TABLE `order_info` ADD `user_id` INT NULL DEFAULT NULL AFTER `id`; 
ALTER TABLE `users` ADD `system_genrate_no` VARCHAR(255) NULL DEFAULT NULL AFTER `var_language`; 
CREATE TABLE `customer_no` ( `id` INT NOT NULL , `last_number` INT NOT NULL , `created_at` DATETIME NOT NULL , `update_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB; 
INSERT INTO `customer_no` (`id`, `last_number`, `created_at`, `update_at`) VALUES ('1', '1706', '2018-08-29 00:00:00', CURRENT_TIMESTAMP); 
CREATE TABLE `customer_user_no` ( `id` INT NOT NULL AUTO_INCREMENT , `generated_no` VARCHAR(255) NOT NULL , `user_id` INT NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
RENAME TABLE `customer_user_no` to `system_genrate_no`;
ALTER TABLE `system_genrate_no` DROP `user_id`;
INSERT INTO `system_genrate_no` (`id`, `generated_no`, `created_at`, `updated_at`) VALUES ('1', '021136874190000', '2018-08-24 00:00:00', CURRENT_TIMESTAMP); 

ALTER TABLE `invoice` ADD `is_paid` ENUM('Yes','No') NOT NULL DEFAULT 'No' AFTER `mail_send`;

ALTER TABLE `employee` ADD `customer_id` INT NULL AFTER `id`;

CREATE TABLE `officepark`.`calls` ( `id` INT NOT NULL AUTO_INCREMENT , `event` VARCHAR(255) NOT NULL , `uuid` VARCHAR(255) NOT NULL , `kid` INT NOT NULL , `cdr_id` BIGINT NOT NULL , `routing_id` INT NOT NULL , `service` VARCHAR(100) NOT NULL , `ddi` INT NOT NULL , `caller` BIGINT NOT NULL , `destination_number` BIGINT NOT NULL , `duration_in` INT NOT NULL , `duration_out` INT NOT NULL , `successfully` TINYINT NOT NULL , `date_time` DATETIME NOT NULL , `session_id` VARCHAR(255) NOT NULL , `timestamp` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `calls` ADD `created_at` DATETIME NOT NULL AFTER `timestamp`, ADD `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_at`;
UPDATE `system_genrate_no` SET `generated_no` = '0211-36874190-001' WHERE `system_genrate_no`.`id` = 1;

ALTER TABLE `calls` ADD `sent_mail` SMALLINT NOT NULL DEFAULT '0' AFTER `session_id`, ADD `gender` ENUM('M','F') NULL AFTER `sent_mail`, ADD `first_and_last_name` VARCHAR(255) NULL AFTER `gender`, ADD `caller_email` VARCHAR(255) NULL AFTER `first_and_last_name`, ADD `telephone_number` INT(80) NULL AFTER `caller_email`, ADD `caller_note` TEXT NULL AFTER `telephone_number`;

CREATE TABLE `officepark`.`template` ( `id` INT NOT NULL AUTO_INCREMENT , `message` TEXT NOT NULL , `updated_at` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `template` ADD `created_at` INT NOT NULL AFTER `message`;
ALTER TABLE `template` CHANGE `created_at` `created_at` DATETIME NOT NULL;
ALTER TABLE `template` CHANGE `updated_at` `updated_at` DATETIME NOT NULL;
ALTER TABLE `template` ADD `user_id` INT NULL AFTER `id`;

ALTER TABLE `users` ADD `user_image` VARCHAR(256) NULL AFTER `customer_number`;

ALTER TABLE `calls` CHANGE `destination_number` `destination_number` VARCHAR(56) NOT NULL;
ALTER TABLE `calls` ADD `is_popup` TINYINT NOT NULL DEFAULT '0' AFTER `caller_note`;
UPDATE `calls` SET `is_popup` = '1'

ALTER TABLE `customer_plan` CHANGE `transfer_call_no` `transfer_call_no` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;
ALTER TABLE `customer_plan` CHANGE `responsibilty` `responsibilty` INT(11) NULL, CHANGE `employee` `employee` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `Note` `Note` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;

CREATE TABLE  `panel_setting` ( `id` INT NOT NULL AUTO_INCREMENT , `website_name` VARCHAR(256) NOT NULL , `website_logo` VARCHAR(256) NULL , `sidebar_menu_color` VARCHAR(256) NOT NULL , `color` VARCHAR(256) NOT NULL , `hovercolor` VARCHAR(256) NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `panel_setting` CHANGE `sidebar_menu_name` `sidebar_menu_color` VARCHAR(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

CREATE TABLE `status` ( `id` INT NOT NULL AUTO_INCREMENT , `status_id` INT NOT NULL , `message_id` INT NOT NULL , `number` INT NOT NULL , `information` INT NOT NULL , `note` TEXT NULL , `created_at` DATETIME NOT NULL , `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `status` ADD `customer_id` INT NULL AFTER `id`;

CREATE TABLE `support` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NULL , `support_id` INT NOT NULL , `note` TEXT NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
INSERT INTO `permission_master` (`id`, `name`, `dt_created`) VALUES (NULL, 'Support', '2018-12-25 00:00:00');

-----------------------------28-12-2018---------------------------------
CREATE TABLE `officepark`.`call_mail` ( `id` INT NOT NULL AUTO_INCREMENT , `customer_id` INT NULL , `agent_id` INT NULL , `call_id` INT NOT NULL , `customer_number` VARCHAR(256) NOT NULL , `notes` TEXT NULL , `created_at` INT NOT NULL , `updated_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `call_mail` CHANGE `created_at` `created_at` DATETIME NOT NULL;
ALTER TABLE `call_mail` ADD `information` INT NOT NULL AFTER `call_id`;

CREATE TABLE `officepark`.`call_chat` ( `id` INT NOT NULL AUTO_INCREMENT , `call_id` INT NOT NULL , `customer_id` INT NULL , `comment` TEXT NOT NULL, `created_at` DATETIME NOT NULL , `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `call_chat` ADD `call_mail_id` INT NULL AFTER `call_id`;

ALTER TABLE `support` ADD `customer_response_status` ENUM('0','1') NOT NULL DEFAULT '1' COMMENT '0 for Not Responsed 1 for Responded' AFTER `note`, ADD `admin_response_status` ENUM('0','1') NOT NULL DEFAULT '0' COMMENT '0 for Not Responsed 1 for Responded' AFTER `customer_response_status`;
ALTER TABLE `call_mail` ADD `customer_response_status` ENUM('0','1') NOT NULL DEFAULT '1' COMMENT '0 for Not Responsed 1 for Responded' AFTER `notes`, ADD `admin_response_status` ENUM('0','1') NOT NULL DEFAULT '0' COMMENT '0 for Not Responsed 1 for Responded' AFTER `customer_response_status`;


ALTER TABLE `permission_master` ADD `is_active` INT NOT NULL DEFAULT '1' AFTER `name`;
UPDATE `permission_master` SET `is_active` = '0' WHERE `permission_master`.`id` = 1;
UPDATE `permission_master` SET `is_active` = '0' WHERE `permission_master`.`id` = 9;
UPDATE `permission_master` SET `is_active` = '0' WHERE `permission_master`.`id` = 16;

_________________________________________________________08-01-2019__________________________________
ALTER TABLE `status` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `customer_id` `customer_id` INT(11) NULL DEFAULT NULL, CHANGE `status_id` `welcome_note` INT(11) NOT NULL, CHANGE `message_id` `status` INT(11) NOT NULL, CHANGE `number` `call_transfer` INT(11) NOT NULL, CHANGE `information` `information` TEXT NOT NULL, CHANGE `note` `note` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL, CHANGE `updated_at` `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `status` DROP `note`;

_____________________________________________09-01-2019___________________________________________
ALTER TABLE `order_info`  ADD `note` TEXT NOT NULL  AFTER `unreach_note`;