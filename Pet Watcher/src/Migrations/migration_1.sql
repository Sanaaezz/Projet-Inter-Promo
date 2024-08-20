#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: pet
#------------------------------------------------------------

CREATE TABLE pw_pet(
        id_pet          Int  Auto_increment  NOT NULL ,
        type            Varchar (255) NOT NULL ,
        max             Int NOT NULL
	,CONSTRAINT pw_pet_PK PRIMARY KEY (id_pet)
)ENGINE=InnoDB;

INSERT INTO pw_pet (type, max) VALUES ("dog", 10);
INSERT INTO pw_pet (type, max) VALUES ("cat", 10);
INSERT INTO pw_pet (type, max) VALUES ("rabbit", 10);

#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE pw_role(
        id_role         Int  Auto_increment  NOT NULL ,
        name            Varchar (255) NOT NULL
	,CONSTRAINT pw_role_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;

INSERT INTO pw_role (name) VALUES ("User");
INSERT INTO pw_role (name) VALUES ("Admin");


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE pw_user(
        id_user         Int  Auto_increment  NOT NULL ,
        lastname        Varchar (255) NOT NULL ,
        fistname        Varchar (255) NOT NULL ,
        mail            Varchar (255) NOT NULL ,
        password        Varchar (255) NOT NULL ,
        id_role         Int NOT NULL DEFAULT 1 ,
        activated       TinyInt(1) NOT NULL DEFAULT 0 ,
        dtm_created     Datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
	,CONSTRAINT user_PK PRIMARY KEY (id_user)
	,CONSTRAINT user_role_FK FOREIGN KEY (id_role) REFERENCES Role(id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reservation
#------------------------------------------------------------

CREATE TABLE pw_reservation(
        id_reservation          Int  Auto_increment  NOT NULL ,
        dtm_start               Datetime NOT NULL ,
        dtm_end                 Datetime NOT NULL ,
        comment                 Longtext ,
        id_user                 Int NOT NULL ,
        validated               TinyInt(1) NOT NULL DEFAULT 0 ,
        dtm_created             Datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
	,CONSTRAINT reservation_PK PRIMARY KEY (id_reservation)
	,CONSTRAINT reservation_user_FK FOREIGN KEY (id_user) REFERENCES User(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reservation_detail
#------------------------------------------------------------

CREATE TABLE pw_reservation_detail(
        id_reservation_detail   Int  Auto_increment  NOT NULL ,
        quantity                Int NOT NULL ,
        id_reservation          Int NOT NULL ,
        id_pet                  Int NOT NULL ,
        dtm_created             Datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
	,CONSTRAINT reservation_detail_PK PRIMARY KEY (id_reservation_detail)
	,CONSTRAINT reservation_detail_reservation_FK FOREIGN KEY (id_reservation) REFERENCES reservation(id_reservation)
	,CONSTRAINT reservation_detail_pet0_FK FOREIGN KEY (id_pet) REFERENCES pet(id_pet)
)ENGINE=InnoDB;

