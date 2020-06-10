CREATE DATABASE hasbiponsel;

USE hasbiponsel;

CREATE TABLE customer (
  id_customer INT(11) NOT NULL AUTO_INCREMENT,
  nama_customer VARCHAR(255) NOT NULL,
  nohp_customer VARCHAR(20) NOT NULL,
  PRIMARY KEY(id_customer),
  UNIQUE KEY(nama_customer)
);

CREATE TABLE supplier (
  id_supplier INT(11) NOT NULL AUTO_INCREMENT,
  nama_supplier VARCHAR(255) NOT NULL,
  nohp_supplier VARCHAR(20) NOT NULL,
  PRIMARY KEY(id_supplier),
  UNIQUE KEY(nama_supplier)
);

CREATE TABLE tarifpulsa (
  id_tarif INT(11) NOT NULL AUTO_INCREMENT,
  pil_tarif VARCHAR(255) NOT NULL,
  harga_modal VARCHAR(100) NOT NULL,
  harga_jual VARCHAR(100) NOT NULL,
  PRIMARY KEY(id_tarif),
  UNIQUE KEY(pil_tarif)
);

CREATE TABLE userr (

  id_user INT(11) NOT NULL AUTO_INCREMENT,
  user_name VARCHAR(50) NOT NULL,
  user_password VARCHAR(256) NOT NULL,
  user_level TINYINT(3) DEFAULT '0',
  user_namalengkap VARCHAR(256) NOT NULL,
  PRIMARY KEY (id_user),
  UNIQUE KEY (user_name)

);

CREATE TABLE provider (
  id_provider INT(11) NOT NULL AUTO_INCREMENT,
  nama_provider VARCHAR(255) NOT NULL,
  id_supplier INT(11) NOT NULL,
  id_tarif INT(11) NOT NULL,
  harga_jual VARCHAR(100) NOT NULL,
  PRIMARY KEY(id_provider),
  FOREIGN KEY(id_supplier) 
    REFERENCES supplier(id_supplier),
  FOREIGN KEY(id_tarif) 
    REFERENCES tarifpulsa(id_tarif)
);

CREATE TABLE orderan (
  id_orderan INT(11) NOT NULL AUTO_INCREMENT,
  id_user INT(11) NOT NULL,
  nohp_customer VARCHAR(20) NOT NULL,
  id_customer INT(11) NOT NULL,
  id_provider INT(11) NOT NULL,
  id_tarif INT(11) NOT NULL,
  harga_jual VARCHAR(100) NOT NULL,
  tgl_order DATE NOT NULL,
  PRIMARY KEY(id_orderan),
  FOREIGN KEY(id_user) 
    REFERENCES user(id_user),
  FOREIGN KEY(id_customer) 
    REFERENCES customer(id_customer),
  FOREIGN KEY(id_provider) 
    REFERENCES provider(id_provider),
  FOREIGN KEY(id_tarif) 
    REFERENCES tarifpulsa(id_tarif)
);

