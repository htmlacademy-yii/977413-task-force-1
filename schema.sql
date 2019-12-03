CREATE DATABASE TaskForce
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE TaskForce;

CREATE TABLE users
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name CHAR(128) NOT NULL,
    email CHAR(128) NOT NULL UNIQUE,
    password CHAR(128) NOT NULL,
    address CHAR(128) NOT NULL,
    description CHAR(128) NOT NULL,
    img CHAR(128),
    specializations INT(11),
    date_born DATETIME NOT NULL,
    call_number CHAR(128) NOT NULL,
    skype CHAR(128),
    other_messenger CHAR(128),
    rating INT,
    role CHAR(128),
    dt_add DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name CHAR(128) NOT NULL,
    sim_code CHAR(128) NOT NULL
);

CREATE TABLE tasks
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name CHAR(128) NOT NULL,
    description CHAR(128) NOT NULL,
    category_id INT,
    author_id INT,
    salary INT,
    img CHAR(128),
    documents CHAR(128),
    location CHAR(128),
    status INT,
    date_finish DATETIME,
    date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reviews
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    review CHAR(128),
    author_id INT,
    user_id INT,
    rating_author INT,
    task_id INT,
    date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE responses
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    response CHAR(128),
    author_id INT,
    task_id INT,
    salary INT,
    date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE messages
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    message CHAR(128),
    author_id INT,
    adresant_id INT,
    task_id INT,
    date DATETIME DEFAULT CURRENT_TIMESTAMP

);
CREATE UNIQUE INDEX email_user ON users(email);
CREATE INDEX task_name ON tasks(name);
CREATE INDEX author ON tasks(author_id);
# какие еще нужны индексы?
# все ли таблицы я определил?
