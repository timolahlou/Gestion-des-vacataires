DROP DATABASE IF EXISTS gestionvacataire;

CREATE DATABASE IF NOT EXISTS gestionvacataire;
USE gestionvacataire;
# -----------------------------------------------------------------------------
#       TABLE : FORMATIONS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FORMATIONS
 (
   IDFORMATION INTEGER(255) NOT NULL AUTO_INCREMENT ,
   IDPERSONNEL INTEGER(255) NOT NULL  ,
   IDPERSONNEL_SUPERVISE INTEGER(255) NOT NULL  ,
   LIBELLEFORMATION VARCHAR(255) NULL  
   , PRIMARY KEY (IDFORMATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE FORMATIONS
# -----------------------------------------------------------------------------


CREATE UNIQUE INDEX I_FK_FORMATIONS_PERSONNELS
     ON FORMATIONS (IDPERSONNEL ASC);

CREATE  INDEX I_FK_FORMATIONS_PERSONNELS1
     ON FORMATIONS (IDPERSONNEL_SUPERVISE ASC);

# -----------------------------------------------------------------------------
#       TABLE : HORAIRES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS HORAIRES
 (
   IDHORAIRE INTEGER(255) NOT NULL AUTO_INCREMENT ,
   IDCOURS INTEGER(255) NOT NULL  ,
   DATEHORAIRE DATETIME NULL  ,
   DUREE REAL(255,2) NULL  ,
   SALLE VARCHAR(255) NULL  
   , PRIMARY KEY (IDHORAIRE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE HORAIRES
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_HORAIRES_COURS
     ON HORAIRES (IDCOURS ASC);

# -----------------------------------------------------------------------------
#       TABLE : PERSONNELS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PERSONNELS
 (
   IDPERSONNEL INTEGER(255) NOT NULL AUTO_INCREMENT ,
   NOM VARCHAR(255) NULL  ,
   PRENOM VARCHAR(255) NULL  ,
   EMAIL VARCHAR(255) NULL  ,
   MDP VARCHAR(255) NULL  ,
   TEL INTEGER(50) NULL  ,
   ROLE INTEGER(20) NULL  
   , PRIMARY KEY (IDPERSONNEL) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : VIREMENTS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VIREMENTS
 (
   IDVIREMENT INTEGER(2) NOT NULL  ,
   IDPERSONNEL INTEGER(255) NOT NULL  ,
   IDPERSONNEL_AVOIR_VIREMENT INTEGER(255) NOT NULL  ,
   ETATVIREMENT BOOL NULL  ,
   MONTANT REAL(255,2) NULL  ,
   DATEVIREMENT DATETIME NULL  
   , PRIMARY KEY (IDVIREMENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE VIREMENTS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VIREMENTS_PERSONNELS
     ON VIREMENTS (IDPERSONNEL ASC);

CREATE  INDEX I_FK_VIREMENTS_PERSONNELS1
     ON VIREMENTS (IDPERSONNEL_AVOIR_VIREMENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : CONTRATS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONTRATS
 (
   IDCONTRAT INTEGER(255) NOT NULL AUTO_INCREMENT ,
   IDPERSONNEL INTEGER(255) NOT NULL  ,
   PRIXTD INTEGER(255) NULL  ,
   PRIXCM INTEGER(255) NULL  ,
   PRIXTP INTEGER(255) NULL  
   , PRIMARY KEY (IDCONTRAT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CONTRATS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CONTRATS_PERSONNELS
     ON CONTRATS (IDPERSONNEL ASC);

# -----------------------------------------------------------------------------
#       TABLE : DOCUMENTS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DOCUMENTS
 (
   IDDOCUMENT INTEGER(255) NOT NULL AUTO_INCREMENT ,
   IDPERSONNEL INTEGER(255) NOT NULL  ,
   IDCOURS INTEGER(255) NOT NULL  ,
   IDPERSONNEL_AVOIR_DOC INTEGER(255) NOT NULL  ,
   LIBELLEDOCUMENT VARCHAR(255) NULL  ,
   URL VARCHAR(255) NULL  ,
   ETATDOCUMENT BOOL NULL  
   , PRIMARY KEY (IDDOCUMENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DOCUMENTS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DOCUMENTS_PERSONNELS
     ON DOCUMENTS (IDPERSONNEL ASC);

CREATE  INDEX I_FK_DOCUMENTS_COURS
     ON DOCUMENTS (IDCOURS ASC);

CREATE  INDEX I_FK_DOCUMENTS_PERSONNELS1
     ON DOCUMENTS (IDPERSONNEL_AVOIR_DOC ASC);

# -----------------------------------------------------------------------------
#       TABLE : COURS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COURS
 (
   IDCOURS INTEGER(255) NOT NULL AUTO_INCREMENT ,
   IDPERSONNEL INTEGER(255) NOT NULL  ,
   IDFORMATION INTEGER(255) NOT NULL  ,
   IDPERSONNEL_VALIDE_COURS INTEGER(255) NOT NULL  ,
   LIBELLE VARCHAR(255) NULL  ,
   TYPE VARCHAR(255) NULL  ,
   ETATCOURS BOOL NULL  
   , PRIMARY KEY (IDCOURS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COURS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COURS_PERSONNELS
     ON COURS (IDPERSONNEL ASC);

CREATE  INDEX I_FK_COURS_FORMATIONS
     ON COURS (IDFORMATION ASC);

CREATE  INDEX I_FK_COURS_PERSONNELS1
     ON COURS (IDPERSONNEL_VALIDE_COURS ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE FORMATIONS 
  ADD FOREIGN KEY FK_FORMATIONS_PERSONNELS (IDPERSONNEL)
      REFERENCES PERSONNELS (IDPERSONNEL) ;


ALTER TABLE FORMATIONS 
  ADD FOREIGN KEY FK_FORMATIONS_PERSONNELS1 (IDPERSONNEL_SUPERVISE)
      REFERENCES PERSONNELS (IDPERSONNEL) ;


ALTER TABLE HORAIRES 
  ADD FOREIGN KEY FK_HORAIRES_COURS (IDCOURS)
      REFERENCES COURS (IDCOURS) ;


ALTER TABLE VIREMENTS 
  ADD FOREIGN KEY FK_VIREMENTS_PERSONNELS (IDPERSONNEL)
      REFERENCES PERSONNELS (IDPERSONNEL) ;


ALTER TABLE VIREMENTS 
  ADD FOREIGN KEY FK_VIREMENTS_PERSONNELS1 (IDPERSONNEL_AVOIR_VIREMENT)
      REFERENCES PERSONNELS (IDPERSONNEL) ;


ALTER TABLE CONTRATS 
  ADD FOREIGN KEY FK_CONTRATS_PERSONNELS (IDPERSONNEL)
      REFERENCES PERSONNELS (IDPERSONNEL) ;


ALTER TABLE DOCUMENTS 
  ADD FOREIGN KEY FK_DOCUMENTS_PERSONNELS (IDPERSONNEL)
      REFERENCES PERSONNELS (IDPERSONNEL) ;


ALTER TABLE DOCUMENTS 
  ADD FOREIGN KEY FK_DOCUMENTS_COURS (IDCOURS)
      REFERENCES COURS (IDCOURS) ;


ALTER TABLE DOCUMENTS 
  ADD FOREIGN KEY FK_DOCUMENTS_PERSONNELS1 (IDPERSONNEL_AVOIR_DOC)
      REFERENCES PERSONNELS (IDPERSONNEL) ;


ALTER TABLE COURS 
  ADD FOREIGN KEY FK_COURS_PERSONNELS (IDPERSONNEL)
      REFERENCES PERSONNELS (IDPERSONNEL) ;


ALTER TABLE COURS 
  ADD FOREIGN KEY FK_COURS_FORMATIONS (IDFORMATION)
      REFERENCES FORMATIONS (IDFORMATION) ;


ALTER TABLE COURS 
  ADD FOREIGN KEY FK_COURS_PERSONNELS1 (IDPERSONNEL_VALIDE_COURS)
      REFERENCES PERSONNELS (IDPERSONNEL) ;

