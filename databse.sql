DROP TABLE IF EXISTS repair_guides_parts;
DROP TABLE IF EXISTS ratings;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS repair_orders;
DROP TABLE IF EXISTS repair_guides;
DROP TABLE IF EXISTS devices;
DROP TABLE IF EXISTS repairmans;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS parts;
DROP TABLE IF EXISTS disposals;
DROP TABLE IF EXISTS steps;

CREATE TABLE categories
(
	name varchar (64) NOT NULL,
	categories_id integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(categories_id)
);

CREATE TABLE disposals
(
	address varchar (128) NOT NULL,
	picture varchar (255) NOT NULL,
	company_name varchar (128) NOT NULL,
	phone_number varchar (255) NOT NULL,
	email varchar (32) NOT NULL,
	fk_categoriesid integer NOT NULL,
	disposals_id integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(disposals_id),
	FOREIGN KEY(fk_categoriesid) REFERENCES categories (categories_id)
);

CREATE TABLE parts
(
	name varchar (128) NOT NULL,
	url varchar (255) NOT NULL,
	picture varchar (255) NOT NULL,
	parts_id integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(parts_id)
);

CREATE TABLE users
(
	email varchar (32) NOT NULL,
	password varchar (255) NOT NULL,
	username varchar (32) NOT NULL,
	role enum('guest','user','admin','manager') DEFAULT NULL,
	users_id integer NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(users_id)
);

CREATE TABLE repairmans
(
	name varchar (32) NOT NULL,
	surname varchar (32) NOT NULL,
	phone_number varchar (32) NOT NULL,
	email varchar (32) NOT NULL,
	specialization varchar (64) NOT NULL,
	description varchar (255) NOT NULL,
	photo_url varchar (255) NOT NULL,
	repairmans_id integer NOT NULL AUTO_INCREMENT,
	fk_usersid integer NOT NULL,
	PRIMARY KEY(repairmans_id),
	UNIQUE(fk_usersid),
	FOREIGN KEY(fk_usersid) REFERENCES users (users_id)
);

CREATE TABLE devices
(
	name varchar (64) NOT NULL,
	specifications text NOT NULL,
	devices_id integer NOT NULL AUTO_INCREMENT,
	fk_categoriesid integer NOT NULL,
	PRIMARY KEY(devices_id),
	FOREIGN KEY(fk_categoriesid) REFERENCES categories (categories_id)
);

CREATE TABLE repair_guides
(
	title varchar (128) NOT NULL,
	difficulty integer (2) NOT NULL,
	time_required varchar (3) NOT NULL,
	description text NOT NULL,
	repair_guides_id integer NOT NULL AUTO_INCREMENT,
	fk_usersid integer NOT NULL,
	fk_devicesid integer NOT NULL,
	PRIMARY KEY(repair_guides_id),
	FOREIGN KEY(fk_usersid) REFERENCES users (users_id),
	FOREIGN KEY(fk_devicesid) REFERENCES devices (devices_id)
);

CREATE TABLE repair_orders
(
	timestamp date NOT NULL,
	price double NOT NULL,
	status varchar (32) NOT NULL,
	repair_orders_id integer NOT NULL AUTO_INCREMENT,
	fk_usersid integer NOT NULL,
	fk_devicesid integer NOT NULL,
	fk_repairmansid integer NOT NULL,
	PRIMARY KEY(repair_orders_id),
	FOREIGN KEY(fk_usersid) REFERENCES users (users_id),
	FOREIGN KEY(fk_devicesid) REFERENCES devices (devices_id),
	FOREIGN KEY(fk_repairmansid) REFERENCES repairmans (repairmans_id)
);

CREATE TABLE comments
(
	timestamp date NOT NULL,
	content varchar (255) NOT NULL,
	comments_id integer NOT NULL AUTO_INCREMENT,
	fk_usersid integer NOT NULL,
	fk_repair_guidesid integer NOT NULL,
	PRIMARY KEY(comments_id),
	FOREIGN KEY(fk_usersid) REFERENCES users (users_id),
	FOREIGN KEY(fk_repair_guidesid) REFERENCES repair_guides (repair_guides_id)
);

CREATE TABLE ratings
(
	timestamp date NOT NULL,
	rating integer NOT NULL,
	ratings_id integer NOT NULL AUTO_INCREMENT,
	fk_usersid integer NOT NULL,
	fk_repair_guidesid integer NOT NULL,
	PRIMARY KEY(ratings_id),
	FOREIGN KEY(fk_usersid) REFERENCES users (users_id),
	FOREIGN KEY(fk_repair_guidesid) REFERENCES repair_guides (repair_guides_id)
);

CREATE TABLE repair_guides_parts
(
	fk_repair_guidesid integer,
	fk_partsid integer,
	PRIMARY KEY(fk_repair_guidesid, fk_partsid),
	FOREIGN KEY(fk_repair_guidesid) REFERENCES repair_guides (repair_guides_id),
	FOREIGN KEY(fk_partsid) REFERENCES parts (parts_id)
);

CREATE TABLE steps
(
    title varchar (128) NOT NULL,
    image_url varchar (255) NOT NULL,
    step_number integer NOT NULL,
    description text NOT NULL,
    step_id integer NOT NULL AUTO_INCREMENT,
    fk_repair_guidesid integer NOT NULL,
    PRIMARY KEY(step_id),
    FOREIGN KEY(fk_repair_guidesid) REFERENCES repair_guides (repair_guides_id)
);
