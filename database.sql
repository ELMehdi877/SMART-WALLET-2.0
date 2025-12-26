DROP DATABASE IF EXISTS smart_wallet2_0;
CREATE DATABASE IF NOT EXISTS smart_wallet2_0;
use smart_wallet2_0;

#creation de tableau users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

#creation de tableau category
-- CREATE TABLE IF NOT EXISTS category(
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     user_id INT,
--     CONSTRAINT fr_category_users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
--     category_name VARCHAR(20) NOT NULL,
--     created_at DATETIME DEFAULT CURRENT_TIMESTAMP
-- );

#creation de tableau incomes
DROP TABLE IF EXISTS incomes;
CREATE TABLE if not exists incomes(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    CONSTRAINT fk_incomes_users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    category_name VARCHAR(20) NOT NULL,
    montants DECIMAL(10,2) not null check (montants > 0),
    description VARCHAR(35) not null,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS expenses;
CREATE TABLE if not exists expenses(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    CONSTRAINT fk_expenses_users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    category_name VARCHAR(20) NOT NULL,
    montants DECIMAL(10,2) not null check (montants > 0),
    description VARCHAR(35) not null,
    date  DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

 
#insertion (INSERT)
 INSERT INTO users(fullname,email,password) VALUES ("ahmed","ahmed@gmail.com",125),
 ("amine","amine@gmail.com",548);

 #selection et LIRE (READ) 
 SELECT * FROM users;

 #modifie (UPDATE)
 UPDATE users SET fullname = 'mohamed' WHERE fullname = "mehdi";
UPDATE users SET password = 852 WHERE fullname = "mehdi";

#supprimee (DELETE)
DELETE FROM users WHERE fullname = "amine";

#les operations sur les tableaux
ALTER TABLE users DROP COLUMN fullname;
ALTER TABLE users ADD COLUMN sports VARCHAR(30) NOT NULL;
ALTER TABLE users MODIFY COLUMN sports TEXT NOT NULL;
ALTER TABLE incomes CHANGE COLUMN income_date date  DATETIME DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE users MODIFY COLUMN fullname VARCHAR(30) NOT NULL;
DELETE FROM users;
ALTER TABLE users AUTO_INCREMENT = 1;

insert into expenses (montants, categorie, description,date) 
values (55.5, "t9diya", "khizo btata","2025/12/8"),
(88.5, "t9diya", "khizo btata", "2025/12/8"),
(90.5, "t9diya", "khizo btata", "2025/12/8"),
(55.5, "t9diya", "khizo btata", "2025/12/19");

select * from incomes;
select * from expenses;
delete from incomes;
select * from users;
show tables;
CREATE DATABASE IF NOT EXISTS finance_manager;

SELECT montants, categorie, description FROM expenses WHERE date = CURRENT_DATE;
SELECT MAX(montants) FROM expenses;