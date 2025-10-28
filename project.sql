
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
