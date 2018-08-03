<?php
use Algo\Nomenclatures\NoeudNomenclature;
use Algo\Nomenclatures\NomenclatureDAO;

// Mise en route de l'autoloader
require 'class/autoloader.class.php';
Algo\Nomenclatures\MountLoader::defLoader();




// Premier niveau de l'arbre
$racine = new NoeudNomenclature(1);

// Deuxième niveau de l'arbre
$node2 = new NoeudNomenclature(2);
$node3 = new NoeudNomenclature(3);
$node4 = new NoeudNomenclature(4);
$tableau = array($node2, $node3, $node4);
$racine->ajoutEnfants($tableau);

// Troisième niveau de l'arbre
$node5 = new NoeudNomenclature(5);
$node6 = new NoeudNomenclature(6);
$tableau = array($node5, $node6);
$node2->ajoutEnfants($tableau);
$node7 = new NoeudNomenclature(7);
$node8 = new NoeudNomenclature(8);
$tableau = array($node7, $node8);
$node3->ajoutEnfants($tableau);
$node9 = new NoeudNomenclature(9);
$node10 = new NoeudNomenclature(10);
$tableau = array($node9, $node10);
$node4->ajoutEnfants($tableau);

$racine->parcourPrefixe($node4);
$racine->parcourPrefixe($node4);
$racine->sauvegardeBranche($racine);






?>