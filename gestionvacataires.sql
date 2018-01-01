DROP DATABASE IF EXISTS MLR1;

CREATE DATABASE IF NOT EXISTS MLR1;
USE MLR1;
# -----------------------------------------------------------------------------
#       TABLE : FORMATIONS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FORMATIONS
 (
   ID INTEGER(255) NOT NULL AUTO_INCREMENT ,
   ID_DIRIGE INTEGER(255) NOT NULL  ,
   ID_SUPERVISE INTEGER(255) NOT NULL  ,
   LIBELLEFORMATION VARCHAR(255) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE FORMATIONS
# -----------------------------------------------------------------------------


CREATE UNIQUE INDEX I_FK_FORMATIONS_PERSONNELS
     ON FORMATIONS (ID_DIRIGE ASC);

CREATE  INDEX I_FK_FORMATIONS_PERSONNELS1
     ON FORMATIONS (ID_SUPERVISE ASC);

# -----------------------------------------------------------------------------
#       TABLE : HORAIRES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS HORAIRES
 (
   ID INTEGER(255) NOT NULL AUTO_INCREMENT ,
   ID_PLANIFIE INTEGER(255) NOT NULL  ,
   DATEHORAIRE DATETIME NULL  ,
   DUREE REAL(255,2) NULL  ,
   SALLE VARCHAR(255) NULL  ,
   ETATHORAIRE BOOL NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE HORAIRES
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_HORAIRES_COURS
     ON HORAIRES (ID_PLANIFIE ASC);

# -----------------------------------------------------------------------------
#       TABLE : PERSONNELS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PERSONNELS
 (
   ID INTEGER(255) NOT NULL AUTO_INCREMENT ,
   NOM VARCHAR(255) NULL  ,
   PRENOM VARCHAR(255) NULL  ,
   EMAIL VARCHAR(255) NULL  ,
   MDP VARCHAR(255) NULL  ,
   TEL INTEGER(50) NULL  ,
   ROLE INTEGER(20) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : VIREMENTS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VIREMENTS
 (
   ID INTEGER(2) NOT NULL  ,
   ID_VALIDE_VIREMENT INTEGER(255) NOT NULL  ,
   ID_AVOIR_VIREMENT INTEGER(255) NOT NULL  ,
   ETATVIREMENT BOOL NULL  ,
   MONTANT REAL(255,2) NULL  ,
   DATEVIREMENT DATETIME NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE VIREMENTS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VIREMENTS_PERSONNELS
     ON VIREMENTS (ID_VALIDE_VIREMENT ASC);

CREATE  INDEX I_FK_VIREMENTS_PERSONNELS1
     ON VIREMENTS (ID_AVOIR_VIREMENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : CONTRAT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONTRAT
 (
   ID INTEGER(255) NOT NULL AUTO_INCREMENT ,
   ID_SIGNE INTEGER(255) NOT NULL  ,
   PRIXTD INTEGER(255) NULL  ,
   PRIXCM INTEGER(255) NULL  ,
   PRIXTP INTEGER(255) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CONTRAT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CONTRAT_PERSONNELS
     ON CONTRAT (ID_SIGNE ASC);

# -----------------------------------------------------------------------------
#       TABLE : DOCUMENTS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DOCUMENTS
 (
   ID INTEGER(255) NOT NULL AUTO_INCREMENT ,
   ID_VALIDE_DOC INTEGER(255) NOT NULL  ,
   ID_DOC_COURS INTEGER(255) NOT NULL  ,
   ID_AVOIR_DOC INTEGER(255) NOT NULL  ,
   LIBELLEDOCUMENT VARCHAR(255) NULL  ,
   URL VARCHAR(255) NULL  ,
   ETATDOCUMENT BOOL NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DOCUMENTS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DOCUMENTS_PERSONNELS
     ON DOCUMENTS (ID_VALIDE_DOC ASC);

CREATE  INDEX I_FK_DOCUMENTS_COURS
     ON DOCUMENTS (ID_DOC_COURS ASC);

CREATE  INDEX I_FK_DOCUMENTS_PERSONNELS1
     ON DOCUMENTS (ID_AVOIR_DOC ASC);

# -----------------------------------------------------------------------------
#       TABLE : COURS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COURS
 (
   ID INTEGER(255) NOT NULL AUTO_INCREMENT ,
   ID_ENSEIGNE INTEGER(255) NOT NULL  ,
   ID_APPARTIENT INTEGER(255) NOT NULL  ,
   ID_VALIDE_COURS INTEGER(255) NOT NULL  ,
   LIBELLE VARCHAR(255) NULL  ,
   TYPE VARCHAR(255) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COURS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COURS_PERSONNELS
     ON COURS (ID_ENSEIGNE ASC);

CREATE  INDEX I_FK_COURS_FORMATIONS
     ON COURS (ID_APPARTIENT ASC);

CREATE  INDEX I_FK_COURS_PERSONNELS1
     ON COURS (ID_VALIDE_COURS ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE FORMATIONS 
  ADD FOREIGN KEY FK_FORMATIONS_PERSONNELS (ID_DIRIGE)
      REFERENCES PERSONNELS (ID) ;


ALTER TABLE FORMATIONS 
  ADD FOREIGN KEY FK_FORMATIONS_PERSONNELS1 (ID_SUPERVISE)
      REFERENCES PERSONNELS (ID) ;


ALTER TABLE HORAIRES 
  ADD FOREIGN KEY FK_HORAIRES_COURS (ID_PLANIFIE)
      REFERENCES COURS (ID) ;


ALTER TABLE VIREMENTS 
  ADD FOREIGN KEY FK_VIREMENTS_PERSONNELS (ID_VALIDE_VIREMENT)
      REFERENCES PERSONNELS (ID) ;


ALTER TABLE VIREMENTS 
  ADD FOREIGN KEY FK_VIREMENTS_PERSONNELS1 (ID_AVOIR_VIREMENT)
      REFERENCES PERSONNELS (ID) ;


ALTER TABLE CONTRAT 
  ADD FOREIGN KEY FK_CONTRAT_PERSONNELS (ID_SIGNE)
      REFERENCES PERSONNELS (ID) ;


ALTER TABLE DOCUMENTS 
  ADD FOREIGN KEY FK_DOCUMENTS_PERSONNELS (ID_VALIDE_DOC)
      REFERENCES PERSONNELS (ID) ;


ALTER TABLE DOCUMENTS 
  ADD FOREIGN KEY FK_DOCUMENTS_COURS (ID_DOC_COURS)
      REFERENCES COURS (ID) ;


ALTER TABLE DOCUMENTS 
  ADD FOREIGN KEY FK_DOCUMENTS_PERSONNELS1 (ID_AVOIR_DOC)
      REFERENCES PERSONNELS (ID) ;


ALTER TABLE COURS 
  ADD FOREIGN KEY FK_COURS_PERSONNELS (ID_ENSEIGNE)
      REFERENCES PERSONNELS (ID) ;


ALTER TABLE COURS 
  ADD FOREIGN KEY FK_COURS_FORMATIONS (ID_APPARTIENT)
      REFERENCES FORMATIONS (ID) ;


ALTER TABLE COURS 
  ADD FOREIGN KEY FK_COURS_PERSONNELS1 (ID_VALIDE_COURS)
      REFERENCES PERSONNELS (ID) ;

