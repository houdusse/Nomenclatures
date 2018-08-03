<?php
namespace Algo\Nomenclatures;
// use Algo\StructureDonnees\StructureReflexive\Pile

 class NoeudNomenclature {

 	// Liste des méthoes de la classe
 	// NoeudNomenclature::__construct($valeur array $listeLiensEnfants)
 	// NoeudNomenclature::
 
	Private $id;
	private $valeur; // id du noeud 
	private $pileEnfants;
	private $manager;

	public function __construct($id = null, $valeur = null, array $listeEnfants = null) {
		if ($listeEnfants !== null) {
			$this->pileEnfants = new Pile();  
			foreach ($listeEnfants as  $noeudEnfant) {
				$this->pileEnfants->empiler($noeudEnfant);
			}
		}
		$this->valeur = $valeur;
		$this->id = $id;
		$this->manager = NomenclatureDAO::createDAO();
	}


	public function getId() {
		return $this->id;
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
			$pilePivot = new Pile();
			while($node->pileEnfants->isVide() === false) {
				$noeud = $node->pileEnfants->depiler();
				$pilePivot->empiler($noeud);
				$node->parcourPrefixe($noeud);
			}
			// Reverser la pilePivot dans la pileEnfants
			// Pour restaurer l'état de pileEnfant avant son parcours 
			while($pilePivot->isVide() === false) {
				$noeud = $pilePivot->depiler();
				$node->pileEnfants->empiler($noeud);
			}
			unset($pilePivot);
		}
	}

public  function parcourPostfixe(NoeudNomenclature $node) {
		// parcour de la pile en depilant pour recuperer les noeuds enfants
		if ($node->pileEnfants !== null) {
			$pilePivot = new Pile();
			while($node->pileEnfants->isVide() === false) {
				$noeud = $node->pileEnfants->depiler();
				$pilePivot->empiler($noeud);
				$node->parcourPostfixe($noeud);
			}
			// Reverser la pilePivot dans la pileEnfants 
			while($node->pilePivot->isVide() === false) {
				$noeud = $pilePivot->depiler();
				$node->pileEnfants->empiler($noeud);
			}
			unset($pilePivot);

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

	public function sauvegardeBranche($racine) {
		if ($racine->pileEnfants !== null) {
			$pilePivot = new Pile();
			while($racine->pileEnfants->isVide() === false) {
				$noeud = $racine->pileEnfants->depiler();
				// echo 'compose : ' .$racine->getId() .' et composant : ' .$noeud->getId() . '<br>';
				$this->manager->ecrire($racine->getId(), $noeud->getId()); // Ecriture dans la base
				$pilePivot->empiler($noeud);
				$noeud->sauvegardeBranche($noeud);
			}
			// Reverser la pilePivot dans la pileEnfants
			// Pour restaurer l'état de pileEnfant avant son parcours 
			while($pilePivot->isVide() === false) {
				$noeud = $pilePivot->depiler();
				$this->pileEnfants->empiler($noeud);
			}
			unset($pilePivot);
		}
	} 
	
}
?>