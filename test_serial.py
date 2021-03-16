from serial import Serial
import mysql.connector

db = mysql.connector.connect(
	host = "localhost",
	user = "root",
	password = "krisi2002",
	database = "garden"
	)

mycursor = db.cursor()

ser = Serial('COM5', 9600, timeout=0.5)
while(True):
	reading = ser.readline().decode()


	f = open("config2.txt", "r")
	value = f.readline()

	res = [float(idx) for idx in reading.split()]
	if(res):
		#print("Temperature: " , res[0] , "Light: " , res[1] , "Humidity: " , res[2])
		#print("Temperature: " , res[0])
		#print("Humidity: " , res[2])
		print(res)

		mycursor.execute(
			"INSERT INTO garden.readings												\
			(temperature, light, humidity, garden_id)									\
			VALUES  (%s, %s, %s, %s)", (res[0], res[1], res[2], value)
		)
		db.commit()
		

"""
table:
CREATE TABLE `readings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `temperature` float unsigned NOT NULL,
  `light` float unsigned NOT NULL,
  `humidity` float unsigned NOT NULL,
  `ts` datetime DEFAULT CURRENT_TIMESTAMP,
  `garden_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_garden_id_idx` (`garden_id`),
  CONSTRAINT `fk_garden_id` FOREIGN KEY (`garden_id`) REFERENCES `users_gardens` (`garden_id`)
) ENGINE=InnoDB AUTO_INCREMENT=594 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `users_gardens` (
  `user_id` int NOT NULL,
  `garden_id` int unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`garden_id`),
  UNIQUE KEY `garden_id_UNIQUE` (`garden_id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
"""