DROP TABLE IF EXISTS Data;
DROP TABLE IF EXISTS Activite;
DROP TABLE IF EXISTS Utilisateur;
CREATE TABLE Utilisateur (
    nom VARCHAR(50),
    prenom VARCHAR(50),
    dateDeNaissance DATE,
    sexe VARCHAR(1),
    taille INTEGER,
    poids INTEGER,
    email VARCHAR(100) PRIMARY KEY,
    mdp VARCHAR(50),
    CONSTRAINT ck_sexe CHECK (
        sexe = "M"
        OR sexe = "F"
    ),
    CONSTRAINT ck_taille CHECK (taille > 0),
    CONSTRAINT ck_poids CHECK (poids > 0)
);
CREATE TABLE Activite (
    date DATE PRIMARY KEY,
    description VARCHAR(100),
    fMin INTEGER,
    fMax INTEGER,
    fMoy INTEGER,
    hDebut TIME,
    hFin TIME,
    duree TIME,
    distance DOUBLE PRECISION,
    unUtilisateur VARCHAR(100),
    CONSTRAINT fk_unUtilisateur FOREIGN KEY (unUtilisateur) REFERENCES Utilisateur(email) ON DELETE CASCADE,
    CONSTRAINT ck_fMin CHECK (fMin > 0),
    CONSTRAINT ck_fMax CHECK (fMax > 0),
    CONSTRAINT ck_fMoy CHECK (fMoy > 0),
    CONSTRAINT ck_heure CHECK (hFin > hDebut),
    CONSTRAINT ck_duree CHECK (duree > "00:00:00"),
    CONSTRAINT ck_distance CHECK (distance > 0)
);
CREATE TABLE Data (
    time TIME PRIMARY KEY,
    freqCardiaque INTEGER,
    latitude DOUBLE PRECISION,
    longitude DOUBLE PRECISION,
    altitude DOUBLE PRECISION,
    uneActivite DATE,
    CONSTRAINT fk_uneActivite FOREIGN KEY (uneActivite) REFERENCES Activite(date) ON DELETE CASCADE,
    CONSTRAINT ck_freqCardiaque CHECK (freqCardiaque > 0),
    CONSTRAINT ck_latitude CHECK (
        latitude > -90
        AND latitude < 90
    ),
    CONSTRAINT ck_longitude CHECK (
        longitude > -180
        AND latitude < 180
    )
);