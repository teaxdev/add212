DELETE FROM joke;
CREATE TABLE joke ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, joketext TEXT NOT NULL, jokedate DATE NOT NULL ); 

INSERT INTO joke (joketext, jokedate) VALUES ('Why did the chicken cross the road? To get to the other side!', '2024-01-15'), 
('What do you call a fake noodle? An impasta!', '2024-01-16'), 
('Why don\'t scientists trust atoms? Because they make up everything!', '2024-01-17');

SELECT * FROM joke;