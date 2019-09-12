/************************************************************************/
/*																		*/
/*	These are the Microsoft SQL Server 2012 SQL code solutions			*/
/*				›														*/
/************************************************************************/

CREATE TABLE OWNER(
	OwnerID			Int				NOT NULL IDENTITY(1,1),
	OwnerName		Char(50)		NOT NULL,
	OwnerEmail		VarChar(100)	NULL,
	OwnerType		Char(12)		NULL,
	CONSTRAINT		OWNER_PK		PRIMARY KEY(OwnerID)
	);

CREATE TABLE [PROPERTY](
	PropertyID		Int				NOT NULL IDENTITY(1,1),
	PropertyName	Char(50)		NOT NULL,
	Street			Char(35)		NOT NULL,
	City			Char(35)		NOT NULL,
	[State]			Char(2)			NOT NULL,
	ZIP				Char(10)		NOT NULL,
	OwnerID			Int				NOT NULL,
	CONSTRAINT		PROPERTY_PK	PRIMARY KEY(PropertyID),
	CONSTRAINT		PROP_OWNER_FK	FOREIGN KEY (OwnerID)
							REFERENCES OWNER(OwnerID)
									ON DELETE NO ACTION
	);

CREATE TABLE GG_EMPLOYEE(
	EmployeeID		Int				NOT NULL IDENTITY(1,1),
	LastName		Char(25)		NOT NULL,
	FirstName		Char(25)		NOT NULL,
	CellPhone		Char(12)		NOT NULL,
	ExperienceLevel	Char(15)		NOT NULL,
	CONSTRAINT		EMPLOYEE_PK		PRIMARY KEY(EmployeeID)
	);

CREATE TABLE [SERVICE](
	PropertyID		Int				NOT NULL,
	EmployeeID		Int				NOT NULL,
	ServiceDate		DateTime		NOT NULL,
	HoursWorked		Numeric (4,2)	NULL,
	CONSTRAINT		SERVICE_PK 		
							PRIMARY KEY(PropertyID, EmployeeID, ServiceDate),
	CONSTRAINT		SERVICE_PROP_FK FOREIGN KEY (PropertyID)
							REFERENCES PROPERTY(PropertyID)
									ON DELETE NO ACTION,
	CONSTRAINT		SERVICE_EMP_FK FOREIGN KEY (EmployeeID)
							REFERENCES GG_EMPLOYEE(EmployeeID)
									ON DELETE NO ACTION
									ON UPDATE CASCADE
	);

/********************************************************************************/