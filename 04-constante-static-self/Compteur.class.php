<?php
class Compteur
{
    public static $nbInstanceClasse = 0; // appartient a la Classe
    public $nbInstanceObjet = 0; // appartient a l'Objet
    public function __construct()
    {
        ++self::$nbInstanceClasse; // self::$nbInstanceClasse +1
        ++$this->nbInstanceObjet; //$this->nbInstanceObjet +1
    }
}
// On observe que la variable $nbInstanceObjet a la valeur de 1 pour chaque objet, elle appartient donc a l'objet
// On observe que la variable $nbInstanceClass a la valeur de 5, elle appartient donc a la class.
//-------------------------------------------------

$c1 = new Compteur;
$c2 = new Compteur;
$c3 = new Compteur;
$c4 = new Compteur;
$c5 = new Compteur;

//---------------------------------------------------
echo "Nombre de fois ou la Classe a été instanciée : " . Compteur::$nbInstanceClasse . '. <hr>';
echo "Nombre de fois ou l'Objet a été instanciée : " . $c5->nbInstanceObjet . '. <hr>';