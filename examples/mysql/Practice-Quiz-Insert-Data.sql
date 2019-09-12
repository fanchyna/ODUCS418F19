/********************************************************************************/
/*																				*/
/*	These are the Microsoft SQL Server 2012 SQL code solutions					*/
/*																				*/
/********************************************************************************/

/*****   OWNER DATA   ***********************************************************/

INSERT INTO OWNER VALUES(
	'Mary Jones', 'Mary.Jones@somewhere.com', 'Individual');
INSERT INTO OWNER VALUES(
	'DT Enterprises', 'DTE@dte.com', 'Corporation');
INSERT INTO OWNER (OwnerName, OwnerType) VALUES(
	'Sam Douglas', 'Individual');
INSERT INTO OWNER VALUES(
	'UNY Enterprises', 'UNYE@unye.com', 'Corporation');
INSERT INTO OWNER VALUES(
	'Doug Samuels', 'Doug.Samuels@somewhere.com', 'Individual');

/*****   GG_EMPLOYEE   *************************************************************/

INSERT INTO GG_EMPLOYEE VALUES(
	'Smith', 'Sam', '206-254-1234', 'Master');
INSERT INTO GG_EMPLOYEE VALUES(
	'Evanston', 'John','206-254-2345', 'Senior');
INSERT INTO GG_EMPLOYEE VALUES(
	'Murray', 'Dale', '206-254-3456', 'Junior');
INSERT INTO GG_EMPLOYEE VALUES(
	'Murphy', 'Jerry', '585-545-8765', 'Master');
INSERT INTO GG_EMPLOYEE VALUES(
	'Fontaine', 'Joan', '206-254-4567', 'Senior');

/*****   PROPERTY   *************************************************************/

INSERT INTO [PROPERTY] VALUES(
	'Eastlake Building', '123 Eastlake', 'Seattle', 'WA', '98119', 2);
INSERT INTO [PROPERTY] VALUES(
	'Elm St Apts', '4 East Elm', 'Lynwood', 'WA', '98223', 1);
INSERT INTO [PROPERTY] VALUES(
	'Jefferson Hill', '42 West 7th St', 'Bellevue', 'WA', '98007', 2);
INSERT INTO [PROPERTY] VALUES(
	'Lake View Apts', '1265 32nd Avenue', 'Redmond', 'WA', '98052', 3);
INSERT INTO [PROPERTY] VALUES(
	'Kodak Heights Apts', '65 32nd Avenue', 'Rochester', 'NY', '14604', 4);
INSERT INTO [PROPERTY] VALUES(
	'Private Residence','1456 48th St', 'Bellevue', 'WA', '98007', 1);
INSERT INTO [PROPERTY] VALUES(
	'Private Residence', '1567 51st St', 'Bellevue', 'WA', '98007', 3);
INSERT INTO [PROPERTY] VALUES(
	'Private Residence', '567 151st St', 'Rochester', 'NY', '14604', 5);

/*****   SERVICE   **************************************************************/

INSERT INTO [SERVICE] VALUES(1, 1, '05-MAY-12', 4.50);
INSERT INTO [SERVICE] VALUES(3, 3, '08-MAY-12', 4.50);
INSERT INTO [SERVICE] VALUES(2, 2, '08-MAY-12', 2.75);
INSERT INTO [SERVICE] VALUES(6, 5, '10-MAY-12', 2.50);
INSERT INTO [SERVICE] VALUES(5, 4, '12-MAY-12', 7.50);
INSERT INTO [SERVICE] VALUES(8, 4, '15-MAY-12', 2.75);
INSERT INTO [SERVICE] VALUES(4, 1, '19-MAY-12', 3.00);
INSERT INTO [SERVICE] VALUES(7, 2, '19-MAY-12', 2.50);

/****************************************************************************************/

