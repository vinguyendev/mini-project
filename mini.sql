CREATE TABLE users (
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(40),
	password VARCHAR(40),
	remember_token VARCHAR(255),
	created_at DATETIME,
	updated_at DATETIME
);

CREATE TABLE categories (
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255)
);

CREATE TABLE books (
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255),
	content text,
	author VARCHAR(255),
	image text,
	category_id int,
	created_at DATETIME,
	updated_at DATETIME,
	FOREIGN KEY (category_id) REFERENCES categories(id)
);