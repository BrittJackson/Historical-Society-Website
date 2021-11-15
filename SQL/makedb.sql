/*Brittney Jackson, December 7 2020 */
CREATE TABLE users(
	username VARCHAR(15),
	password VARCHAR(20),
	fname VARCHAR(30),
	lname VARCHAR(30),
	email VARCHAR(50),
	zip int,
	phone VARCHAR(12),
	PRIMARY KEY(username)
);

CREATE TABLE events(
	eventname VARCHAR(50),
	sponsor VARCHAR(50),
	description VARCHAR(255),
	eventdate INTEGER,
	eventtime INTEGER,
	PRIMARY KEY(eventname)
);
