CREATE TABLE role (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL
);

INSERT INTO roles (role_name) VALUES ('Giáo viên');
INSERT INTO roles (role_name) VALUES ('Học sinh');


ALTER TABLE students
ADD COLUMN roleId INT;

UPDATE students
SET roleId = 1;



ALTER TABLE teachers
ADD COLUMN roleId INT;

UPDATE teachers
SET roleId = 2;