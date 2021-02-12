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

	res = [float(idx) for idx in reading.split()]
	if(res):
		#print("Temperature: " , res[0] , "Light: " , res[1] , "Humidity: " , res[2])
		#print("Temperature: " , res[0])
		#print("Humidity: " , res[2])
		print(res)
		mycursor.execute("INSERT INTO garden.readings (temperature, light, humidity) VALUES  (%s, %s, %s)", (res[0], res[1], res[2]))
		db.commit()
		

#mycursor.execute("CREATE DATABASE testdatabase")
#mycursor.execute("CREATE TABLE Garden(id INT PRIMARY KEY AUTO_INCREMENT, temperature FLOAT UNSIGNED NOT NULL, light FLOAT UNSIGNED NOT NULL , humidity FLOAT UNSIGNED NOT NULL)")
#mycursor.execute("DESCRIBE Garden")

"""
table:

CREATE TABLE `garden`.`readings` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `temperature` FLOAT UNSIGNED NOT NULL,
  `light` FLOAT UNSIGNED NOT NULL,
  `humidity` FLOAT UNSIGNED NOT NULL,
  `ts` TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));
"""