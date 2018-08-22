ALTER TABLE `addressbook` ADD `gender` ENUM('M','F') NOT NULL DEFAULT 'M' AFTER `company`, ADD `mobile` INT NULL AFTER `gender`, ADD `telefax` INT NULL AFTER `mobile`, ADD `note` TEXT NULL AFTER `telefax`;
ALTER TABLE `order_info` ADD `status` ENUM('new','viewed') NOT NULL DEFAULT 'new' AFTER `aggrement`; 
ALTER TABLE `order_info` ADD `user_id` INT NULL DEFAULT NULL AFTER `id`; 
ALTER TABLE `users` ADD `customer_number` VARCHAR(255) NULL DEFAULT NULL AFTER `var_language`; 
CREATE TABLE `officepark`.`customer_no` ( `id` INT NOT NULL , `last_number` INT NOT NULL , `created_at` DATETIME NOT NULL , `update_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB; 
INSERT INTO `customer_no` (`id`, `last_number`, `created_at`, `update_at`) VALUES ('1', '1706', '2018-08-29 00:00:00', CURRENT_TIMESTAMP); 
CREATE TABLE `officepark`.`customer_user_no` ( `id` INT NOT NULL AUTO_INCREMENT , `generated_no` VARCHAR(255) NOT NULL , `user_id` INT NOT NULL , `created_at` DATETIME NOT NULL , `updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;