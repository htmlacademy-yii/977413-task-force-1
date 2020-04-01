CREATE DATABASE TaskForce
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE TaskForce;

CREATE TABLE users
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    dt_add DATETIME DEFAULT CURRENT_TIMESTAMP,
    city VARCHAR(255)
);

CREATE TABLE categories
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    icon VARCHAR(255) NOT NULL
);

CREATE TABLE tasks
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    dt_add DATETIME DEFAULT CURRENT_TIMESTAMP,
    category_id SMALLINT NOT NULL,
    description VARCHAR(255) NOT NULL,
    expire DATETIME,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    budget SMALLINT, # оплата труда, которую встановил заказчик, необязательное поле
    lat FLOAT(24) NOT NULL,
    lng FLOAT(24) NOT NULL,
    author_id INT,
    status INT # статус задания, не уверен, но думаю здесь будет INT
);

CREATE TABLE files_storage # хранилище файлов, которые добавлены заказчиком в описание задания
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    file_path VARCHAR(255), # путь к файлу
    file_type VARCHAR(255), # тип файла(img, doc.....)
    task_id SMALLINT, # задание к которому прикркплено
    dt_add DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE opinions # отзывы о исполнителях
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    dt_add DATETIME DEFAULT CURRENT_TIMESTAMP,
    rate INT NOT NULL, # оценка от 1 до 5
    description VARCHAR(255) NOT NULL, # текстовый отзыв
    author_id INT, # автор отзыва
    user_id INT, # тот, про кого отзыв
    task_id INT # задания которое оценивается
);

CREATE TABLE replies # отклики на задания от исполнителей
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    dt_add DATETIME DEFAULT CURRENT_TIMESTAMP,
    rate INT NOT NULL, # оценка от 1 до 5
    description VARCHAR(255), # отклик с комментарием, необязательное
    author_id INT, # кто откликается
    task_id INT, # задания на котором откликается
    salary FLOAT # предлагаемая сумма, необязательное
);

CREATE TABLE messages
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(255) NOT NULL, # сообщение которое отослано
    sender_id INT NOT NULL, # отправитель
    recipient_id INT NOT NULL, # получатель
    task_id INT NOT NULL, # задание по которому идет обсуждение
    dt_add DATETIME DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE notifications
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    notification VARCHAR(255) NOT NULL, # тип уведомление
    recipient_id INT NOT NULL, # получатель уведомление
    task_id INT NOT NULL, # задание по которому пришло уведомление
    dt_add DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cities
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    city VARCHAR(255) NOT NULL UNIQUE,
    lat FLOAT(24) NOT NULL,
    lng FLOAT(24) NOT NULL
    # sim_code - символьный код категории который при поиске по категории будет в адресной строке --> /cleaning или /express
);

CREATE TABLE profiles
(
    address VARCHAR(255) NOT NULL,
    bd VARCHAR(255) NOT NULL,
    about VARCHAR(255) NOT NULL,
    phone INT NOT NULL,
    skype VARCHAR(255) NOT NULL
);

ALTER TABLE tasks ADD FOREIGN KEY (category_id) REFERENCES categories(id);
ALTER TABLE tasks ADD FOREIGN KEY (author_id) REFERENCES users(id);
ALTER TABLE opinions ADD FOREIGN KEY (author_id) REFERENCES users(id);
ALTER TABLE opinions ADD FOREIGN KEY (user_id) REFERENCES users(id);
ALTER TABLE opinions ADD FOREIGN KEY (task_id) REFERENCES tasks(id);
ALTER TABLE replies ADD FOREIGN KEY (author_id) REFERENCES users(id);
ALTER TABLE replies ADD FOREIGN KEY (task_id) REFERENCES tasks(id);
ALTER TABLE messages ADD FOREIGN KEY (sender_id) REFERENCES users(id);
ALTER TABLE messages ADD FOREIGN KEY (recipient_id) REFERENCES users(id);
ALTER TABLE messages ADD FOREIGN KEY (task_id) REFERENCES tasks(id);
ALTER TABLE notifications ADD FOREIGN KEY (task_id) REFERENCES tasks(id);
ALTER TABLE notifications ADD FOREIGN KEY (recipient_id) REFERENCES users(id);
ALTER TABLE files_storage ADD FOREIGN KEY (task_id) REFERENCES tasks(id);
# ...

ALTER TABLE tasks ADD INDEX NIndex(name);
ALTER TABLE tasks ADD INDEX AIndex(author_id);
ALTER TABLE tasks ADD INDEX AIndex(author_id);
ALTER TABLE tasks ADD INDEX CIndex(category_id);
ALTER TABLE files_storage ADD INDEX TIndex(task_id);
ALTER TABLE opinions ADD INDEX TIndex(task_id);
ALTER TABLE replies ADD INDEX TIndex(task_id);
ALTER TABLE messages ADD INDEX TIndex(task_id);
ALTER TABLE notifications ADD INDEX TIndex(task_id);
# незнаю правильно ди столько много индексов делать...



