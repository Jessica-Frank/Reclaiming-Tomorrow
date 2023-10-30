-- Create reward log database
DROP TABLE IF EXISTS reclaiming_tomorrow_db.reward_point_log;
CREATE TABLE reclaiming_tomorrow_db.reward_point_log (
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(11) DEFAULT NULL,
  `point_change` int(255) DEFAULT NULL,
  `reward_id` int(10) DEFAULT NULL,
  `action_name` ENUM('ADMIN_OVERWRITE', 'CLAIM_REWARD', 'REDEEM_TICKET') NOT NULL,
  PRIMARY KEY (`user_id`, `date`),
  FOREIGN KEY(`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY(`admin_id`) REFERENCES `admin`(`id`),
  FOREIGN KEY(`reward_id`) REFERENCES `rewards`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

