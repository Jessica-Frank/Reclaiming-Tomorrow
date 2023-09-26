-- Note: verify_db.sql may need to be run first to set up the user table

-- Create ticket database
DROP TABLE IF EXISTS reclaiming_tomorrow_db.tickets;
CREATE TABLE reclaiming_tomorrow_db.tickets (
  `id` varchar(10) NOT NULL,
  `point_value` int(255) NOT NULL DEFAULT 0,
  `organization` varchar(50) DEFAULT NULL,
  `redeeming_user` varchar(50) DEFAULT NULL,
  `date_redeemed` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert ticket data
INSERT INTO reclaiming_tomorrow_db.tickets (id, point_value, organization) VALUES ("67122", 100, "ABC Recycling");
INSERT INTO reclaiming_tomorrow_db.tickets (id, point_value, organization) VALUES ("01764", 80,  "ABC Recycling");
INSERT INTO reclaiming_tomorrow_db.tickets (id, point_value, organization) VALUES ("41642", 65, "Community Center 1");
INSERT INTO reclaiming_tomorrow_db.tickets (id, point_value, organization) VALUES ("00820", 30, "Community Center 1");

-- Add a test user to use while setting up reward system
INSERT INTO `users` (`name`, `email`, `email_verification`, `username`, `password`, `date`) VALUES
('test', 'test@test.test', 'test@test.test', 'test', '$2y$10$CulmdOK/R83f/Bwv8eRc1O902g2aAYpLmsixPonn6Xt2cvqBQG0Rq', '2023-09-11 20:38:01');

-- Create rewards database
DROP TABLE IF EXISTS `reclaiming_tomorrow_db`.`rewards`;
CREATE TABLE `reclaiming_tomorrow_db`.`rewards` (
  `id` INT(10) NOT NULL AUTO_INCREMENT, 
  `name` VARCHAR(30) NOT NULL , 
  `price` INT(5) NOT NULL , 
  `img_link` VARCHAR(200) NOT NULL , 
  PRIMARY KEY (`id`), 
  UNIQUE (`name`)
) ENGINE = InnoDB;

-- Insert ticket data
INSERT INTO `rewards` (`price`, `name`, `img_link`) VALUES
(200, "Restaurant Coupon", "https://cdn.pixabay.com/photo/2015/11/19/10/38/food-1050813_1280.jpg"),
(50, "Recycling T-Shirt", "https://cdn.pixabay.com/photo/2017/01/13/04/28/blank-1976317_1280.png"),
(100, "Tree Poster", "https://www.publicdomainpictures.net/pictures/370000/velka/mond-baum-kunst-vintage.jpg"),
(75, "Charity Donation", "https://www.publicdomainpictures.net/pictures/260000/velka/love-handout-outreach-watercolor.jpg");

-- Create log database
DROP TABLE IF EXISTS reclaiming_tomorrow_db.reward_log;