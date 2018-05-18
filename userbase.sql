CREATE database userbase;
use userbase;

CREATE TABLE Lesson(
	LessonNo integer (10) Not Null unique,
	LessonName varchar (255)
);

CREATE TABLE Person(
	PersonCode integer(10) Not Null unique
    CHECK(PersonCode>0),
	FirstName varchar(255),
	LastName varchar(255),
	PRIMARY KEY (PersonCode)
);

CREATE TABLE UserAcc(
	Person integer(10) Not Null unique,
	UserID varchar(12) Not Null unique,
	UserPassword varchar(20) Not Null 
    CHECK(UserPassword.Length()>6),
	UserCode integer(10) Not Null unique CHECK(UserCode>0),
	FOREIGN KEY (Person) References Person (PersonCode),
	PRIMARY KEY (UserCode)
);

CREATE TABLE GRADE(
	UserCode integer(10) Not Null unique CHECK(UserCode>0),
    LessonNo integer(10) Not Null unique
    CHECK(PersonCode>0),
    Grade integer(3) Not Null,
	FOREIGN KEY (UserCode) references UserAcc(UserCode),
    FOREIGN KEY (LessonNo) references Lesson(LessonNo)
);