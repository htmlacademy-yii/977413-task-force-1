CREATE DATABASE TaskForce
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE TaskForce;

CREATE TABLE users
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    img VARCHAR(255),
    specializations SMALLINT, # специализации, которые выбраны пользователем, необязательное поле, здесь будет массив значений?
    date_born DATETIME,
    call_number VARCHAR(255),
    skype VARCHAR(255),
    other_messenger VARCHAR(255),
    rating SMALLINT NOT NULL, # средняя оценка исполнителя
    role VARCHAR(255) NOT NULL,
    dt_add DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    sim_code VARCHAR(255) NOT NULL
    # sim_code - символьный код категории который при поиске по категории будет в адресной строке --> /cleaning или /express
);

CREATE TABLE tasks
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    category_id SMALLINT NOT NULL,
    author_id INT NOT NULL,
    salary SMALLINT, # оплата труда, которую встановил заказчик, необязательное поле
    img VARCHAR(255), # ? ниже я сделал таблицу
    documents VARCHAR(255), # ? ниже я сделал таблицу
    location VARCHAR(255),
    status SMALLINT NOT NULL, # статус задания, не уверен, но думаю здесь будет INT
    date_finish DATETIME,
    date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE files_storage # хранилище файлов, которые добавлены заказчиком в описание задания
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    file_path VARCHAR(255), # путь к файлу
    file_type VARCHAR(255), # тип файла(img, doc.....)
    task_id SMALLINT, # задание к которому прикркплено
    date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reviews # отзывы о исполниелях
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    review VARCHAR(255) NOT NULL, # текстовый отзыв
    author_id INT NOT NULL, # автор отзыва
    user_id INT NOT NULL, # тот, про кого отзыв
    rating_author INT NOT NULL, # оценка от 1 до 5
    task_id INT NOT NULL, # задания которое оценивается
    date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE responses # отклики на задания от исполнителей
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    response VARCHAR(255), # отклик с комментарием, необязательное
    author_id INT NOT NULL, # кто откликается
    task_id INT NOT NULL, # задания на котором откликается
    salary SMALLINT, # предлагаемая сумма, необязательное
    date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE messages
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(255) NOT NULL, # сообщение которое отослано
    sender_id INT NOT NULL, # отправитель
    recipient_id INT NOT NULL, # получатель
    task_id INT NOT NULL, # задание по которому идет обсуждение
    date DATETIME DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE notifications
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    notification VARCHAR(255) NOT NULL, # тип уведомление
    recipient_id INT NOT NULL, # получатель уведомление
    task_id INT NOT NULL, # задание по которому пришло уведомление
    date DATETIME DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE tasks ADD FOREIGN KEY (category_id) REFERENCES categories(id);
ALTER TABLE tasks ADD FOREIGN KEY (author_id) REFERENCES users(id);
ALTER TABLE reviews ADD FOREIGN KEY (author_id) REFERENCES users(id);
ALTER TABLE reviews ADD FOREIGN KEY (user_id) REFERENCES users(id);
ALTER TABLE reviews ADD FOREIGN KEY (task_id) REFERENCES tasks(id);
ALTER TABLE responses ADD FOREIGN KEY (author_id) REFERENCES users(id);
ALTER TABLE responses ADD FOREIGN KEY (task_id) REFERENCES tasks(id);
ALTER TABLE messages ADD FOREIGN KEY (sender_id) REFERENCES users(id);
ALTER TABLE messages ADD FOREIGN KEY (recipient_id) REFERENCES users(id);
ALTER TABLE messages ADD FOREIGN KEY (task_id) REFERENCES tasks(id);
ALTER TABLE notifications ADD FOREIGN KEY (task_id) REFERENCES tasks(id);
ALTER TABLE notifications ADD FOREIGN KEY (recipient_id) REFERENCES users(id);
ALTER TABLE files_storage ADD FOREIGN KEY (task_id) REFERENCES tasks(id);
# не работает...

ALTER TABLE tasks ADD INDEX NIndex(name);
ALTER TABLE tasks ADD INDEX AIndex(author_id);
ALTER TABLE tasks ADD INDEX AIndex(author_id);
ALTER TABLE tasks ADD INDEX CIndex(category_id);
ALTER TABLE files_storage ADD INDEX TIndex(task_id);
ALTER TABLE reviews ADD INDEX TIndex(task_id);
ALTER TABLE responses ADD INDEX TIndex(task_id);
ALTER TABLE messages ADD INDEX TIndex(task_id);
ALTER TABLE notifications ADD INDEX TIndex(task_id);
# незнаю правильно ди столько много индексов делать...
