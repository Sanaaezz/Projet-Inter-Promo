#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: pet
#------------------------------------------------------------

CREATE TABLE pet(
        id_pet          Int  Auto_increment  NOT NULL ,
        type            Varchar (255) NOT NULL ,
        max             Int NOT NULL
	,CONSTRAINT pet_PK PRIMARY KEY (id_pet)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE pw_role(
        id_role         Int  Auto_increment  NOT NULL ,
        name            Varchar (255) NOT NULL
	,CONSTRAINT role_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE pw_user(
        id_user         Int  Auto_increment  NOT NULL ,
        lastname        Varchar (255) NOT NULL ,
        fistname        Varchar (255) NOT NULL ,
        mail            Varchar (255) NOT NULL ,
        password        Varchar (255) NOT NULL ,
        id_role         Int NOT NULL
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
        comment                 Longtext NOT NULL ,
        id_user                 Int NOT NULL
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
        id_pet                  Int NOT NULL
	,CONSTRAINT reservation_detail_PK PRIMARY KEY (id_reservation_detail)
	,CONSTRAINT reservation_detail_reservation_FK FOREIGN KEY (id_reservation) REFERENCES reservation(id_reservation)
	,CONSTRAINT reservation_detail_pet0_FK FOREIGN KEY (id_pet) REFERENCES pet(id_pet)
)ENGINE=InnoDB;

