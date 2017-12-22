DROP DATABASE IF EXISTS MLR1;

CREATE DATABASE IF NOT EXISTS MLR1;
USE MLR1;
# -----------------------------------------------------------------------------
#       TABLE : VIREMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VIREMENT
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
#       INDEX DE LA TABLE VIREMENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VIREMENT_PERSONNEL
     ON VIREMENT (IDPERSONNEL ASC);

CREATE  INDEX I_FK_VIREMENT_PERSONNEL1
     ON VIREMENT (IDPERSONNEL_AVOIR_VIREMENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : FORMATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FORMATION
 (
   IDFORMATION INTEGER(255) NOT NULL AUTO_INCREMENT ,
   IDPERSONNEL INTEGER(255) NOT NULL  ,
   LIBELLEFORMATION VARCHAR(255) NULL  
   , PRIMARY KEY (IDFORMATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE FORMATION
# -----------------------------------------------------------------------------


CREATE UNIQUE INDEX I_FK_FORMATION_PERSONNEL
     ON FORMATION (IDPERSONNEL ASC);

# -----------------------------------------------------------------------------
#       TABLE : CONTRAT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CONTRAT
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
#       INDEX DE LA TABLE CONTRAT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CONTRAT_PERSONNEL
     ON CONTRAT (IDPERSONNEL ASC);

# -----------------------------------------------------------------------------
#       TABLE : PERSONNEL
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PERSONNEL
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
#       TABLE : HORAIRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS HORAIRE
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
#       INDEX DE LA TABLE HORAIRE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_HORAIRE_COURS
     ON HORAIRE (IDCOURS ASC);

# -----------------------------------------------------------------------------
#       TABLE : DOCUMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DOCUMENT
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
#       INDEX DE LA TABLE DOCUMENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DOCUMENT_PERSONNEL
     ON DOCUMENT (IDPERSONNEL ASC);

CREATE  INDEX I_FK_DOCUMENT_COURS
     ON DOCUMENT (IDCOURS ASC);

CREATE  INDEX I_FK_DOCUMENT_PERSONNEL1
     ON DOCUMENT (IDPERSONNEL_AVOIR_DOC ASC);

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


CREATE  INDEX I_FK_COURS_PERSONNEL
     ON COURS (IDPERSONNEL ASC);

CREATE  INDEX I_FK_COURS_FORMATION
     ON COURS (IDFORMATION ASC);

CREATE  INDEX I_FK_COURS_PERSONNEL1
     ON COURS (IDPERSONNEL_VALIDE_COURS ASC);

# -----------------------------------------------------------------------------
#       TABLE : SUPERVISE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SUPERVISE
 (
   IDPERSONNEL INTEGER(255) NOT NULL  ,
   IDFORMATION INTEGER(255) NOT NULL  
   , PRIMARY KEY (IDPERSONNEL,IDFORMATION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE SUPERVISE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_SUPERVISE_PERSONNEL
     ON SUPERVISE (IDPERSONNEL ASC);

CREATE  INDEX I_FK_SUPERVISE_FORMATION
     ON SUPERVISE (IDFORMATION ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE VIREMENT 
  ADD FOREIGN KEY FK_VIREMENT_PERSONNEL (IDPERSONNEL)
      REFERENCES PERSONNEL (IDPERSONNEL) ;


ALTER TABLE VIREMENT 
  ADD FOREIGN KEY FK_VIREMENT_PERSONNEL1 (IDPERSONNEL_AVOIR_VIREMENT)
      REFERENCES PERSONNEL (IDPERSONNEL) ;


ALTER TABLE FORMATION 
  ADD FOREIGN KEY FK_FORMATION_PERSONNEL (IDPERSONNEL)
      REFERENCES PERSONNEL (IDPERSONNEL) ;


ALTER TABLE CONTRAT 
  ADD FOREIGN KEY FK_CONTRAT_PERSONNEL (IDPERSONNEL)
      REFERENCES PERSONNEL (IDPERSONNEL) ;


ALTER TABLE HORAIRE 
  ADD FOREIGN KEY FK_HORAIRE_COURS (IDCOURS)
      REFERENCES COURS (IDCOURS) ;


ALTER TABLE DOCUMENT 
  ADD FOREIGN KEY FK_DOCUMENT_PERSONNEL (IDPERSONNEL)
      REFERENCES PERSONNEL (IDPERSONNEL) ;


ALTER TABLE DOCUMENT 
  ADD FOREIGN KEY FK_DOCUMENT_COURS (IDCOURS)
      REFERENCES COURS (IDCOURS) ;


ALTER TABLE DOCUMENT 
  ADD FOREIGN KEY FK_DOCUMENT_PERSONNEL1 (IDPERSONNEL_AVOIR_DOC)
      REFERENCES PERSONNEL (IDPERSONNEL) ;


ALTER TABLE COURS 
  ADD FOREIGN KEY FK_COURS_PERSONNEL (IDPERSONNEL)
      REFERENCES PERSONNEL (IDPERSONNEL) ;


ALTER TABLE COURS 
  ADD FOREIGN KEY FK_COURS_FORMATION (IDFORMATION)
      REFERENCES FORMATION (IDFORMATION) ;


ALTER TABLE COURS 
  ADD FOREIGN KEY FK_COURS_PERSONNEL1 (IDPERSONNEL_VALIDE_COURS)
      REFERENCES PERSONNEL (IDPERSONNEL) ;


ALTER TABLE SUPERVISE 
  ADD FOREIGN KEY FK_SUPERVISE_PERSONNEL (IDPERSONNEL)
      REFERENCES PERSONNEL (IDPERSONNEL) ;


ALTER TABLE SUPERVISE 
  ADD FOREIGN KEY FK_SUPERVISE_FORMATION (IDFORMATION)
      REFERENCES FORMATION (IDFORMATION) ;

