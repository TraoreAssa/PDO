<?php
abstract class Joueur
{
    public function seConnecter()
    {
        return $this->EtreMajeur();
    }
    abstract public function EtreMajeur();
    abstract public function Devise();
}
//-------------------------------------------------
class JoueurFR extends Joueur
{
    public function EtreMajeur()
    {
        return 18;
    }
    public function Devise()
    {
        return "€";
    }
}
//-------------------------------------------------
class JoueurUS extends Joueur
{
    public function EtreMajeur()
    {
        return 21;
    }
    public function Devise()
    {
        return "$";
    }
}
//-------------------------------------------------
// $joueur = new Joueur; /!\ erreur!! il n'est pas possible d'instancier une classe abstraite
//Pour déclarer des methode 'abstraite' il faut que ma classe soit 'abstraite'
$joueurFR= new JoueurFR;
echo "<pre>"; var_dump($joueurFR); echo "</pr>";
echo "Vous devez avoir : " . $joueurFR->EtreMajeur(). "ans <br>";
echo "Vous devez avoir : " . $joueurFR->seConnecter(). " ans pour vous connecter <br>";
echo "Notre devise est en : " . $joueurFR->Devise() . "! <hr>";
//-------------------------------------------------
$joueurUS= new JoueurUS;
echo "<pre>"; var_dump($joueurUS); echo "</pr>";
echo "Vous devez avoir : " . $joueurUS->EtreMajeur(). "ans <br>";
echo "Vous devez avoir : " . $joueurUS->seConnecter(). " ans pour vous connecter <br>";
echo "Notre devise est en : " . $joueurUS->Devise() . "! <hr>";
//-------------------------------------------------

/* 
    - Une classe abstraite n'est pas instanciable
    - Les méthode abstraites n'ont pas de contenu
    - Lorsque l'on hérite de la méthode abstraite, nous sommes obligé de les rédéfinir
    - Pour définir des méthode abstraite, il est nécessaire que la classe suit les contient soit abstraite

    Le développeur qui écrit la classe 'Joueur' est au coeur de l'application (noyau) et va obliger les autres développeurs a redéfinir la méthode EtreMajeur() et Devise().
    C'est une bonne méthode de travail. on impose de bonne contraintes.
*/
