CREATE TABLE product1 (
    Id INT(15),
    Name VARCHAR(100) ,
    Price DOUBLE(8,2),
    Category VARCHAR(50),
	Image TEXT,
	Stock INT(50),
	Product_detail TEXT(255),
	Status VARCHAR(50),
    Admin_id INT(6),
    
);

INSERT INTO product1(Id,Name,Price,Category,Image,Stock,Product_detail,Status,Admin_id)
VALUES(
	'1',
    'NNNN',
    '2000.00',
    'Dress',
    'images/product/37.jpg',
    '3',
    'hhhh',
    'available',
    '1'
    );
