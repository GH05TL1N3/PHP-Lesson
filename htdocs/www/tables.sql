CREATE TABLE Customers (
    CustomerID  INT UNSIGNED    NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
    CustomerName    CHAR(30)    NOT NULL,
    Address     CHAR(30)    NOT NULL,
    Phone       CHAR(20)    NOT NULL
);


CREATE TABLE Orders (
    OrderID     INT UNSIGNED    NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
    CustomerID  INT UNSIGNED    NOT NULL,
    Amount      FLOAT(6,2)      NOT NULL,
    Date        DATE            NOT NULL
);


CREATE TABLE Books (
    ISBN        CHAR(13)  NOT NULL  PRIMARY KEY,
    Title       CHAR(60),
    Price       FLOAT(4,2)
);


CREATE TABLE OrderDetails (
    OrderID     INT UNSIGNED    NOT NULL,
    ISBN        CHAR(13)  NOT NULL,
    Quantity    TINYINT UNSIGNED,
    PRIMARY KEY (OrderID, ISBN)
);







    