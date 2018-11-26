USE icanq;

/*1*/
DELIMITER //
CREATE PROCEDURE getMenu (IN ShopID VARCHAR(20))
BEGIN
    SELECT Menu,ShopRec
    FROM Foodlist
    WHERE SID = ShopID;
END //
DELIMITER ;

/*2*/
DELIMITER //
CREATE PROCEDURE getFoodinfo (IN ShopID VARCHAR(20),IN FoodName VARCHAR(30))
BEGIN
	SELECT *
    FROM Foodlist
    WHERE Menu = FoodName AND SID = ShopID;
END //
DELIMITER ;

/*3*/
DELIMITER //
CREATE PROCEDURE Topping (IN baseOID INTEGER,IN topOID INTEGER)
BEGIN
	UPDATE OrderItem
    SET TOP_ON = topOID
    WHERE OID = baseOID;
END //
DELIMITER ;

/*4*/
DELIMITER //
CREATE PROCEDURE getReview (IN ShopID VARCHAR(20),IN FoodName VARCHAR(30))
BEGIN
	SELECT *
    FROM Feedback
    WHERE Menu = FoodName AND SID = ShopID;
END //
DELIMITER ;

/*5-1*/
DELIMITER //
CREATE PROCEDURE addOrderQueue (IN QueueID INTEGER,IN PickTime TIME,IN CustomerID VARCHAR(10),IN DeliveryID VARCHAR(10))
BEGIN
	INSERT INTO OrderQueue
		VALUES
        (QueueID,CURRENT_TIMESTAMP,PickTime,0,0,CustomerID,DeliveryID,NULL);
END //
DELIMITER ;

/*5-2*/
DELIMITER //
CREATE PROCEDURE addOrderItem (IN QueueID INTEGER,IN OrderID INTEGER,IN ShopID VARCHAR(10),IN Menu VARCHAR(30))
BEGIN
	INSERT INTO OrderItem
		VALUES
        (QueueID,CURRENT_TIMESTAMP,OrderID,ShopID,Menu,NULL);
END //
DELIMITER ;

/*6-1*/
DELIMITER //
CREATE PROCEDURE deleteOrderQueue (IN QueueID INTEGER)
BEGIN
	DELETE
    FROM OrderQueue
    WHERE QID = QueueID;
END //
DELIMITER ;

/*6-2*/
DELIMITER //
CREATE PROCEDURE deleteOrderItem (IN OrderID INTEGER)
BEGIN
	DELETE
    FROM OrderItem
    WHERE OID = OrderID;
END //
DELIMITER ;

/*6-3*/
DELIMITER //
CREATE PROCEDURE ChangePickupTime (IN QueueID INTEGER,IN PickTime TIME)
BEGIN
	UPDATE OrderQueue
    SET PickupTime = PickTime
    WHERE QID = QueueID;
END //
DELIMITER ;

/*6-4*/
DELIMITER //
CREATE PROCEDURE CancelTopping (IN QueueID INTEGER,IN OrderTime TIMESTAMP,IN OrderID INTEGER)
BEGIN
	UPDATE OrderItem
    SET TOP_ON = NULL
    WHERE QID = QueueID AND OrderTimeStamp = OrderTime AND OID = OrderID;
END //
DELIMITER ;

/*Extra*/
/*random*/
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

DELIMITER //
CREATE PROCEDURE addMenu (IN ShopID VARCHAR(10),IN Menu VARCHAR(30),IN Price INTEGER,IN Recommend BIT(1))
BEGIN
	INSERT INTO Foodlist
		VALUES
        (ShopID,Menu,Price,Recommend,0.0);
END //
DELIMITER ;







/*Trigger*/
DELIMITER //
CREATE TRIGGER PriceCheck BEFORE INSERT ON Foodlist FOR EACH ROW IF NEW.Price < 0 THEN SET NEW.Price = 0;
END IF;//
DELIMITER ;
