CREATE DATABASE garden;

CREATE TABLE readings (
  id int NOT NULL AUTO_INCREMENT,
  temperature float unsigned NOT NULL,
  light float unsigned NOT NULL,
  humidity float unsigned NOT NULL,
  ts datetime DEFAULT CURRENT_TIMESTAMP,
  garden_id int unsigned NOT NULL,
  PRIMARY KEY (id),
  KEY fk_garden_id_idx (garden_id),
  CONSTRAINT fk_garden_id FOREIGN KEY (garden_id) REFERENCES users_gardens (garden_id)
) ENGINE=InnoDB AUTO_INCREMENT=594 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  username varchar(45) NOT NULL,
  password varchar(255) NOT NULL,
  created_at datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY username_UNIQUE (username)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE users_gardens (
  user_id int NOT NULL,
  garden_id int unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (garden_id),
  UNIQUE KEY garden_id_UNIQUE (garden_id),
  KEY user_id_idx (user_id),
  CONSTRAINT user_id FOREIGN KEY (user_id) REFERENCES users (id)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;