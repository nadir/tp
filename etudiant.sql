CREATE TABLE etudiants
(
    Matricule         INT          NOT NULL,
    Nom               VARCHAR(255) NOT NULL,
    Prenom            varchar(255) NOT NULL,
    Date_de_naissance date         NOT NULL,
    Section           char(1)      NOT NULL,
    Groupe            int          NOT NULL,
    Note_Examen       int DEFAULT 0,
    Note_TD           int DEFAULT 0
)