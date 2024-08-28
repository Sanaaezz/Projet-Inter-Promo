#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: pet
#------------------------------------------------------------

CREATE TABLE pw_pet(
    id_pet          Int  Auto_increment  NOT NULL ,
    type            Varchar(255) NOT NULL ,
    max             Int NOT NULL,
    CONSTRAINT pw_pet_PK PRIMARY KEY (id_pet)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE pw_role(
    id_role         Int  Auto_increment  NOT NULL ,
    name            Varchar(255) NOT NULL,
    CONSTRAINT pw_role_PK PRIMARY KEY (id_role)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

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

#------------------------------------------------------------
# Table: reservation
#------------------------------------------------------------

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

#------------------------------------------------------------
# Table: reservation_detail
#------------------------------------------------------------

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

#------------------------------------------------------------
# Insertion des données initiales
#------------------------------------------------------------

INSERT INTO pw_pet (type, max) VALUES ('dog', 10);
INSERT INTO pw_pet (type, max) VALUES ('cat', 10);
INSERT INTO pw_pet (type, max) VALUES ('rabbit', 10);

INSERT INTO pw_role (name) VALUES ('User');
INSERT INTO pw_role (name) VALUES ('Admin');
