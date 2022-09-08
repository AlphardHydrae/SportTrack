CREATE TABLE Utilisateur (
    nom VARCHAR(50),
    prenom VARCHAR(50),
    dateDeNaissance DATE,
    sexe VARCHAR(1),
    taille INTEGER,
    poids INTEGER,
    email VARCHAR(100) PRIMARY KEY,
    mdp VARCHAR(50)
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
    CONSTRAINT fk_unUtilisateur FOREIGN KEY (unUtilisateur) REFERENCES Utilisateur(email) ON DELETE CASCADE
);
CREATE TABLE Data (
    time TIME PRIMARY KEY,
    freqCardiaque INTEGER,
    latitude DOUBLE PRECISION,
    longitude DOUBLE PRECISION,
    altitude DOUBLE PRECISION,
    uneActivite DATE,
    CONSTRAINT fk_uneActivite FOREIGN KEY (uneActivite) REFERENCES Activite(date) ON DELETE CASCADE,
    CONSTRAINT ck_freqCardiaque CHECK (freqCardiaque > 0)
);