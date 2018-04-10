#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        idUtil         int (11) Auto_increment  NOT NULL ,
        nomUtil        Varchar (25) ,
        prenomUtil     Varchar (25) ,
        roleUtil       Int ,
        btsPrepareUtil Varchar (25) ,
        loginUtil      Varchar (25) ,
        mdpUtil        Varchar (25) ,
        mailUtil       Varchar (90) ,
        telUtil        Varchar (15) ,
        idForm         Int ,
        PRIMARY KEY (idUtil )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: offre
#------------------------------------------------------------

CREATE TABLE offre(
        idOffre           int (11) Auto_increment  NOT NULL ,
        libelleOffre      Varchar (25) ,
        typeOffre         Varchar (25) ,
        dureeOffre        Int ,
        secteurOffre      Varchar (25) ,
        typeBtsOffre      Varchar (25) ,
        remunerationOffre Double ,
        dateDeOffre       Date ,
        dateFinOffre      Date ,
        idUtil            Int ,
        PRIMARY KEY (idOffre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: formation
#------------------------------------------------------------

CREATE TABLE formation(
        idForm         int (11) Auto_increment  NOT NULL ,
        libelleForm    Varchar (25) ,
        niveauForm     Varchar (25) ,
        alternanceForm Bool ,
        idEcole        Int ,
        PRIMARY KEY (idForm )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ecole
#------------------------------------------------------------

CREATE TABLE ecole(
        idEcole    int (11) Auto_increment  NOT NULL ,
        nomEcole   Varchar (25) ,
        adrEcole   Varchar (25) ,
        villeEcole Varchar (25) ,
        cpEcole    Varchar (25) ,
        telEcole   Int ,
        nomContact Varchar (20) ,
        PRIMARY KEY (idEcole )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: postuler
#------------------------------------------------------------

CREATE TABLE postuler(
        idOffre Int NOT NULL ,
        idUtil  Int NOT NULL ,
        PRIMARY KEY (idOffre ,idUtil )
)ENGINE=InnoDB;

ALTER TABLE utilisateur ADD CONSTRAINT FK_utilisateur_idForm FOREIGN KEY (idForm) REFERENCES formation(idForm);
ALTER TABLE offre ADD CONSTRAINT FK_offre_idUtil FOREIGN KEY (idUtil) REFERENCES utilisateur(idUtil);
ALTER TABLE formation ADD CONSTRAINT FK_formation_idEcole FOREIGN KEY (idEcole) REFERENCES ecole(idEcole);
ALTER TABLE postuler ADD CONSTRAINT FK_postuler_idOffre FOREIGN KEY (idOffre) REFERENCES offre(idOffre);
ALTER TABLE postuler ADD CONSTRAINT FK_postuler_idUtil FOREIGN KEY (idUtil) REFERENCES utilisateur(idUtil);
