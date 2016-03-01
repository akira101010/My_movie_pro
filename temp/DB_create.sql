CREATE TABLE users(
id int not null auto_increment primary key,
name varchar(255));

ALTER TABLE users ADD c_date datetime;

CREATE TABLE movies(
id int not null auto_increment primary key,
url varchar(255),
site varchar(255),
title varchar(255),
view_count int,
fav_count int,
c_date datetime
);

CREATE TABLE sites(
id int not null auto_increment primary key,
name varchar(255),
function varchar(255),
movie_count int
);

CREATE TABLE follow_users(
id int not null auto_increment primary key,
user_id int,
follow_id int,
c_date datetime
);

CREATE TABLE fav_movies(
id int not null auto_increment primary key,
user_id int,
movie_id int,
comment varchar(255)
);

CREATE TABLE folders(
id int not null auto_increment primary key,
user_id int,
title varchar(255),
comment varchar(255),
fav_count int
);

CREATE TABLE folders_movies(
id int not null auto_increment primary key,
folder_id int,
movie_id int
);

CREATE TABLE fav_folders(
id int not null auto_increment primary key,
user_id int,
folder_id int
);

CREATE TABLE messages(
id int not null auto_increment primary key,
sent_user_id int,
receiving_user_id int,
body varchar(255),
c_date datetime
);