<?php
namespace Algo\Nomenclatures;

 class Cellule {

	private $valeur;
	private $celluleSuivante;
	private $cellulePrecedente;

	public function __construct($valeur, Cellule $celluleSuivante = null, Cellule $cellulePrecedente = null) {
		$this->valeur = $valeur;
		$this->celluleSuivante = $celluleSuivante;
		$this->cellulePrecedente = $cellulePrecedente;
	}


	public function getValeur() {
		return $this->valeur;
	}


	public function getCelluleSuivante() {
		return $this->celluleSuivante;
	}


	public function getCellulePrecedente() {
		return $this->cellulePrecedente;
	}


	public function setValeur($valeur) {
		$this->valeur = $valeur;
	}


	public function setCelluleSuivante(Cellule $celluleSuivante = null ) {
		$this->celluleSuivante = $celluleSuivante;
	}


	public function setCellulePrecedente(Cellule $cellulePrecedente = null) {
		$this->cellulePrecedente = $cellulePrecedente;
	}
}



?>