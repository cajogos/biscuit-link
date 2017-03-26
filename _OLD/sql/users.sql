DROP TABLE IF EXISTS cookiejar_users;

CREATE TABLE cookiejar_users (
	user_id INT NOT NULL AUTO_INCREMENT,
	user_username VARCHAR(16) NOT NULL UNIQUE,
	user_password VARCHAR(255) NOT NULL,
	user_email VARCHAR(255) NOT NULL,
	user_level INT(2) NOT NULL DEFAULT 0,
	user_registered DATETIME NOT NULL,
	last_modified TIMESTAMP NOT NULL,
	PRIMARY KEY (user_id)
);