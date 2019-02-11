<?php
function inclusionAutomatique($nomDeLaClasse)
{
    // require_once(A . '.class.php');
    require_once($nomDeLaClasse . '.class.php');
    echo 'on passe dans inclusionAutomatique <hr>';
    echo "require($nomDeLaClasse.class.php)";
}

 spl_autoload_register('inclusionAutomatique');
 // des qu'il vois 'new' dans appel-autolaoad il sexecute et recupere ce qui a apres "new" pour le mettre dans $nomDeLaClasse;


 /* 
    spl_autoload_register() est une fonction prédefinie qui permet d'executer une fonction lorsque l'interpreteur voit new dans le code

    Le nom a coté du new est récupere et transmis automatiquement a la fonction 'inclusionAutomatique()' un peu a la maniere des méthodes magique __set, __call ...

    Il est indispansable de respecter une convention de nommage sur ses fichier pour que l'autoload fonctionne

    Habituellement, nous aisons appel a nos ficher par "required" mais imaginons que nous avons 50 classes dans 50 fichers; l'autoload permet d'eviter de faire 50 "required". 
 */

 //$a = new A