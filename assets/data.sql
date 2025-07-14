
-- Insert 4 members
INSERT INTO membre (nom, date_de_naissance, genre, email, ville, mdp, image_profil) VALUES
('Jean Dupont', '1985-03-15', 'Homme', 'jean.dupont@email.com', 'Paris', 'password123', 'jean.jpg'),
('Marie Martin', '1990-07-22', 'Femme', 'marie.martin@email.com', 'Lyon', 'password456', 'marie.jpg'),
('Pierre Durand', '1982-11-05', 'Homme', 'pierre.durand@email.com', 'Marseille', 'password789', 'pierre.jpg'),
('Sophie Lambert', '1995-05-30', 'Femme', 'sophie.lambert@email.com', 'Toulouse', 'password012', 'sophie.jpg');

-- Insert 4 categories
INSERT INTO categorie_objet (nom_categorie) VALUES
('esthétique'),
('bricolage'),
('mécanique'),
('cuisine');

-- Insert 10 objects per member (40 total), distributed across categories
-- Member 1 objects (Jean Dupont)
INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
('Perceuse électrique', 2, 1),
('Scie circulaire', 2, 1),
('Marteau', 2, 1),
('Tournevis set', 2, 1),
('Pinceau set', 1, 1),
('Peinture acrylique', 1, 1),
('Casserole inox', 4, 1),
('Mixeur', 4, 1),
('Clé à molette', 3, 1),
('Jack de voiture', 3, 1);

-- Member 2 objects (Marie Martin)
INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
('Pince à épiler', 1, 2),
('Crème hydratante', 1, 2),
('Ponceuse', 2, 2),
('Niveau à bulle', 2, 2),
('Clé à pipe', 3, 2),
('Cric', 3, 2),
('Poêle antiadhésive', 4, 2),
('Robot culinaire', 4, 2),
('Pince coupante', 2, 2),
('Pistolet à colle', 2, 2);

-- Member 3 objects (Pierre Durand)
INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
('Plaque à induction', 4, 3),
('Couteau de chef', 4, 3),
('Trousse de maquillage', 1, 3),
('Séchoir à cheveux', 1, 3),
('Scie sauteuse', 2, 3),
('Visseuse', 2, 3),
('Valise à outils', 3, 3),
('Compresseur', 3, 3),
('Rouleau à peinture', 2, 3),
('Pinceau à colle', 2, 3);

-- Member 4 objects (Sophie Lambert)
INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
('Miroir de maquillage', 1, 4),
('Palette de fards', 1, 4),
('Machine à coudre', 2, 4),
('Fer à souder', 2, 4),
('Boîte à outils', 3, 4),
('Tondeuse à gazon', 3, 4),
('Grille-pain', 4, 4),
('Blender', 4, 4),
('Pinceau set professionnel', 1, 4),
('Fers à lisser', 1, 4);

-- Insert images for some objects (10 images total)
INSERT INTO images_objet (id_objet, nom_image) VALUES
(1, 'perceuse.jpg'),
(2, 'scie_circulaire.jpg'),
(5, 'pinceaux.jpg'),
(7, 'casserole.jpg'),
(12, 'ponceuse.jpg'),
(15, 'cle_pipe.jpg'),
(20, 'poele.jpg'),
(25, 'plaque_induction.jpg'),
(30, 'tondeuse.jpg'),
(35, 'grille_pain.jpg');

-- Insert 10 borrowings
INSERT INTO emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2023-01-15', '2023-01-20'),
(5, 3, '2023-02-10', '2023-02-15'),
(7, 4, '2023-03-05', '2023-03-10'),
(12, 1, '2023-04-12', '2023-04-18'),
(15, 4, '2023-05-20', '2023-05-25'),
(20, 3, '2023-06-08', '2023-06-15'),
(25, 2, '2023-07-01', '2023-07-08'),
(30, 1, '2023-08-14', '2023-08-21'),
(35, 2, '2023-09-09', '2023-09-16'),
(3, 4, '2023-10-22', '2023-10-29');