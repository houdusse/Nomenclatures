<?php
namespace Algo\Nomenclatures;

class Pile {

	private $sommet; // Cellule représentant le sommet de la pile

	public function __construct( ) {
		$this->sommet = null;
	}


	public function empiler($valeur) {
		if ($this->isVide() == true) {
			$suivant = null;
		} else {
			$suivant = $this->sommet;
		}
		$this->sommet = new Cellule($valeur, $suivant);
	}


	public function depiler() {
		// Sauvegarde de la valeur de la cellule du sommet
		$ancienSommet = $this->sommet;	
		// La cellule suivante devient le nouveau sommet
		$this->sommet = $ancienSommet->getCelluleSuivante();
		$valeur =  $ancienSommet->getValeur();
		unset($ancienSommet); // POur gagner de l'espace mémoire
		return $valeur;
	}

	public function isVide() {
		return ($this->sommet === null);
	}






}



?>