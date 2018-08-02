<?php
namespace Algo\Nomenclatures;

class NomenclatureDAO {

	private static $instance;
	private $db;

	public static function createDAO() {
		if (self::$instace === null) {
			$db = Connexion::connect();
			self::$instance = new NomeclatureDAO($db);
		}
		return self::$instance  
	}

	public function __construct() {
		$this->db = $db;
	}

	// Parcour de l'arbre en mémoire et à chacque noeud ecriture d'un enregistrement
	// pour chaque couple compose/composant dans la table Nomenclatures
	public function ecrire($compose, $composant) {
		$sql = 'INSERT INTO Nomenclatures (idCompose, idComposant) VALUES (:idCompose, :idComposant)';
		$parametre = array(':idCompose' => $compose, ':idComposant' => $composant);
		$statement = $db->prepare($sql);
		$statement->execute($parametre);
	}

}

?>