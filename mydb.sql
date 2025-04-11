-- create table orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL DEFAULT '2025-03-17',
  `order_code` varchar(50) NOT NULL,
  `order_product_id` int unsigned NOT NULL,
  `order_product_code` varchar(50) NOT NULL,
  `order_product_name` varchar(255) NOT NULL,
  `order_takendate` date DEFAULT NULL,
  `order_startdate` date DEFAULT NULL,
  `order_enddate` date DEFAULT NULL,
  `order_returndate` date DEFAULT NULL,
  `order_isreturn` char(1) NOT NULL DEFAULT 'n',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_code` (`order_code`)
) ENGINE=MyISAM;

-- create sp_ins_orders
CREATE PROCEDURE `rental_dress`.`sp_ins_order`(IN `pid` int, IN `porderdate` date, IN `ptakendate` date, IN `preturndate` date)
begin
	
	SET @currdate = DATE_FORMAT(NOW(), '%y%m%d');

	SET @num = (
	    SELECT COUNT(*) + 1
	    FROM orders
	    WHERE DATE(created_at) = CURDATE()
	);

	SET @num_format = LPAD(@num, 3, '0');

	SET @trxcode = CONCAT(@currdate, @num_format);
	
	select master_product_code,master_product_name into @code,@name 
	from master_product
	where master_product_id = pid 
	limit 1;

	insert into orders(order_date,order_code,order_product_id,order_product_code,order_product_name,order_takendate,order_returndate)
	value(porderdate,@trxcode,pid,@code,@name,ptakendate, preturndate);
end