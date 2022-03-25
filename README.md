-DB table creation

on MySql Create a db called crud_db

-execute the following query

CREATE TABLE client(
client_id INT PRIMARY KEY AUTO_INCREMENT,
client_firstname VARCHAR(100),
client_lastname VARCHAR(100),
client_email VARCHAR(100)
)ENGINE=INNODB;

-run the serverin development mode

php spark serve

-access the application in  the browser 

localhost:8080/


