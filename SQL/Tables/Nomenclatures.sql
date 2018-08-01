CREATE TABLE IF NOT EXISTS Nomenclatures (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	idCompose INT UNSIGNED NOT NULL,
	idComposant INT UNSIGNED NOT NULL,
	quantite DECIMAL(8,3),
	PRIMARY KEY(id),
	FOREIGN KEY(idCompose) REFERENCES Pieces(id), 
	FOREIGN KEY(idComposant) REFERENCES Pieces(id),
	UNIQUE (idCompose, idComposant) 
)
;

INSERT INTO Nomenclatures (idCompose, idComposant, quantite) VALUES
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(2, 5, 1),
(2, 6, 1),
(3, 7, 1),
(3, 8, 1),
(4, 9, 1),
(4, 10, 1)
;
