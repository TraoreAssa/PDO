<?php

class Societe
{
  public $adresse;
  public $ville;
  public $cp;
                    // villes, Paris
  public function __set($nom, $valeur)
  {
    echo "La propriété <strong> $nom </strong> n'existe pas, la valeur <strong> $valeur</strong> n'a donc pas été affecter ! <hr>";
  }
  //__set() est une méthode magique qui se déclenche uniquement en cas de tentative d'affection sur une propriéte qui n'existe pas

  public function __get($nom)
  {
    echo  "La propriété <strong> $nom </strong> n'existe pas, on ne peut donc pas l'afficher <hr>! ";
  }
  // __get est une methode magique qui s'execute uniquement en cas de tentative d'affichage d'une propriété qui n'existe pas, donc que nous n'avons pas déclarer
  public function __call($nom,$valeur)
  {
    echo "La méthode <strong> $nom </strong> n'existe pas, Les arguments étaient : <strong>".implode("-",$valeur)." </strong> !";
  }
  // __call est une methode magique qui s'execute uniquement en cas de tentative d'execution d'une methode qui n'existe pas, donc que nous n'avons pas déclarer
}



// Exo: __call() : afficher un message d'erreur pour la methode gezagygezu(1,2,3); qui n'existe pas

$societe1 = new Societe;

$societe1->villes = "Paris"; # tentative d'affectation a une proprieété qui n'a pas été déclarer

echo $societe1->titre; # tentative d'affichage d'une proprieété qui n'a pas été déclarer
echo $societe1->gezagygezu(1,2,3); # tentative d'execution a une méthode qui n'a pas été déclarer

echo '<pre>'; var_dump($societe1) ; echo'</pre>'; 

/* 
    Il y a trop d'erreur "sale" en PHP, les methodes magiques permettent d'afficher des eurreurs "propre" en français.
*/