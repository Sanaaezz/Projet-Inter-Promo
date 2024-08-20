#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Animaux
#------------------------------------------------------------

CREATE TABLE Animaux(
        id_animaux Int  Auto_increment  NOT NULL ,
        type       Varchar (255) NOT NULL ,
        max        Int NOT NULL
	,CONSTRAINT Animaux_PK PRIMARY KEY (id_animaux)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Role
#------------------------------------------------------------

CREATE TABLE Role(
        id_role Int  Auto_increment  NOT NULL ,
        type    Varchar (255) NOT NULL
	,CONSTRAINT Role_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        id_user  Int  Auto_increment  NOT NULL ,
        nom      Varchar (255) NOT NULL ,
        prenom   Varchar (255) NOT NULL ,
        mail     Varchar (255) NOT NULL ,
        password Varchar (255) NOT NULL ,
        id_role  Int NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (id_user)

	,CONSTRAINT User_Role_FK FOREIGN KEY (id_role) REFERENCES Role(id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Resa
#------------------------------------------------------------

CREATE TABLE Resa(
        id_resa     Int  Auto_increment  NOT NULL ,
        dtm_debut   Datetime NOT NULL ,
        dtm_fin     Datetime NOT NULL ,
        commentaire Longtext NOT NULL ,
        id_user     Int NOT NULL
	,CONSTRAINT Resa_PK PRIMARY KEY (id_resa)

	,CONSTRAINT Resa_User_FK FOREIGN KEY (id_user) REFERENCES User(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Resa_details
#------------------------------------------------------------

CREATE TABLE Resa_details(
        id_resa_details Int  Auto_increment  NOT NULL ,
        quantite        Int NOT NULL ,
        id_resa         Int NOT NULL ,
        id_animaux      Int NOT NULL
	,CONSTRAINT Resa_details_PK PRIMARY KEY (id_resa_details)

	,CONSTRAINT Resa_details_Resa_FK FOREIGN KEY (id_resa) REFERENCES Resa(id_resa)
	,CONSTRAINT Resa_details_Animaux0_FK FOREIGN KEY (id_animaux) REFERENCES Animaux(id_animaux)
)ENGINE=InnoDB;