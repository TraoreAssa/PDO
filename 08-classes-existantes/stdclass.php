<?php
// echo '<pre>'; print_r(get_declared_classes()); echo'</pre>'; 
# permet d'observer toutes les classes prédéfinie existante en PHP

//Exemple StdClass()
$tab = array('Mario', 'Yoshi', 'Toad', 'Bowser');
$objet = (object) $tab; // Cast: transformation
echo '<pre>'; var_dump($objet) ; echo'</pre>'; 
// Un objet fait partie de la classe STDCLASS (classe standart de php) lorque celui-ci est orphelin et n'a pas été instancié par un 'new' l'objet n'est issu d'aucune classe en particulier

echo $objet->{0}; //permet d'afficher un élément de l'objet
