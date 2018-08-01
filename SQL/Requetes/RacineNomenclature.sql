-- Select la racine de la nomenclature c a d la pièce qui n'est jamais un composant
SELECT id, libelle 
FROM Pieces
WHERE id NOT IN (
	SELECT DISTINCT(idComposant)
	FROM Nomenclatures
	)
;