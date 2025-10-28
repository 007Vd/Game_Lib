use mydbs;

CREATE TABLE Genres(
genre_id INT PRIMARY KEY,
genre_name VARCHAR(45) NOT NULL
);

CREATE TABLE Developers(
dev_id INT PRIMARY KEY,
dev_name VARCHAR(45) NOT NULL,
country VARCHAR(45)
);

CREATE TABLE Memberships(
membership_id INT PRIMARY KEY,
type VARCHAR(45),
monthly_fee DECIMAL(6,2),
rental_limit int
);

CREATE TABLE Users(
user_id INT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100) UNIQUE,
phone VARCHAR(15),
membership_id INT,
join_date DATE,
FOREIGN KEY (membership_id) REFERENCES Memberships(membership_id)
);

CREATE TABLE Games(
game_id INT PRIMARY KEY,
title VARCHAR(100),
platform VARCHAR(50),
release_year YEAR,
price DECIMAL(6,2),
availability ENUM('Available','unavailable'),
avg_rating DECIMAL(2,1),
genre_id INT,
FOREIGN KEY(genre_id) REFERENCES Genres(genre_id)
);
show tables;
CREATE TABLE Rentals (
    rental_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    game_id INT,
    rental_date DATE NOT NULL,
    return_date DATE,
    status ENUM('Rented','Returned','Overdue') DEFAULT 'Rented',
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (game_id) REFERENCES Games(game_id)
);
CREATE TABLE Reviews (
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    game_id INT,
    rating DECIMAL(2,1) CHECK (rating BETWEEN 0 AND 5),
    comment VARCHAR(255),
    review_date DATE,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (game_id) REFERENCES Games(game_id)
);
CREATE TABLE Payments (
    payment_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    amount DECIMAL(8,2) NOT NULL,
    payment_date DATE NOT NULL,
    payment_type ENUM('Membership','Rental'),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);
CREATE TABLE Game_Developer (
    game_id INT,
    dev_id INT,
    PRIMARY KEY (game_id, dev_id),
    FOREIGN KEY (game_id) REFERENCES Games(game_id),
    FOREIGN KEY (dev_id) REFERENCES Developers(dev_id)
);
CREATE TABLE Purchases (
    purchase_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    game_id INT,
    purchase_date DATE NOT NULL,
    price DECIMAL(8,2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (game_id) REFERENCES Games(game_id)
);

show tables;

SET FOREIGN_KEY_CHECKS = 0;

DELETE FROM Payments;
DELETE FROM Purchases;
DELETE FROM Reviews;
DELETE FROM Rentals;
DELETE FROM Game_Developers;
DELETE FROM Games;
DELETE FROM Developers;
DELETE FROM Users;
DELETE FROM Memberships;
DELETE FROM Genres;

SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO Genres VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'RPG'),
(4, 'Sports'),
(5, 'Puzzle');

INSERT INTO Developers VALUES
(1, 'Ubisoft', 'France'),
(2, 'Nintendo', 'Japan'),
(3, 'EA Sports', 'USA'),
(4, 'Rockstar Games', 'USA'),
(5, 'Capcom', 'Japan');

INSERT INTO Memberships VALUES
(1, 'Basic', 199.00, 2),
(2, 'Silver', 299.00, 4),
(3, 'Gold', 499.00, 6),
(4, 'Platinum', 699.00, 10),
(5, 'Trial', 0.00, 1);

INSERT INTO Users VALUES
(1, 'Aarav Patel', 'aarav@example.com', '9876543210', 2, '2024-01-12'),
(2, 'Neha Sharma', 'neha@example.com', '9876543211', 3, '2024-02-15'),
(3, 'Rohan Mehta', 'rohan@example.com', '9876543212', 1, '2024-03-18'),
(4, 'Priya Singh', 'priya@example.com', '9876543213', 4, '2024-04-20'),
(5, 'Karan Das', 'karan@example.com', '9876543214', 5, '2024-05-22');

INSERT INTO Games VALUES
(1, 'Assassin’s Creed', 'PC', 2020, 1499.00, 'Available', 4.5, 1),
(2, 'The Legend of Zelda', 'Switch', 2023, 3999.00, 'Available', 4.8, 2),
(3, 'FIFA 24', 'PS5', 2024, 4999.00, 'Unavailable', 4.2, 4),
(4, 'GTA V', 'PC', 2015, 999.00, 'Available', 4.7, 1),
(5, 'Resident Evil 4', 'Xbox', 2023, 2999.00, 'Available', 4.6, 3);

INSERT INTO Game_Developer VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

INSERT INTO Rentals (user_id, game_id, rental_date, return_date, status) VALUES
(1, 1, '2024-05-01', '2024-05-07', 'Returned'),
(2, 2, '2024-06-02', NULL, 'Rented'),
(3, 3, '2024-06-10', '2024-06-17', 'Returned'),
(4, 4, '2024-07-01', '2024-07-10', 'Overdue'),
(5, 5, '2024-07-12', NULL, 'Rented');

INSERT INTO Reviews (user_id, game_id, rating, comment, review_date) VALUES
(1, 1, 4.5, 'Amazing gameplay and story!', '2024-05-08'),
(2, 2, 4.8, 'Beautiful graphics!', '2024-06-15'),
(3, 3, 4.0, 'Fun but repetitive.', '2024-06-18'),
(4, 4, 4.7, 'Classic open world game.', '2024-07-12'),
(5, 5, 4.6, 'Scary and thrilling.', '2024-07-15');

INSERT INTO Payments (user_id, amount, payment_date, payment_type) VALUES
(1, 299.00, '2024-05-01', 'Membership'),
(2, 499.00, '2024-06-02', 'Membership'),
(3, 99.00, '2024-06-10', 'Rental'),
(4, 699.00, '2024-07-01', 'Membership'),
(5, 149.00, '2024-07-12', 'Rental');

INSERT INTO Purchases (user_id, game_id, purchase_date, price) VALUES
(1, 1, '2024-06-01', 1499.00),
(2, 2, '2024-07-01', 3999.00),
(3, 3, '2024-07-15', 4999.00),
(4, 4, '2024-08-01', 999.00),
(5, 5, '2024-08-10', 2999.00);


