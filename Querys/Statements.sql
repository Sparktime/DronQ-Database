Create staments:

Maak 20 nieuwe serienummers aan. met een vast type product op en vaste datum

Read Statements
Alle klanten die geen order hebben: 
SELECT `ORDER`.`Order_ID`, `CUSTOMER`.`Customer_ID` , `CUSTOMER`.`Customer_Firstname`, `CUSTOMER`.`Customer_Surname`
FROM `CUSTOMER` 
LEFT JOIN `ORDER`
ON  `CUSTOMER`.`Customer_ID` = `ORDER`.`Customer_ID`
WHERE `ORDER`.`Order_ID` IS NULL


Alle klanten uit Deventer:
SELECT `Customer_ID`, `Customer_Surname`, `Customer_Firstname`, `Address`, `ZipCode`, `City` 
FROM `CUSTOMER` 
WHERE `City` = 'Deventer'

Wie heeft er een product gekocht in 2017
SELECT `ORDER`.`OrderDate`, `CUSTOMER`.`Customer_ID` , `CUSTOMER`.`Customer_Firstname`, `CUSTOMER`.`Customer_Surname`
FROM `ORDER` 
INNER JOIN `CUSTOMER`
ON  `CUSTOMER`.`Customer_ID` = `ORDER`.`Customer_ID`
WHERE `ORDER`.`OrderDate` BETWEEN '2017-01-01' AND '2017-12-31'
ORDER BY `OrderDate`

Welke serienummers zijn er vorig jaar verkocht
SELECT `ORDER`.`OrderDate`, `ORDER`.`Serial_No`,`PRODUCT`.`Type`
FROM `ORDER`
LEFT JOIN `PRODUCT`
ON `PRODUCT`.`Serial_No` = `ORDER`.`Serial_No`
WHERE `ORDER`.`OrderDate` 
BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND CURDATE()
ORDER BY `OrderDate`
 
Medewerker van het jaar:

SELECT COUNT(`Order_ID`),`Employee`
FROM `ORDER`
WHERE `OrderDate` BETWEEN DATE_SUB(curdate(), INTERVAL 1 YEAR) AND CURDATE()
GROUP BY `Employee`
ORDER BY COUNT(`Order_ID`) DESC; 

Reseller van het Jaar

SELECT COUNT(`ORDER`.`Order_ID`), `RESELLER`.`Company_Name`
FROM `ORDER`
LEFT JOIN `RESELLER`
ON `ORDER`.`Reseller_ID` = `RESELLER`.`Reseller_ID`
WHERE `OrderDate` BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND CURDATE()
GROUP BY `Company_Name`
ORDER BY COUNT(`ORDER`.`Order_ID`) DESC;

PROCEDURES:

DELIMITER //
CREATE PROCEDURE Resellervanplaatsnaam
  (IN tmp VARCHAR(40))
BEGIN
  SELECT *
  FROM `RESELLER`
  WHERE `City` = tmp;
END
//

Slechtste reseller van het jaar
SELECT COUNT(`ORDER`.`Order_ID`) , `RESELLER`.`Company_Name`
FROM `ORDER`
LEFT JOIN `RESELLER`
ON `ORDER`.`Reseller_ID` = `RESELLER`.`Reseller_ID`
WHERE `OrderDate` BETWEEN DATE_SUB(curdate(), INTERVAL 1 YEAR) AND CURDATE()
GROUP BY `RESELLER`.`Company_Name`
ORDER BY COUNT(`ORDER`.`Order_ID`);


Update:

Update de bedrijfsnaam van BCC naar Saturn

UPDATE `RESELLER`
SET `Company_Name` = 'Saturn'
WHERE `Company_Name` = 'BCC'


Update alle orderstatusen van afgelopen maand van packed naar shipped.

Telefoon nummer extra cijfer toevoegen.

Update shipingdata 2 weken na de orderdate



SELECT * FROM `ORDER`
WHERE `OrderDate` 
BETWEEN DATE_SUB(curdate(), INTERVAL 4 WEEK) AND CURDATE()


Delete:

Update customer gegevens en delete al zijn data.

Delete de resellers die minder dan 3 orders heeft verkocht.

Delete alle order van 2015 en ouder

DELETE FROM `ORDER`
WHERE `OrderDate` <= '2015-12-31'
