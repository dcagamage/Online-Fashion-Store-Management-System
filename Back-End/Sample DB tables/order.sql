CREATE TABLE orders1 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id VARCHAR(20) ,
    phone_number VARCHAR(20),
    address TEXT,
	address_type TEXT,
	product_name VARCHAR(50),
	product_image VARCHAR(255),
	payment_method VARCHAR(100),
    ordered_date DATE,
    ordered_time TIME,
   	payment_status VARCHAR(20),
    status VARCHAR(50),
	cart_id VARCHAR(10)
);

INSERT INTO orders1 (customer_id, phone_number, address,address_type, product_name, product_image, payment_method, ordered_date,ordered_time,payment_status,status,cart_id)
VALUES (
    '123456',
    '+1 234 567 8901',
    '123 Main Street, New York, NY',
	'Foreign',
    'T-shirt',
    'https://via.placeholder.com/80',
    'Card Payment',
	'2023-08-19',
	'03:30',
	'Paid',
	'Delivered',
	'180'
);
