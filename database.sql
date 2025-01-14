DROP DATABASE IF EXISTS Youdemy;
CREATE DATABASE Youdemy;
USE Youdemy;

CREATE TABLE Utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('Etudiant', 'Enseignant', 'Administrateur') NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Cours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    contenu TEXT,
    enseignant_id INT NOT NULL,
    categorie VARCHAR(100),
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (enseignant_id) REFERENCES Utilisateur(id) ON DELETE CASCADE
);

CREATE TABLE Tag (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE Cours_Tag (
    cours_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (cours_id, tag_id),
    FOREIGN KEY (cours_id) REFERENCES Cours(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES Tag(id) ON DELETE CASCADE
);

CREATE TABLE InscriptionCours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    etudiant_id INT NOT NULL,
    cours_id INT NOT NULL,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (etudiant_id) REFERENCES Utilisateur(id) ON DELETE CASCADE,
    FOREIGN KEY (cours_id) REFERENCES Cours(id) ON DELETE CASCADE
);

CREATE TABLE Statistiques (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cours_id INT NOT NULL,
    nb_etudiants INT DEFAULT 0,
    date_mise_a_jour TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (cours_id) REFERENCES Cours(id) ON DELETE CASCADE
);

-- -- Données de test
-- INSERT INTO Utilisateur (nom, email, mot_de_passe, role)
-- VALUES
-- ('Admin', 'admin@youdemy.com', 'hashed_password', 'Administrateur'),
-- ('John Doe', 'johndoe@etudiant.com', 'hashed_password', 'Etudiant'),
-- ('Jane Smith', 'janesmith@enseignant.com', 'hashed_password', 'Enseignant');

-- INSERT INTO Tag (nom)
-- VALUES ('Développement Web'), ('Design'), ('Marketing'), ('Programmation'), ('Données');

-- INSERT INTO Cours (titre, description, contenu, enseignant_id, categorie)
-- VALUES
-- ('Apprendre PHP', 'Cours pour débutants en PHP', 'contenu_php', 3, 'Programmation'),
-- ('Introduction au HTML', 'Bases du HTML', 'contenu_html', 3, 'Développement Web');

-- INSERT INTO Cours_Tag (cours_id, tag_id)
-- VALUES
-- (1, 1), (1, 4), (2, 1);

-- INSERT INTO Inscription (etudiant_id, cours_id)
-- VALUES
-- (2, 1), (2, 2);

-- INSERT INTO Statistiques (cours_id, nb_etudiants)
-- VALUES
-- (1, 1), (2, 1);
