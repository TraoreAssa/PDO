<?php 
namespace General;

require_once("namespace_commerce.php");
USE Commerce1, Commerce2, Commerce3; // permet de dire quel namespace je souhaite importer du fichier namespace_commerce.php

echo __NAMESPACE__.'<hr>' ; // constante magique qui affiche quand quel namespace on se trouve


$std = new \StdClass(); // ça recherche la classe StdClass() dans le nameespace General, si je met l'antislash \, je repars dasn l'espace globale d'origine de PHP. ca me permet de sortir du namespace le temps de la ligne
var_dump($std);
echo '<hr>';


$commande = new Commerce1\Commande;
//$commande = new nom_du_namespace\nom_de_la_classe
var_dump($commande);
echo ' <br> Notre de commande'.$commande->nbCommande.' <hr>';

// Exo créer un objet de toute les classes déclarés et faire les affichages des propriétés

$produit = new Commerce2\Produit;
var_dump($produit);
echo '<br>Le nombre de produit est de '.$produit->nbProduit.' dans le Commerce 2<br> <hr>';


$panier = new Commerce3\Panier;
var_dump($panier);
echo '<br> Il y a '.$panier->nbPanier.' de panier <br>';

$produit2 = new Commerce3\Produit;
var_dump($produit2);
echo '<br> Le nombre de produit est de '.$produit2->nbProduit .' dans Commerce 3 <br> <hr>';




