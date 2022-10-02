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
    date DATE,
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
    CONSTRAINT ck_fMax CHECK (
        fMax > 0
        AND fMax < 226
    ),
    CONSTRAINT ck_fMoy CHECK (fMoy > 0),
    CONSTRAINT ck_heure CHECK (hFin > hDebut),
    CONSTRAINT ck_duree CHECK (duree > "00:00:00"),
    CONSTRAINT ck_distance CHECK (distance > 0),
    CONSTRAINT pk_Activite PRIMARY KEY(date, unUtilisateur)
);
CREATE TABLE Data (
    time TIME,
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
    ),
    CONSTRAINT pk_Data PRIMARY KEY(time, uneActivite)
);
INSERT INTO Utilisateur
VALUES (
        "BERTRAND",
        "Sophie",
        "2004-08-15",
        "F",
        158,
        61,
        "sophie_bertrand@zohomail.eu",
        "alphard"
    );
INSERT INTO Activite
VALUES (
        "2022-09-13",
        "walk",
        90,
        120,
        105,
        "07:15:00",
        "07:50:00",
        "00:35:00",
        5,
        "sophie_bertrand@zohomail.eu"
    );
INSERT INTO Data
VALUES ("07:15:00", 90, 60, 120, 12, "2022-09-13");
INSERT INTO Utilisateur
VALUES (
        "LE-POUPON",
        "Mattéo",
        "2003-02-21",
        "M",
        180,
        60,
        "lepoupon_matteo@gmail.com",
        "aenigmanta"
    );
INSERT INTO Activite
VALUES (
        "2022-09-15",
        "walk",
        90,
        120,
        105,
        "07:15:00",
        "07:50:00",
        "00:35:00",
        5,
        "lepoupon_matteo@gmail.com"
    );
INSERT INTO Data
VALUES ("07:10:00", 90, 60, 120, 12, "2022-09-13");