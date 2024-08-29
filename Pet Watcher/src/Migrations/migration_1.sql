CREATE TABLE pw_pet(
    id_pet          Int  Auto_increment  NOT NULL ,
    type            Varchar(255) NOT NULL ,
    max             Int NOT NULL,
    CONSTRAINT pw_pet_PK PRIMARY KEY (id_pet)
) ENGINE=InnoDB;


CREATE TABLE pw_role(
    id_role         Int  Auto_increment  NOT NULL ,
    name            Varchar(255) NOT NULL,
    CONSTRAINT pw_role_PK PRIMARY KEY (id_role)
) ENGINE=InnoDB;


CREATE TABLE pw_user(
    id_user         Int  Auto_increment  NOT NULL ,
    lastname        Varchar(255) NOT NULL ,
    firstname       Varchar(255) NOT NULL ,
    mail            Varchar(255) NOT NULL ,
    password        Varchar(255) NOT NULL ,
    id_role         Int NOT NULL DEFAULT 1 ,
    activated       TinyInt(1) NOT NULL DEFAULT 0 ,
    dtm_created     Datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pw_user_PK PRIMARY KEY (id_user),
    CONSTRAINT pw_user_role_FK FOREIGN KEY (id_role) REFERENCES pw_role(id_role)
) ENGINE=InnoDB;


CREATE TABLE pw_reservation(
    id_reservation          Int  Auto_increment  NOT NULL ,
    dtm_start               Datetime NOT NULL ,
    dtm_end                 Datetime NOT NULL ,
    comment                 Longtext DEFAULT '',
    id_user                 Int NOT NULL ,
    validated               TinyInt(1) NOT NULL DEFAULT 0 ,
    dtm_created             Datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pw_reservation_PK PRIMARY KEY (id_reservation),
    CONSTRAINT pw_reservation_user_FK FOREIGN KEY (id_user) REFERENCES pw_user(id_user)
) ENGINE=InnoDB;


CREATE TABLE pw_reservation_detail(
    id_reservation_detail   Int  Auto_increment  NOT NULL ,
    quantity                Int NOT NULL ,
    id_reservation          Int NOT NULL ,
    id_pet                  Int NOT NULL ,
    dtm_created             Datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pw_reservation_detail_PK PRIMARY KEY (id_reservation_detail),
    CONSTRAINT pw_reservation_detail_reservation_FK FOREIGN KEY (id_reservation) REFERENCES pw_reservation(id_reservation),
    CONSTRAINT pw_reservation_detail_pet_FK FOREIGN KEY (id_pet) REFERENCES pw_pet(id_pet)
) ENGINE=InnoDB;


INSERT INTO pw_pet (type, max) VALUES ('dog', 10);
INSERT INTO pw_pet (type, max) VALUES ('cat', 10);
INSERT INTO pw_pet (type, max) VALUES ('rabbit', 10);

INSERT INTO pw_role (name) VALUES ('User');
INSERT INTO pw_role (name) VALUES ('Admin');

INSERT INTO `pw_user` (`id_user`, `lastname`, `firstname`, `mail`, `password`, `id_role`, `activated`, `dtm_created`) VALUES
(1, 'TEST', 'User', 'user@test.fr', '$2y$10$zLz.eVvidYP4YlfAYt.G7.Sm1W5CpE.hepDO3.GTwCJO01zsCCqBa', 2, 0, '2024-08-28 10:53:21'),
(2, 'bob', 'bob', 'bob@bob.mer', '$2y$10$zLz.eVvidYP4YlfAYt.G7.Sm1W5CpE.hepDO3.GTwCJO01zsCCqBa', 1, 0, '2024-08-28 11:35:02'),
(3, 'Patrik', 'Bob', 'patrik@bob.mer', '$2y$10$cttSMyaIO0fpZJi684XMi./gqLBHCsFYWIwTUzpiQEapCknKo0lcW', 1, 0, '2024-08-28 16:51:18');

INSERT INTO `pw_reservation` (`id_reservation`, `dtm_start`, `dtm_end`, `comment`, `id_user`, `validated`, `dtm_created`) VALUES
(1, '2024-08-29 10:53:30', '2024-08-31 10:53:30', NULL, 1, 0, '2024-08-28 10:54:14'),
(2, '2024-09-02 10:53:30', '2024-09-09 10:53:30', NULL, 1, 1, '2024-08-28 10:54:14'),
(3, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:19:07'),
(4, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:22:03'),
(5, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:25:00'),
(6, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:25:05'),
(7, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:26:29'),
(8, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:27:45'),
(9, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:37:08'),
(10, '2024-08-28 00:00:00', '2024-09-05 00:00:00', '', 2, 0, '2024-08-28 15:39:11'),
(11, '2024-08-29 00:00:00', '2024-08-30 00:00:00', '', 1, 0, '2024-08-28 16:05:30'),
(12, '2024-08-29 00:00:00', '2024-08-30 00:00:00', '', 1, 0, '2024-08-28 16:06:28'),
(13, '2024-08-29 00:00:00', '2024-08-30 00:00:00', '', 1, 0, '2024-08-28 16:07:11'),
(14, '2024-08-25 00:00:00', '2024-09-25 00:00:00', '', 3, 0, '2024-08-28 16:53:24');


INSERT INTO `pw_reservation_detail` (`id_reservation_detail`, `quantity`, `id_reservation`, `id_pet`, `dtm_created`) VALUES
(1, 3, 1, 1, '2024-08-28 10:56:01'),
(2, 5, 1, 2, '2024-08-28 10:56:01'),
(3, 1, 2, 2, '2024-08-28 10:56:01'),
(4, 2, 2, 1, '2024-08-28 10:56:01'),
(5, 5, 2, 3, '2024-08-28 10:56:01');