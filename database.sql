CREATE TABLE Task_Main (
    task_main_id int not null primary key auto_increment,
    user_id int,
    task_title varchar(255),
    creation_day varchar(255),
    estimate_conclusion_day varchar(255),
    status int,
    category int
);

CREATE TABLE task (
    task_id int not null primary key auto_increment,
    task_main_id int,
    user_id int,
    task_name varchar(255),
    status int,
    category_id int
);