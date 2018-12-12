CREATE TABLE trees.`condition`
(
    id tinyint(3) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    type varchar(25) NOT NULL,
    imageSrc varchar(50)
);
INSERT INTO trees.`condition` (id, type, imageSrc) VALUES (1, 'Нормальне', 'tree.jpg');
INSERT INTO trees.`condition` (id, type, imageSrc) VALUES (2, 'Напівсухе', 'good-bad.png');
INSERT INTO trees.`condition` (id, type, imageSrc) VALUES (3, 'Сухе', 'bad.png');
CREATE TABLE trees.tree
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    type tinyint(7),
    lat double,
    lng double,
    stature float,
    diameter float,
    is_active tinyint(1) DEFAULT '1',
    state tinyint(3),
    user_id int(11),
    CONSTRAINT tree_type_id_fk FOREIGN KEY (type) REFERENCES type (id),
    CONSTRAINT tree_condition_id_fk FOREIGN KEY (state) REFERENCES `condition` (id),
    CONSTRAINT tree_user_id_fk FOREIGN KEY (user_id) REFERENCES user (id)
);
CREATE INDEX tree_type_id_fk ON trees.tree (type);
CREATE INDEX tree_condition_id_fk ON trees.tree (state);
CREATE INDEX tree_user_id_fk ON trees.tree (user_id);
INSERT INTO trees.tree (id, type, lat, lng, stature, diameter, is_active, state, user_id) VALUES (1, 1, 47.844178069310075, 35.125194941190784, 45, 3, 1, 1, null);
INSERT INTO trees.tree (id, type, lat, lng, stature, diameter, is_active, state, user_id) VALUES (2, 4, 47.84800098120972, 35.121649300287686, 12, 1, 1, 3, null);
INSERT INTO trees.tree (id, type, lat, lng, stature, diameter, is_active, state, user_id) VALUES (6, 3, 47.4523543254, 45.35345362, 16, 1, 0, 2, 4);
INSERT INTO trees.tree (id, type, lat, lng, stature, diameter, is_active, state, user_id) VALUES (7, 11, 47.84800018121, 35.121649300288, 16, 1, 0, 2, 4);
INSERT INTO trees.tree (id, type, lat, lng, stature, diameter, is_active, state, user_id) VALUES (8, 2, 47.845288571667, 35.142847969922, 7, 2, 0, 3, 4);
INSERT INTO trees.tree (id, type, lat, lng, stature, diameter, is_active, state, user_id) VALUES (9, 4, 47.837085970843, 35.186710063843, 10, 6, 0, 2, 4);
INSERT INTO trees.tree (id, type, lat, lng, stature, diameter, is_active, state, user_id) VALUES (10, 8, 47.830648899783, 35.147653931569, 25, 0.8, 0, 1, 4);
INSERT INTO trees.tree (id, type, lat, lng, stature, diameter, is_active, state, user_id) VALUES (17, 1, 47.846533654437, 35.069551174072, 11, 1, 0, 2, 4);
INSERT INTO trees.tree (id, type, lat, lng, stature, diameter, is_active, state, user_id) VALUES (18, 2, 47.868763485129, 35.17726868811, 5, 3, 0, 2, 4);
INSERT INTO trees.tree (id, type, lat, lng, stature, diameter, is_active, state, user_id) VALUES (21, 6, 47.854827762867, 35.094699565796, 2, 3, 0, 3, 4);
CREATE TABLE trees.type
(
    id tinyint(7) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title varchar(50) NOT NULL
);
CREATE UNIQUE INDEX type_id_uindex ON trees.type (id);
INSERT INTO trees.type (id, title) VALUES (1, 'Дуб');
INSERT INTO trees.type (id, title) VALUES (2, 'Береза');
INSERT INTO trees.type (id, title) VALUES (3, 'Ясень');
INSERT INTO trees.type (id, title) VALUES (4, 'Тополь');
INSERT INTO trees.type (id, title) VALUES (5, 'Верба');
INSERT INTO trees.type (id, title) VALUES (6, 'Катальпа');
INSERT INTO trees.type (id, title) VALUES (7, 'Каштан');
INSERT INTO trees.type (id, title) VALUES (8, 'Горіх');
INSERT INTO trees.type (id, title) VALUES (9, 'Липа');
INSERT INTO trees.type (id, title) VALUES (10, 'Клен');
INSERT INTO trees.type (id, title) VALUES (11, 'Акація');
CREATE TABLE trees.user
(
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(70),
    email varchar(70),
    password varchar(70),
    is_admin tinyint(1) DEFAULT '0'
);
CREATE UNIQUE INDEX user_id_uindex ON trees.user (id);
CREATE UNIQUE INDEX user_email_uindex ON trees.user (email);
INSERT INTO trees.user (id, name, email, password, is_admin) VALUES (1, 'dsf', 'ddfsg', 'sdg', 0);
INSERT INTO trees.user (id, name, email, password, is_admin) VALUES (2, null, 'dss', 'dfsgdsg', 0);
INSERT INTO trees.user (id, name, email, password, is_admin) VALUES (3, null, 'dfgd', 'dfsgdsg', 0);
INSERT INTO trees.user (id, name, email, password, is_admin) VALUES (4, null, 'dfg', 'dfsgdsg', 1);
INSERT INTO trees.user (id, name, email, password, is_admin) VALUES (5, null, 'fdg', 'dfsgdsg', 0);
INSERT INTO trees.user (id, name, email, password, is_admin) VALUES (6, null, 'gh', 'dfsgdsg', 0);
INSERT INTO trees.user (id, name, email, password, is_admin) VALUES (7, null, 'sdfgfd', 'dfsgdsg', 0);