
DROP DATABASE IF EXISTS  BOOK_ORDERING;
CREATE DATABASE BOOK_ORDERING;

/*******************************************************************/
CREATE TABLE  Major (
    MajorCode char(2),
    MajorName varchar(50),
    PRIMARY KEY(MajorCode));

INSERT INTO Major (MajorCode,MajorName) 
VALUES('01','Computer Science');

INSERT INTO Major (MajorCode,MajorName) 
VALUES('02','Statistics');

INSERT INTO Major (MajorCode,MajorName) 
VALUES('03','Mathematics');

INSERT INTO Major (MajorCode,MajorName) 
VALUES('04','Data Science');

/*******************************************************************/
CREATE TABLE STUDENT(
    StudentID  char(5),
    StudentName  VARCHAR(50),
    MajorCode     char(2),
    MinorCode     char(2),
    PRIMARY KEY (StudentID),
    FOREIGN KEY (MajorCode)  REFERENCES Major(MajorCode),
    FOREIGN KEY (MinorCode)  REFERENCES Major(MajorCode));


INSERT INTO STUDENT(StudentID,StudentName,MajorCode,MinorCode) 
VALUES('61001','Eric','01','04');

INSERT INTO STUDENT(StudentID,StudentName,MajorCode,MinorCode)
VALUES('61002','Potter','02','03');

INSERT INTO STUDENT(StudentID,StudentName,MajorCode,MinorCode) 
VALUES('61003','Mark','01','04');

INSERT INTO STUDENT(StudentID,StudentName,MajorCode,MinorCode)
VALUES('61004','Jackson','01','04');

INSERT INTO STUDENT(StudentID,StudentName,MajorCode,MinorCode) 
VALUES('61005','Pinky','03','01');

INSERT INTO STUDENT(StudentID,StudentName,MajorCode,MinorCode) 
VALUES('61006','Risa','02','01');

INSERT INTO STUDENT(StudentID,StudentName,MajorCode) 
VALUES('61007','Jane','01');


/*******************************************************************/
CREATE TABLE ORDERS(
    OrderID smallint not null auto_increment,
    StudentID  char(5) not null,
    discount   float,
    PRIMARY KEY (OrderID),
    FOREIGN KEY (StudentID)  REFERENCES STUDENT(StudentID));

INSERT INTO ORDERS(StudentID,discount) 
VALUES  ('61003',10);

INSERT INTO ORDERS(StudentID,discount)  
VALUES  ('61004',5);

INSERT INTO ORDERS(StudentID,discount)  
VALUES  ('61003',5);

INSERT INTO ORDERS(StudentID,discount)  
VALUES  ('61006',0);

INSERT INTO ORDERS(StudentID,discount)  
VALUES  ('61005',10);

INSERT INTO ORDERS(StudentID,discount) 
VALUES  ('61002',5);

INSERT INTO ORDERS(StudentID,discount) 
VALUES  ('61007',5);

INSERT INTO ORDERS(StudentID)  
VALUES  ('61001');

/*******************************************************************/
CREATE TABLE  BOOK (
    ISBN  char(13),
    bookTitle varchar(100),
    price  float,
    PreBook char(13),
    PRIMARY KEY(ISBN),
	FOREIGN KEY (PreBook)  REFERENCES  BOOK(ISBN));

INSERT INTO BOOK(ISBN,bookTitle,price) 
VALUES  ('1111111111111','System Analysis',550);

INSERT INTO BOOK(ISBN,bookTitle,price) 
VALUES  ('2222222222222','Database System I',800);

INSERT INTO BOOK(ISBN,bookTitle,price,PreBook) 
VALUES  ('33333333333333','Database System II',1000.00,'2222222222222');

INSERT INTO BOOK(ISBN,bookTitle,price) 
VALUES  ('4444444444444','Software Engineering',900);

INSERT INTO BOOK(ISBN,bookTitle,price,PreBook)  
VALUES  ('5555555555555','Advanced Software Engineering',1200.00,'4444444444444');

INSERT INTO BOOK(ISBN,bookTitle,price,PreBook)  
VALUES  ('6666666666666','Data Warehousing',950.00,'2222222222222');

/*******************************************************************/
CREATE TABLE DETAIL(
    OrderID smallint ,
    ISBN  char(13),
    Qty   smallint,
    PRIMARY KEY (OrderID,ISBN),
    FOREIGN KEY (OrderID)  REFERENCES ORDERS(OrderID),
    FOREIGN KEY (ISBN)  REFERENCES  BOOK(ISBN));

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (1,'1111111111111',2);

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (1,'2222222222222',3);

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (1,'4444444444444',3);

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (2,'2222222222222',1);

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (3,'33333333333333',3);

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (3,'4444444444444',4);

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (4,'5555555555555',1);

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (4,'4444444444444',2);

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (5,'33333333333333',1);

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (5,'2222222222222',1);

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (6,'2222222222222',2);

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (7,'1111111111111',2);

INSERT INTO DETAIL(OrderID ,ISBN,Qty) 
VALUES  (8,'33333333333333',5);













