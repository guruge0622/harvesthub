-- SQL dump for HarvestHub demo project
-- Create database and tables with sample data
CREATE DATABASE IF NOT EXISTS harvesthub CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE harvesthub;

-- users
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- farmers
CREATE TABLE IF NOT EXISTS farmers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  location VARCHAR(150),
  contact VARCHAR(80),
  image VARCHAR(255) DEFAULT 'img2.jpg'
);

-- products
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  farmer_id INT DEFAULT NULL,
  name VARCHAR(200) NOT NULL,
  short_description TEXT,
  price DECIMAL(10,2) NOT NULL DEFAULT 0,
  image VARCHAR(255) DEFAULT 'img1.jpg',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (farmer_id) REFERENCES farmers(id) ON DELETE SET NULL
);

-- orders
CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(150),
  delivery_address TEXT,
  phone VARCHAR(50),
  payment_method VARCHAR(80),
  total_amount DECIMAL(10,2),
  items TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- contact messages
CREATE TABLE IF NOT EXISTS contact_messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120),
  email VARCHAR(150),
  message TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- sample data
INSERT INTO farmers (name,location,contact,image) VALUES
('Dilan Farms','Gampaha, Sri Lanka','+94 77 123 0001','img4.jpg'),
('Green Valley','Kandy, Sri Lanka','+94 77 123 0002','img5.jpeg'),
('Ocean Orchards','Colombo, Sri Lanka','+94 77 123 0003','img6.jpg');

INSERT INTO products (farmer_id,name,short_description,price,image) VALUES
(1,'Fresh Peanuts','Locally grown peanuts, cleaned and packed',450.00,'img1.jpg'),
(2,'Organic Yogurt','Creamy yogurt from grass-fed cows',250.00,'img2.jpg'),
(3,'Tomatoes (1kg)','Seasonal ripe tomatoes',120.00,'img3.jpg'),
(1,'Handmade Bagels (1pc)','Delicious artisan bagel',300.00,'img4.jpeg');
