CREATE TABLE admins
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  login LONGTEXT,
  pass LONGTEXT,
  status INT
);
CREATE TABLE clients
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  login LONGTEXT,
  email LONGTEXT,
  address LONGTEXT,
  pass LONGTEXT,
  type INT,
  status INT
);
CREATE TABLE order_bags
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  translater_id INT NOT NULL,
  order_id INT NOT NULL,
  status INT
);
CREATE TABLE orders
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  file_name LONGTEXT,
  file_path LONGTEXT NOT NULL,
  translated_file LONGTEXT,
  start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  stop_date DATETIME,
  sender INT,
  type INT,
  status INT,
  comment LONGTEXT,
  can_view LONGTEXT,
  translator_comment LONGTEXT,
  translated_date DATETIME
);
CREATE TABLE translators
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  login LONGTEXT,
  email LONGTEXT,
  address LONGTEXT,
  pass LONGTEXT,
  type INT,
  status INT
);
