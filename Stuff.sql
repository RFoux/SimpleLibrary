--Table structure for table 'Members'
DROP TABLE IF EXISTS Members;

CREATE TABLE Members(
	ID int(2) NOT NULL,
	Name varchar(45) NOT NULL,
	Phone varchar(10) NOT NULL,
	Email varchar(45)DEFAULT NULL,
	Address varchar(50) NOT NULL,
	Age int(2),
	CHECK (Age>=13),
	Sex varchar(1) DEFAULT NULL,
	RDate varchar(10) NOT NULL,
	Books_Read int DEFAULT 0,
	Hold varchar(1) DEFAULT 'N',
	PRIMARY KEY (ID)
);
	

--Dumping data for table 'Members'
LOCK TABLES Members WRITE;

INSERT INTO Members VALUES (1,'John Doe','1546597852','DJoe23@gmail.com','300 Congress St.',25,'M','2018-01-11',5,'N'),(2,'Maya Richard','4586795123','Maya1990@yahoo.com','635 Harrel Dr.',29,'F','2011-05-19',15,'Y'),(3,'Kristy Haines','1867598532','Haines@gmail.com','204 Gerald Dr.',16,'F','2019-04-09',DEFAULT,DEFAULT),(4,'Marty Schroeter','5486759852',DEFAULT,'304 Tours St.',56,'M','2015-02-05',5,'N'),(5,'Nadine Garnett','1258468568','Garnett17@aol.com','823 South College Rd',43,'F','2000-06-18',24,'N'),(6,'Bobby Garnett','1258342568','Garnett12@aol.com','823 South College Rd',45,'M','2000-06-18',20,'N');
UNLOCK TABLES;

--Table structure for table 'Books'
DROP TABLE IF EXISTS Books;

CREATE TABLE Books(
	BID int(3) NOT NULL,
	Title varchar(50) NOT NULL,
	Author varchar(50) NOT NULL,
	Quantity int(2) DEFAULT 1,
	PRIMARY KEY (BID)
);

--Dumping data for table 'Books'
LOCK TABLES Books WRITE;

INSERT INTO Books VALUES (1,'The Hobbit','J. R. R. Tolkien',7),(2,'Lord of the Flies','William Golding',3),(3,'To Kill a Mockingbird','Harper Lee',9),(4,'The Girl with the Dragon Tattoo','Stieg Larson',2),(5,'1984','George Orwell',6),(6,'Fahrenheit 451','Ray Bradbury',1),(7,'The Gunslinger','Stephen King',2),(8,'The Great Gatsby','F. Scott Fitzgerald',10),(9,'The Kite Runner','Khaled Hosseini',5),(10,'The Odyssey','Homer',2);
UNLOCK TABLES;

--Table structure for table 'Prizes'
DROP TABLE IF EXISTS Prizes;

CREATE TABLE Prizes(
	Num_of_Books int,
	Prize char(30)
);

--Dumping data for table 'Prizes'
LOCK TABLES Prizes WRITE;

INSERT INTO Prizes VALUES (1,'Bookmark'),(5,'Pack of Pencils/Pens'),(10,'Headphones'),(20,'Journal'),(30,'Book of your choosing');
UNLOCK TABLES;

--Table structure for table 'BookClubs'
DROP TABLE IF EXISTS BookClubs;

CREATE TABLE BookClubs(
	CID int(1) NOT NULL,
	Club varchar(20) NOT NULL,
	HostID int(2) NOT NULL,
	Book int(3) NOT NULL,
	MeetDay varchar(4) DEFAULT NULL,
	MeetTime varchar(4) DEFAULT NULL,
	PRIMARY KEY (CID),
	FOREIGN KEY (HostID) REFERENCES Members (ID) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (Book) REFERENCES Books (BID) ON DELETE CASCADE ON UPDATE CASCADE	
);

--Dumping data for table 'BookClubs'
LOCK TABLES BookClubs WRITE;

INSERT INTO BookClubs VALUES (1,'A Novel Idea',4,7,'Thur','3pm'),(2,'The Bookaholics',5,8,'Sat','12pm'),(3,'Page of Pages',3,1,'Fri','5pm');
UNLOCK TABLES;

--Table structure for table 'Joined'
DROP TABLE IF EXISTS Joined;

CREATE TABLE Joined(
	ID int(2) NOT NULL,
	CID int(2) NOT NULL,
	FOREIGN KEY (ID) REFERENCES Members (ID) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (CID) REFERENCES BookClubs (CID) ON DELETE CASCADE ON UPDATE CASCADE

);

--Dumping data for table 'Joined'
LOCK TABLES Joined WRITE;

INSERT INTO Joined VALUES (1,1),(1,2),(4,2),(5,1),(2,3);
UNLOCK TABLES;

--Table structure for table 'ChecksOut'
DROP TABLE IF EXISTS ChecksOut;

CREATE TABLE ChecksOut(
	MID int(2) NOT NULL,
	BID int(3) NOT NULL,
	Due_Date varchar(10) NOT NULL,
	FOREIGN KEY (MID) REFERENCES Members (ID) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (BID) REFERENCES Books (BID) ON DELETE CASCADE ON UPDATE CASCADE
);

--Dumping data for table 'CheckOut'
LOCK TABLES ChecksOut WRITE;

INSERT INTO ChecksOut VALUES (3,1,'2019-04-30'),(2,1,'2019-04-03'),(4,7,'2019-05-15');
UNLOCK TABLES;

--Table structure for table 'Supplier'
DROP TABLE IF EXISTS Supplier;

CREATE TABLE Supplier(
	SID int(2) NOT NULL,
	BIDs int(3) NOT NULL,
	FOREIGN KEY (BIDs) REFERENCES Books (BID) ON DELETE CASCADE ON UPDATE CASCADE
);

--Dumping data for table 'Supplier'
LOCK TABLES Supplier WRITE;

INSERT INTO Supplier VALUES (1,5),(1,3),(1,9),(2,10),(2,5),(2,1),(3,2),(3,4),(3,6),(4,7),(4,8);
UNLOCK TABLES;
	
