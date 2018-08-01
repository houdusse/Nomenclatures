<?php
namespace Algo\Nomenclatures;
// use Algo\StructureDonnees\StructureReflexive\Pile

 class NoeudNomenclature {

 	// Liste des méthoes de la classe
 	// NoeudNomenclature::__construct($valeur array $listeLiensEnfants)
 	// NoeudNomenclature::
 
	private $valeur;
	private $pileEnfants; // Pile ou est stockée les enfants du noeud courant

	public function __construct($valeur, array $listeEnfants = null) {
		if ($listeEnfants !== null) {
			$this->pileEnfants = new Pile();  
			foreach ($listeEnfants as  $noeudEnfant) {
				$this->pileEnfants->empiler($noeudEnfant);
			}
		}
		$this->valeur = $valeur;
	}


	public function getValeur() {
		return $this->valeur;
	}


	public function setValeur($valeur) {
		$this->valeur = $valeur;
	}

	public function isFeuille() {
		return ($this->pileEnfants === null);
	}

	public  function parcourPrefixe(NoeudNomenclature $node) {
		echo $node->getValeur() .'<br>';
		// parcour de la pile en depilant pour recuperer les noeuds enfants
		if ($node->pileEnfants !== null) {
			while($node->pileEnfants->isVide() === false) {
				$noeud = $node->pileEnfants->depiler();
				$node->parcourPrefixe($noeud);
			} 
		}
	}

public  function parcourPostfixe(NoeudNomenclature $node) {
		// parcour de la pile en depilant pour recuperer les noeuds enfants
		if ($node->pileEnfants !== null) {
			while($node->pileEnfants->isVide() === false) {
				$noeud = $node->pileEnfants->depiler();
				$node->parcourPrefixe($noeud);
			} 
		}
		echo $node->getValeur() .'<br>';
	}

	// Ajout des liens vers les noeuds enfants après la création du noeud parent
	public function ajoutEnfants(array $enfants) {
		if ($enfants !== null) {
			if (isset($this->pileEnfants) === false) { // Si la pile Enfants n'existe pas encore je la créée
				$this->pileEnfants = new Pile();  
			}
			foreach ($enfants as  $noeudEnfant) { // affectation des noeuds du tableau dans la pile
				$this->pileEnfants->empiler($noeudEnfant);
			}
		}

	}

	// Supression de tous les liens vers le noeuds enfants
	public function suppressionEnfants() {

	}


	// Suppression du liens vers le noeud enfant $node
	public function suppressionEnfant($node) {
		// Recherche de $node dans la pile $this->pileEnfants
		$pilePivot = new Pile();

	}

	public function sauvegardeBranche() {

	} 
	
}
?>