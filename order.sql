CREATE TABLE orders2 (
    Id INT,
    Phone_number VARCHAR(20),
    Address TEXT,
	Address_type TEXT,
	Payment_method VARCHAR(100),
    Ordered_date DATE,
    Ordered_time TIME,
   	Payment_status VARCHAR(20),
    Status VARCHAR(50),
	Cart_id VARCHAR(10),
    Delivery_id VARCHAR(10)
);

INSERT INTO orders2 (Id, Phone_number, Address,Address_type, Payment_method, Ordered_date,Ordered_time,Payment_status,Status,Cart_id,Deliver_id)
VALUES (
    '123456',
    '+1 234 567 8901',
    '123 Main Street, New York, NY',
	'Foreign',
    'Card Payment',
	'2023-08-19',
	'03:30',
	'Paid',
	'Delivered',
	'180',
    '120'
);
