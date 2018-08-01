-- Selection de toutes le pieces qui ne sont pas des composes dans la table Nomenclatures
SELECT id as Numero, libelle
FROM Pieces
WHERE id NOT IN (
	SELECT DISTINCT(idCompose)
	FROM Nomenclatures 
	)
; 