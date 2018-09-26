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