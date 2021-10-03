CREATE TABLE categories
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100)
);


CREATE TABLE products
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  category_id INT,
  name VARCHAR(100),
  price INT,
  image VARCHAR(100),
  date DATE,
  FOREIGN KEY (category_id)  REFERENCES categories (id)
);


INSERT INTO categories (name)
VALUES ('Audio Receivers'), ('Speakers'), ('Car alarm systems'), ('Dash cams');


INSERT INTO products (category_id, name, price, image, date) 
VALUES 
(1, 'Kenwood KMM-105GY', 1350,  'receivers/kmm-105.jpg', '2021-09-30'),
(1, 'Kenwood KMM-125', 1600,    'receivers/kmm-125.jpg', '2021-10-01'),
(1, 'Shuttle SUD-389', 800,     'receivers/sud-389.jpg', '2021-10-01'),
(1, 'Pioneer DMH-G220BT', 4620, 'receivers/g220bt.jpg', '2021-09-20');


INSERT INTO products (category_id, name, price, image, date) 
VALUES 
(2, 'JBL STAGE2 624', 1470,   'speakers/stage2-624.jpg', '2021-09-30'),
(2, 'JBL Stage2 9634', 1957,  'speakers/stage2-9634.jpg', '2021-08-25'),
(2, 'CALCELL CB-694', 600,    'speakers/cb-694.jpg', '2021-10-01'),
(2, 'Morel MAXIMO ULTRA 502', 2970, 'speakers/ultra-502.jpg', '2021-10-01');


INSERT INTO products (category_id, name, price, image, date) 
VALUES 
(3, 'FORT DX700 DIALOG', 1949,  'alarms/dx700.jpg', '2021-09-30'),
(3, 'DaVINCI PHI-100', 495,     'alarms/phi-100.jpg', '2021-08-25'),
(3, 'Pandora DX-9X', 4445,      'alarms/dx-9x.jpg', '2021-10-01'),
(3, 'Starline A63', 3180,       'alarms/a63.jpg', '2021-07-02');


INSERT INTO products (category_id, name, price, image, date) 
VALUES 
(4, 'CYCLONE DVF-79', 1487, 'dashcams/dvf-79.jpg', '2021-08-08'),
(4, 'REYND F11', 1670,      'dashcams/f11.jpg', '2021-08-10'),
(4, 'REYND F12', 1550,      'dashcams/f12.jpg', '2021-05-01');

INSERT INTO products (category_id, name, price, image, date)
VALUES
(1, 'SWAT CHR 4100', 2090, 'receivers/chr-4100.jpg', '2021-10-01');