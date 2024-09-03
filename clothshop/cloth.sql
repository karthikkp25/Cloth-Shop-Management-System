-- Manager Table
CREATE TABLE Manager (
    ManagerID INT PRIMARY KEY,
    Name VARCHAR(255),
    Username VARCHAR(50),
    Password VARCHAR(50),
    ContactNumber VARCHAR(15)
);

-- Inventory Table
CREATE TABLE Inventory (
    ProductID INT PRIMARY KEY,
    Name VARCHAR(255),
    Description TEXT,
    Price DECIMAL(10, 2),
    Quantity INT,
    ManagerID INT,
    Category ENUM('Men', 'Women', 'Child'),  -- Category can be Men, Women, or Child
    FOREIGN KEY (ManagerID) REFERENCES Manager(ManagerID)
);

-- Offers Table
CREATE TABLE Offers (
    OfferID INT PRIMARY KEY,
    ProductID INT,
    DiscountPercentage DECIMAL(5, 2),
    StartDate DATE,
    EndDate DATE,
    FOREIGN KEY (ProductID) REFERENCES Inventory(ProductID)
);

-- Billings Table
CREATE TABLE Billings (
    BillingID INT PRIMARY KEY,
    ManagerID INT,
    ProductID INT,
    SaleDate DATE,
    Quantity INT,
    TotalAmount DECIMAL(10, 2),
    FOREIGN KEY (ManagerID) REFERENCES Manager(ManagerID),
    FOREIGN KEY (ProductID) REFERENCES Inventory(ProductID),
    INDEX (ManagerID, ProductID)
);

-- Feedback Table
CREATE TABLE Feedback (
    FeedbackID INT PRIMARY KEY,
    ManagerID INT,
    CustomerID INT,
    ProductID INT,
    Rating INT,
    Comment TEXT,
    FeedbackDate DATE,
    FOREIGN KEY (ManagerID) REFERENCES Manager(ManagerID),
    FOREIGN KEY (ProductID) REFERENCES Inventory(ProductID)
);
