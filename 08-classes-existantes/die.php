<?php
                //($liste, 'Mario')
function recherche($tab, $elem)
{
              //$liste
    if(!is_array($tab))
        die("Vous devez envoyer un ARRAY"); // si die() s'execute, tout les traitement suivants ne sortent pas

    $position = array_search($elem, $tab); // array_seaech est une fonction prédefinie permettant de trouver la position d'un élément dans un tableau ARRAY.
    return $position;
}

$liste = array('Mario', 'Yoshi', 'Toad', 'Bowser');
echo recherche($liste, 'Mario');
echo '<hr>';

echo "Position de l'element dans le tableau : ". recherche($liste, 'Mario'). '<hr>';
echo "Position de l'element dans le tableau : " .recherche($liste, 'Toad'). '<hr>';
echo "Position de l'element dans le tableau : " .recherche('dgfhyskf', 'Toad'). '<hr>';
echo "traitements..."; // Ne s'affiche pas à cause de die() qui s'execute et bloque le script, une erreur peut en engendrer une autre.

