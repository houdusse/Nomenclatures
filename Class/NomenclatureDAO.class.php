<?php
namespace Algo\Nomenclatures;
// use Algo\NomenclatureDAO;
class NomenclatureDAO {
// test
	private static $instance;
	private $db;

	public static function createDAO() {
		if (self::$instance === null) {
			$db = Connexion::connect();
			self::$instance = new NomenclatureDAO($db);
		}
		return self::$instance;  
	}

	public function __construct($db) {
		$this->db = $db;
	}

	// Parcour de l'arbre en mémoire et à chacque noeud ecriture d'un enregistrement
	// pour chaque couple compose/composant dans la table Nomenclatures
	public function ecrire($compose, $composant) {
		$sql = 'INSERT INTO Nomenclatures (idCompose, idComposant) VALUES (:idCompose, :idComposant)';
		$parametre = array(':idCompose' => $compose, ':idComposant' => $composant);
		$statement = $this->db->prepare($sql);
		$statement->execute($parametre);
	}

}

?>