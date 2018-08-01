CREATE TABLE IF NOT EXISTS  Pieces (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	libelle VARCHAR(50) NOT NULL,
	UNIQUE(libelle),
	PRIMARY KEY(id)
);

INSERT INTO Pieces (libelle) VALUES
('Piece1'),
('Piece2'),
('Piece3'),
('Piece4'),
('Piece5'),
('Piece6'),
('Piece7'),
('Piece8'),
('Piece9'),
('Piece10')
;