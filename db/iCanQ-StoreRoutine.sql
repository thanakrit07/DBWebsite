USE icanq;

/*1*/
DROP Procedure IF EXISTS getMenu;
DELIMITER //
CREATE PROCEDURE getMenu (IN ShopID VARCHAR(20))
BEGIN
    SELECT Menu,ShopRec,Rating
    FROM Foodlist
    WHERE SID = ShopID;
END //
DELIMITER ;

/*2*/
DROP Procedure IF EXISTS getFoodinfo;
DELIMITER //
CREATE PROCEDURE getFoodinfo (IN ShopID VARCHAR(20),IN FoodName VARCHAR(30))
BEGIN
	SELECT *
    FROM Foodlist
    WHERE Menu = FoodName AND SID = ShopID;
END //
DELIMITER ;

/*3*/
DROP Procedure IF EXISTS Topping;
DELIMITER //
CREATE PROCEDURE Topping (IN baseOID VARCHAR(20),IN topOID VARCHAR(20))
BEGIN
	UPDATE OrderItem
    SET TOP_ON = topOID
    WHERE OID = baseOID;
END //
DELIMITER ;

/*4*/
DROP Procedure IF EXISTS getReview;
DELIMITER //
CREATE PROCEDURE getReview (IN ShopID VARCHAR(20),IN FoodName VARCHAR(30))
BEGIN
    
    SELECT Customer.Fname, Feedback.Rate, Feedback.Review
    FROM Feedback right join Customer on Feedback.CID = Customer.CID
    WHERE Menu = FoodName AND SID = ShopID;

END //
DELIMITER ;

/*5-1*/
DROP Procedure IF EXISTS addOrderQueue;
DELIMITER //
CREATE PROCEDURE addOrderQueue (IN QueueID VARCHAR(20),IN CustomerID VARCHAR(10),IN DeliveryID VARCHAR(10))
BEGIN
	INSERT INTO OrderQueue
		VALUES
        (QueueID,CURRENT_TIMESTAMP,'00:00:00',0,0,CustomerID,DeliveryID,NULL);
END //
DELIMITER ;

/*5-2*/
DROP Procedure IF EXISTS addOrderItem;
DELIMITER //
CREATE PROCEDURE addOrderItem (IN QueueID VARCHAR(20),IN OrderTimeStamp TIMESTAMP,IN OrderID VARCHAR(20),IN ShopID VARCHAR(10),IN Menu VARCHAR(30))
BEGIN
	INSERT INTO OrderItem
		VALUES
        (QueueID,OrderTimeStamp,OrderID,ShopID,Menu,NULL);
END //
DELIMITER ;

/*6-1*/
DROP Procedure IF EXISTS deleteOrderQueue;
DELIMITER //
CREATE PROCEDURE deleteOrderQueue (IN QueueID VARCHAR(20))
BEGIN
	DELETE
    FROM OrderQueue
    WHERE QID = QueueID;
END //
DELIMITER ;

/*6-2*/
DROP Procedure IF EXISTS deleteOrderItem;
DELIMITER //
CREATE PROCEDURE deleteOrderItem (IN OrderID VARCHAR(20))
BEGIN
	DELETE
    FROM OrderItem
    WHERE OID = OrderID;
END //
DELIMITER ;

/*6-3*/
DROP Procedure IF EXISTS ChangePickupTime;
DELIMITER //
CREATE PROCEDURE ChangePickupTime (IN QueueID VARCHAR(20),IN PickTime TIME)
BEGIN
	UPDATE OrderQueue
    SET PickupTime = PickTime
    WHERE QID = QueueID;
END //
DELIMITER ;

/*6-4*/
DROP Procedure IF EXISTS CancelTopping;
DELIMITER //
CREATE PROCEDURE CancelTopping (IN QueueID VARCHAR(20),IN OrderTime TIMESTAMP,IN OrderID VARCHAR(20))
BEGIN
	UPDATE OrderItem
    SET TOP_ON = NULL
    WHERE QID = QueueID AND OrderTimeStamp = OrderTime AND OID = OrderID;
END //
DELIMITER ;

/*Extra*/
/*random*/
DROP Procedure IF EXISTS RandomFoodlist;
DELIMITER //
CREATE PROCEDURE RandomFoodlist ()
BEGIN
	DECLARE menutemp VARCHAR(30);
    DECLARE sidtemp VARCHAR(10);
    SELECT SID,Menu
    FROM Foodlist
    ORDER BY RAND()
    LIMIT 1
    INTO sidtemp,menutemp;
    
    SELECT *
    FROM Foodlist
    WHERE SID = sidtemp AND Menu = menutemp;
END //
DELIMITER ;


/*addmenu*/
DROP Procedure IF EXISTS addMenu;
DELIMITER //
CREATE PROCEDURE addMenu (IN ShopID VARCHAR(10),IN Menu VARCHAR(30),IN Price INTEGER,IN Recommend BIT(1))
BEGIN
	INSERT INTO Foodlist
		VALUES
        (ShopID,Menu,Price,Recommend,0.0);
END //
DELIMITER ;

/*find order*/
DROP Procedure IF EXISTS findOrder;
DELIMITER //
CREATE PROCEDURE findOrder (IN QueueID VARCHAR(20),IN ShopID VARCHAR(10),IN menuItem VARCHAR(30))
BEGIN
	SELECT OID
    FROM OrderItem
    WHERE QID = QueueID AND SID = ShopID AND Menu = menuItem;
END //
DELIMITER ;




/*Trigger*/
DROP TRIGGER IF EXISTS PriceCheck;
DELIMITER //
CREATE TRIGGER PriceCheck BEFORE INSERT ON Foodlist FOR EACH ROW IF NEW.Price < 0 THEN SET NEW.Price = 0;
END IF;//
DELIMITER ;