CREATE DATABASE blogcyrus;


CREATE TABLE posts(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	content VARCHAR(1000)
);

INSERT INTO posts
(content)
VALUES
("1st blog entry"),
("2nd blog entry")



SELECT * FROM posts;

