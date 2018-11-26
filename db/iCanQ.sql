USE icanq;

DROP TABLE IF EXISTS Customer;
CREATE TABLE Customer (
	CID VARCHAR(10) NOT NULL,
    Fname VARCHAR(20) NOT NULL,
    Lname VARCHAR(20) NOT NULL,
    Religion VARCHAR(30),
    Tel VARCHAR(10) NOT NULL,
    PRIMARY KEY (CID)
);

DROP TABLE IF EXISTS Shop;
CREATE TABLE Shop (
	SID VARCHAR(10) NOT NULL,
    Sname VARCHAR(20) NOT NULL,
    Open_time TIME NOT NULL,
    Close_time TIME NOT NULL,
    PRIMARY KEY (SID)
);

DROP TABLE IF EXISTS Creditcard;
CREATE TABLE Creditcard (
	CID VARCHAR(10) NOT NULL,
    CardNo VARCHAR(16) NOT NULL,
    CardType ENUM('VISA','Mastercard') NOT NULL,
    CardHolder VARCHAR(20) NOT NULL,
    CVV VARCHAR(3) NOT NULL,
    Exp VARCHAR(5) NOT NULL,
    PRIMARY KEY (CID,CardNo),
    CONSTRAINT CID_Credit_FK
		FOREIGN KEY Creditcard(CID)
        REFERENCES Customer(CID)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
 
DROP TABLE IF EXISTS Allergic;
CREATE TABLE Allergic (
	CID VARCHAR(10) NOT NULL,
    Allergic VARCHAR(20) NOT NULL,
    PRIMARY KEY (CID,Allergic),
    CONSTRAINT CID_Allergic_FK
		FOREIGN KEY Allergic(CID)
        REFERENCES Customer(CID)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Employee;
CREATE TABLE Employee (
	EID VARCHAR(10) NOT NULL,
    Fname VARCHAR(20) NOT NULL,
    Lname VARCHAR(20) NOT NULL,
    SID VARCHAR(10) NOT NULL,
    PRIMARY KEY (EID),
    CONSTRAINT Work_for_FK
		FOREIGN KEY Employee(SID)
        REFERENCES Shop(SID)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Delivery_man;
CREATE TABLE Delivery_man (
	DID VARCHAR(10) NOT NULL,
    WorkingDate ENUM ('MON','TUE','WED','THU','FRI') NOT NULL,
    StartWorkingTime TIME NOT NULL,
    FinishWorkingTime TIME NOT NULL,
    Fname VARCHAR(20) NOT NULL,
	Lname VARCHAR(20) NOT NULL,
    PRIMARY KEY (DID,WorkingDate,StartWorkingTime,FinishWorkingTime)
);

DROP TABLE IF EXISTS Foodlist;
CREATE TABLE Foodlist (
	SID VARCHAR(10) NOT NULL,
    Menu VARCHAR(30) NOT NULL,
    Price INTEGER NOT NULL,
    ShopRec BIT(1) NOT NULL,
    Rating DOUBLE NOT NULL,
    PRIMARY KEY (SID,Menu),
    CONSTRAINT SID_Foodlist_FK 
		FOREIGN KEY Foodlist(SID)
        REFERENCES Shop(SID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
	INDEX Menu_index (Menu ASC)
);

DROP TABLE IF EXISTS Feedback;
CREATE TABLE Feedback (
	SID VARCHAR(10) NOT NULL,
    Menu VARCHAR(30) NOT NULL,
    CID VARCHAR(10) NOT NULL,
    FeedbackTimeStamp TIMESTAMP NOT NULL,
    Rate ENUM ('0','1','2','3','4','5') NOT NULL,
    Review VARCHAR(500),
    PRIMARY KEY (SID,Menu,CID,FeedbackTimeStamp),
    CONSTRAINT SID_Feedback_FK 
		FOREIGN KEY Feedback(SID)
        REFERENCES Shop(SID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
	CONSTRAINT Menu_Feedback_FK 
		FOREIGN KEY Feedback(Menu)
        REFERENCES Foodlist(Menu)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
	CONSTRAINT CID_Feedback_FK 
		FOREIGN KEY Feedback(CID)
        REFERENCES Customer(CID)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Ingredient;
CREATE TABLE Ingredient (
	IName VARCHAR(20) NOT NULL,
    IType VARCHAR(20) NOT NULL,
    PRIMARY KEY (IName,IType)
);

DROP TABLE IF EXISTS Consist_of;
CREATE TABLE Consist_of (
	SID VARCHAR(10) NOT NULL,
    Menu VARCHAR(30) NOT NULL,
    IName VARCHAR(20) NOT NULL,
    PRIMARY KEY(SID,Menu,IName),
    CONSTRAINT SID_consist_FK
		FOREIGN KEY Consist_of(SID)
        REFERENCES Shop(SID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
	CONSTRAINT Menu_consist_FK
		FOREIGN KEY Consist_of(Menu)
        REFERENCES Foodlist(Menu)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
	CONSTRAINT IName_consist_FK
		FOREIGN KEY Consist_of(IName)
        REFERENCES Ingredient(IName)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

DROP TABLE IF EXISTS OrderQueue;
CREATE TABLE OrderQueue (
	QID INTEGER NOT NULL,
    OrderTimeStamp TIMESTAMP NOT NULL,
    PickupTime TIME NOT NULL,
    PickupStatus BIT(1) NOT NULL,
    PayStatus BIT(1) NOT NULL,
    CID VARCHAR(10) NOT NULL,
    DID VARCHAR(10) NOT NULL,
    DeliveryTime TIME,
    PRIMARY KEY (QID,OrderTimeStamp),
    CONSTRAINT CID_OrderQueue_FK
		FOREIGN KEY OrderQueue(CID)
        REFERENCES Customer(CID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
	CONSTRAINT DID_OrderQueue_FK
		FOREIGN KEY OrderQueue(DID)
        REFERENCES Delivery_man(DID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
	Index OrderTimeStamp_Index (OrderTimeStamp ASC)
);

DROP TABLE IF EXISTS OrderItem;
CREATE TABLE OrderItem (
	QID INTEGER NOT NULL,
    OrderTimeStamp TIMESTAMP NOT NULL,
    OID INTEGER NOT NULL,
    SID VARCHAR(10) NOT NULL,
	Menu VARCHAR(30) NOT NULL,
    TOP_ON INTEGER,
    PRIMARY KEY (QID,OrderTimeStamp,OID),
	INDEX OID_Index (OID ASC),
    CONSTRAINT QID_OrderItem_FK
		FOREIGN KEY OrderItem(QID)
        REFERENCES OrderQueue(QID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
	CONSTRAINT OrderTimeStamp_OrderItem_FK
		FOREIGN KEY OrderItem(OrderTimeStamp)
        REFERENCES OrderQueue(OrderTimeStamp)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
	CONSTRAINT SID_OrderItem_FK
		FOREIGN KEY OrderItem(SID)
        REFERENCES Shop(SID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
	CONSTRAINT Menu_OrderItem_FK
		FOREIGN KEY OrderItem(Menu)
        REFERENCES Foodlist(Menu)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
	CONSTRAINT Top_on_FK
		FOREIGN KEY OrderItem(TOP_ON)
        REFERENCES OrderItem(OID)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ;

INSERT INTO Customer
	VALUES
    ('0000000000','Tatiana','Webster','Christ','0800000000'),
    ('0000000001','Sonia','Spence','Islam','0811111111'),
    ('0000000002','Jonah','Hick','Buddhism','0833333333'),
    ('0000000003','Casper','Krause',NULL,'081234567'),
    ('0000000004','Keelan','Redfern','Zoroastrianism','087891234'),
    ('0000000005','Irfan','Heaton','Hinduism','0800000001'),
    ('0000000006','Izzy','Huff','United Church of Bacon','0800230000'),
    ('0000000007','Sara','Marsh','Christ','0804520000'),
    ('0000000008','Emanuel','Sanders','Christ','0845692100'),
    ('0000000009','Aasiyah','Foreman','Islam','085556666');
        
INSERT INTO Shop
	VALUES
    ('1000000000','Kaitod','06:00:00','18:00:00'),
    ('2000000000','ชิกเก้น ชิกเก้น ทอด','06:00:00','18:00:00'),
    ('3000000000','Suki','06:00:00','18:00:00'),
    ('4000000000','lnwza55+','06:00:00','18:00:00'),
    ('5000000000','cp-43','06:00:00','18:00:00'),
    ('6000000000','Muuyang','06:00:00','18:00:00'),
    ('7000000000','Chinykiki','06:00:00','18:00:00'),
    ('8000000000','Chinyyyyyyyy','06:00:00','18:00:00'),
    ('9000000000','Chinykuhere','06:00:00','18:00:00'),
    ('1100000000','Yedmaeku','06:00:00','18:00:00');
    
INSERT INTO CreditCard
	VALUES
    ('0000000001','1111222233334444','VISA','Sonia','123','12:23'),
    ('0000000002','1234123412341234','VISA','Chiny','568','05:19'),
    ('0000000003','4444333322221111','VISA','Sonic','415','08:22'),
    ('0000000004','7894789545621230','VISA','Keelan','692','01:23'),
    ('0000000005','8527419638527412','VISA','Irfan','958','03:25'),
    ('0000000006','5462587469513256','Mastercard','Kirby','856','09:24'),
    ('0000000007','9517535215854612','Mastercard','Ash','932','10:23'),
    ('0000000008','9854512336587445','Mastercard','Sonia','122','04:25'),
    ('0000000009','3586254125358547','Mastercard','Ketchup','631','12:20'),
    ('0000000000','1566852826492248','Mastercard','Poke','123','06:25');
    
INSERT INTO Allergic
	VALUES
    ('0000000000','Chicken'),
    ('0000000000','Pork'),
    ('0000000000','Shrimp'),
    ('0000000000','Crab'),
    ('0000000000','Fish'),
    ('0000000000','Rice'),
    ('0000000001','Salmon'),
    ('0000000002','Chicken'),
    ('0000000003','Milk'),
    ('0000000004','Wolf');
    
INSERT INTO Employee
	VALUES
    ('1111111110','Farrell','Mora','1000000000'),
    ('1111111111','Amaya','Magana','1000000000'),
    ('1111111112','Chance','Gardiner','1000000000'),
    ('1111111113','Eamon','Good','2000000000'),
    ('1111111114','Gud','Boi','3000000000'),
    ('1111111115','Git','Gud','4000000000'),
    ('1111111116','Allison','Brien','5000000000'),
    ('1111111117','Allan','Paine','6000000000'),
    ('1111111118','Madeline','Trejo','7000000000'),
    ('1111111119','Madlife','Peeleague','8000000000'),
    ('1111111120','Elysha','Stafford','9000000000'),
    ('1111111121','Aamna','Pembertion','1100000000');
    
INSERT INTO Delivery_man
	VALUES
    ('2222222220','MON','11:30:00','12:15:00','Velma','Sullivan'),
    ('2222222221','FRI','11:30:00','12:15:00','Khloe','Cook'),
    ('2222222222','TUE','11:30:00','12:15:00','Connie','Kirkland'),
    ('2222222223','TUE','11:30:00','12:15:00','Kathy','Bass'),
    ('2222222224','THU','11:30:00','12:15:00','Kali','Lane'),
    ('2222222225','MON','12:15:00','13:00:00','Agata','Hendrix'),
    ('2222222226','WED','12:15:00','13:00:00','Anoushka','Soto'),
    ('2222222227','FRI','12:15:00','13:00:00','Ash','Ketchum'),
    ('2222222228','WED','12:15:00','13:00:00','Sol','Burton'),
    ('2222222229','THU','12:15:00','13:00:00','Glenda','David');
    
INSERT INTO Foodlist
	VALUES
    ('1000000000','Suki',30,1,5.0),
    ('1000000000','Fried Chicken',30,0,5.0),
    ('2000000000','Fried Chicken',100,1,0.0),
    ('3000000000','Pork Steak',30,1,4.5),
    ('4000000000','Noodle',30,1,3.6),
    ('5000000000','Fried Rice',30,1,2.9),
    ('6000000000','Pepsi',30,1,3.8),
    ('7000000000','Salad',30,1,4.6),
    ('8000000000','Fried Fish',30,1,4.0),
    ('9000000000','Bacon Steak',30,1,1.3);
    
INSERT INTO Feedback
	VALUES 
    ('1000000000','Suki','0000000000','2018-12-05 11:45:15','5',NULL),
    ('1000000000','Suki','0000000001','2018-12-05 11:46:15','5','Worth every baht'),
    ('1000000000','Suki','0000000002','2018-12-05 11:47:15','5','Good'),
    ('1000000000','Suki','0000000003','2018-12-05 11:48:15','5','Delicious'),
    ('1000000000','Suki','0000000004','2018-12-05 11:49:15','5','Cheap'),
    ('3000000000','Fried Chicken','0000000005','2018-12-05 12:45:15','0','Bad'),
    ('3000000000','Fried Chicken','0000000006','2018-12-05 12:46:15','0','Expensive as heck'),
    ('3000000000','Fried Chicken','0000000007','2018-12-05 12:47:15','0','Taste like shit'),
    ('3000000000','Fried Chicken','0000000008','2018-12-05 12:48:15','0','....'),
    ('3000000000','Fried Chicken','0000000009','2018-12-05 12:49:15','0','No worth at all');

INSERT INTO Ingredient
	VALUES
    ('Chicken','Meat'),
    ('Pork','Meat'),
    ('Shrimp','Seafood'),
    ('Crab','Seafood'),
    ('Jasmine Rice','Rice'),
    ('Noodle','Pasta'),
    ('Spagetti','Pasta'),
    ('Apple','Fruit'),
    ('Pineapple','Fruit'),
    ('Mango','Fruit'),
    ('Banana','Fruit');
    
INSERT INTO Consist_of
	VALUES
    ('1000000000','Suki','Chicken'),
    ('1000000000','Suki','Pork'),
    ('1000000000','Suki','Shrimp'),
    ('1000000000','Suki','Noodle'),
    ('1000000000','Suki','Crab'),
    ('1000000000','Fried Chicken','Chicken'),
    ('2000000000','Fried Chicken','Chicken'),
    ('3000000000','Pork Steak','Pork'),
    ('5000000000','Fried Rice','Jasmine Rice'),
    ('7000000000','Salad','Apple');
    
INSERT INTO OrderQueue
	VALUES
    (1,'2018-12-05 11:45:15','12:45:00',1,1,'0000000000','2222222220','12:45:00'),
    (2,'2018-12-05 11:45:16','12:45:00',1,1,'0000000001','2222222220','12:45:00'),
    (3,'2018-12-05 11:45:17','12:45:00',1,1,'0000000000','2222222220','12:45:00'),
    (4,'2018-12-05 11:45:18','12:30:00',1,1,'0000000000','2222222220','12:45:00'),
    (5,'2018-12-05 11:45:19','12:45:00',0,1,'0000000000','2222222220',NULL),
    (6,'2018-12-05 11:45:20','13:00:00',0,1,'0000000000','2222222220',NULL),
    (7,'2018-12-05 11:45:21','12:15:00',1,1,'0000000000','2222222220','12:45:00'),
    (8,'2018-12-05 11:45:22','12:30:00',1,1,'0000000000','2222222220','12:45:00'),
    (9,'2018-12-05 11:45:23','13:45:00',0,1,'0000000000','2222222220',NULL),
    (10,'2018-12-05 11:45:24','14:45:00',0,0,'0000000000','2222222220',NULL);
    
INSERT INTO OrderItem
	VALUES
    (1,'2018-12-05 11:45:15',1,'1000000000','Suki',NULL),
    (1,'2018-12-05 11:45:15',2,'1000000000','Fried Chicken',1),
    (2,'2018-12-05 11:45:16',3,'5000000000','Fried Rice',NULL),
    (2,'2018-12-05 11:45:16',4,'2000000000','Fried Chicken',NULL),
    (3,'2018-12-05 11:45:17',5,'3000000000','Pork Steak',NULL),
    (3,'2018-12-05 11:45:17',6,'1000000000','Suki',NULL),
    (4,'2018-12-05 11:45:18',7,'1000000000','Suki',NULL),
    (4,'2018-12-05 11:45:18',8,'1000000000','Suki',NULL),
    (5,'2018-12-05 11:45:19',9,'8000000000','Fried Fish',NULL),
    (5,'2018-12-05 11:45:19',10,'9000000000','Bacon Steak',NULL);
    

    