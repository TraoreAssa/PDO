<?php
class Vehicule
{
    private static $marque = 'BMW'; // lorsqu'on modifie la marque elle est modifier pour toute la class
    private $couleur = 'noir';
    public static function setMarque($marque)
    {
        self::$marque = $marque; // on utilise self:: avec la propriete "STATIC"
    }
    public static function getMarque()
    { // marque est static donc on utilise une fonction static et on l'appel avec self::
        return self::$marque;
    }
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }
    public function getCouleur()
    {
        return $this->couleur;
    }
}
//--------------------------------------------------------------
$vehicule1 = new Vehicule;
echo "Vehicule 1 de marque <strong>" . Vehicule::getMarque() . "</strong> et de couleur <strong>" . $vehicule1->getCouleur() . "</strong><br>";
 // appel d'une propriété               static ::  (class)                       ||                        non static ->  (l'objet)  
$vehicule2 = new Vehicule;
$vehicule2->setCouleur('rouge');// modification de la class
echo "Vehicule 2 de marque <strong>" . Vehicule::getMarque() . "</strong> et de couleur <strong>" . $vehicule2->getCouleur() . "</strong><br>";

$vehicule3 = new Vehicule;
echo "Vehicule 3 de marque <strong>" . Vehicule::getMarque() . "</strong> et de couleur <strong>" . $vehicule3->getCouleur() . "</strong><br>";

$vehicule4 = new Vehicule;
// $vehicule4->setMarque('Mercedes');
Vehicule::setMarque('Mercedes');
echo "Vehicule 4 de marque <strong>" . Vehicule::getMarque() . "</strong> et de couleur <strong>" . $vehicule4->getCouleur() . "</strong><br>";

$vehicule5 = new Vehicule;
echo "Vehicule 5 de marque <strong>" . Vehicule::getMarque() . "</strong> et de couleur <strong>" . $vehicule5->getCouleur() . "</strong><br>";

/* 
    Un élément déclaré comme "static" appartient a la classe non a l'objet
    Si je modifie un élément 'static, je modifier la classe elle même 

    $objet-> élément a lexterieur de le classe
    $this-> élément d'un objet à l'interieur de le classe
    class:: élément de la classe à l'exterieur de la classe
    self:: élément d'une classe a l'interieur de la classe
*/
