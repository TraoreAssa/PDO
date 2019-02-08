<?php
                //($liste, 'Mario')
function recherche($tab, $elem)
{
              //$liste
    if(!is_array($tab))
        die("Vous devez envoyer un ARRAY");

    $position = array_search($elem, $tab);
    return $position;
}

$liste = array('Mario', 'Yoshi', 'Toad', 'Bowser');
echo recherche($liste, 'Mario');
echo '<hr>';

echo "Position de l'element dans le tableau : ". recherche($liste, 'Mario'). '<hr>';
echo "Position de l'element dans le tableau : " .recherche($liste, 'Toad'). '<hr>';
echo "Position de l'element dans le tableau : " .recherche('dgfhyskf', 'Toad'). '<hr>';
echo "traitements...";

