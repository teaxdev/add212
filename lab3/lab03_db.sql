-- CREATE TABLE `books` ( `id` INT PRIMARY KEY AUTO_INCREMENT, `title` VARCHAR(255) NOT NULL, `author` VARCHAR(255) NOT NULL, `isbn` VARCHAR(13), `publication_year` INT, `genre` VARCHAR(100), `price` DECIMAL(10,2), `created_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ); 
 
-- CREATE TABLE `student` ( `id` INT PRIMARY KEY AUTO_INCREMENT, `first_name` VARCHAR(255) NOT NULL, `last_name` VARCHAR(255) NOT NULL, `email` VARCHAR(100), `major` VARCHAR(100), `enrollment_date` DATE, `gpa` FLOAT(3, 2) );
CREATE TABLE `students` ( `id` INT PRIMARY KEY AUTO_INCREMENT, `first_name` VARCHAR(100) NOT NULL, `last_name` VARCHAR(100) NOT NULL, `email` VARCHAR(100) UNIQUE NOT NULL, `major` VARCHAR(100), `enrollment_date` DATE, `gpa` DECIMAL(3,2), `created_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP );
 
INSERT INTO `books` SET `title` = 'The Great Gatsby', `author` = 'F. Scott Fitzgerald', `isbn` = '9780743273565', `publication_year` = 1925, `genre` = 'Fiction', `price` = 12.99; -- Insert books using VALUES syntax INSERT INTO `books` (`title`, `author`, `isbn`, `publication_year`, `genre`, `price`) VALUES ('To Kill a Mockingbird', 'Harper Lee', '9780446310789', 1960, 'Fiction', 14.99), ('1984', 'George Orwell', '9780451524935', 1949, 'Science Fiction', 11.99), ('Pride and Prejudice', 'Jane Austen', '9780141439518', 1813, 'Romance', 9.99), ('The Hobbit', 'J.R.R. Tolkien', '9780547928241', 1937, 'Fantasy', 15.99);
INSERT INTO `students` (`first_name`, `last_name`, `email`, `major`, `enrollment_date`, `gpa`) VALUES ('John', 'Smith', 'john.smith@university.edu', 'Computer Science', '2023-09-01', 3.75), ('Sarah', 'Johnson', 'sarah.johnson@university.edu', 'Mathematics', '2023-09-01', 3.92), ('Michael', 'Brown', 'michael.brown@university.edu', 'Physics', '2023-09-01', 3.45), ('Emily', 'Davis', 'emily.davis@university.edu', 'English', '2023-09-01', 3.88), ('David', 'Wilson', 'david.wilson@university.edu', 'History', '2023-09-01', 3.67);

SELECT `major`, `gpa` FROM `students` WHERE `major` = 'Computer Science' AND `gpa` >= '3.5';

SELECT * FROM `books`; 
SELECT `title`, `author`, `genre` FROM `books`; 
SELECT * FROM `books` WHERE `genre` = 'Fiction'; 
SELECT `title`, `author`, `publication_year` FROM `books` WHERE `publication_year` > 1950; 
SELECT `title`, `price` FROM `books` WHERE `price` < 15.00; -- Use LIKE for pattern matching SELECT * FROM `books` WHERE `title` LIKE '%The%'; 
SELECT * FROM `students`; -- Select students with high GPA SELECT `first_name`, `last_name`, `gpa` FROM `students` WHERE `gpa` >= 3.8; 
SELECT COUNT(*) as total_books FROM `books`; -- Count books by genre SELECT `genre`, COUNT(*) as count FROM `books` GROUP BY `genre`;

UPDATE `books` SET `price` = 13.99 WHERE `title` = 'The Great Gatsby' AND `id` = 1; 
SELECT id FROM books WHERE title = 'The Great Gatsby';
UPDATE `books` SET `price` = `price` * 1.10 WHERE `genre` = 'Fiction'; 
UPDATE `students` SET `gpa` = 3.95 WHERE `email` = 'sarah.johnson@university.edu'; 
UPDATE `students` SET `major` = 'Computer Engineering' WHERE `id` = 1;