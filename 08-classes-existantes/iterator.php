<?php
echo '<strong> ArrayIterator </strong><hr> ';
$perso = array('M' => 'Mario', 'L'=> 'Luigi','T' => 'Toad', 'B' => 'Bowser' );

$it1 = new ArrayIterator($perso);
echo '<pre>'; print_r(get_class_methods($it1)); echo '</pre>';
echo '<pre>'; var_dump($it1); echo '</pre>';

$it1->rewind();
while ($it1->valid()) {
    echo $it1->key(). ' - ' . $it1->current(). '<br>';
    $it1->next();
}

/* 
    Iterator est ce q'on appel un design parttern, qu'on peut definir un solution pratique  a des problemes fréquent. Un pattern donc une structure commune pour resoudre des problemes similaire, et ce meme si le contexte diffère selon les cas.
    rewind(): permet de se placer au debut du fichier / array / dossier
    valid(): permet de verifier s'il y a des informations a parcourir
    key(): permet d'afficher l'indice/la clé
    current(): permet d'affichier la valeur
    next(): permet d'afficher l'élement suivant
*/
echo '<br> <strong> SimpleXmlIterator </strong> <hr> ';
$it2 = new SimpleXmlIterator('fichier.xml', null,true);
echo '<pre>'; print_r(get_class_methods($it2)); echo '</pre>';
echo '<pre>'; var_dump($it2); echo '</pre>';

$it2->rewind();
while ($it2->valid()) {
    echo $it2->key(). ' - ' . $it2->current(). '<br>';
    $it2->next();
}

//Les données sont de nature differente mais la structure du code reste la meme, nous avons acces aux meme fonction pour passer en revue le fichier XML que celle pour le tableau ARRAY
//----------------------------------------------------------------

# Exo : Faire le même chose avec la classe DirectoryIterator
echo '<br> <strong> DirectoryIterator </strong> <hr> ';
$it3 = new DirectoryIterator('..');//('.')
echo '<pre>'; print_r(get_class_methods($it3)); echo '</pre>';
echo '<pre>'; var_dump($it3); echo '</pre>';

$it3->rewind();
while ($it3->valid()) {
    echo $it3->key(). ' - ' . $it3->current(). '<br>';
    $it3->next();
}