CREATE TABLE `users` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT,
 `firstName` varchar(255) DEFAULT NULL,
 `lastName` varchar(255) DEFAULT NULL,
 `username` varchar(255) DEFAULT NULL,
 `password` varchar(255) DEFAULT NULL,
 `email` varchar(255) DEFAULT NULL,
 `active` int(11) DEFAULT NULL,
 `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `avatar_url` mediumtext,
 `city` varchar(255),
 PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

CREATE TABLE logs (
  `logs_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int,
  `image` varchar(8000),
  `date_taken` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(logs_id),
  FOREIGN KEY(user) REFERENCES users(user_id)
);
