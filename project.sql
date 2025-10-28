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



