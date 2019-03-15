DROP TABLE IF EXISTS `#__product`;

CREATE TABLE `#__product` ( 
	`id` INT(10) NOT NULL AUTO_INCREMENT , 
	`name` VARCHAR(50) NOT NULL , 
	`category` INT(10) NOT NULL , 
	`description` VARCHAR(200) NOT NULL , 
	PRIMARY KEY (`id`))
	
ENGINE=InnoDB;

INSERT INTO `#__product`(`name`, `category`, `description`) VALUES ('LG',10,'Home');
INSERT INTO `#__product`(`name`, `category`, `description`) VALUES ('Samsung',10,'LED TV');
INSERT INTO `#__product`(`name`, `category`, `description`) VALUES ('Lenovo',10,'Laptops');

