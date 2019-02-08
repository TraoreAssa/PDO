<?php
class Homme
{
    private $error;
    private $prenom;
    private $nom;
    public function setPrenom($prenom)
    {
        if(is_string($prenom))
        {
            $this->prenom = $prenom;
        }
        else
        {
            $this->error = trigger_error("Ce n'est pas un string", E_USER_WARNING);
            return $this->error;
        }
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setNom($nom)
    {
        if(is_string($nom))
            $this->nom = $nom;
        // si une seul condition avec if pas besoin de mettre les {} !
    }
    public function getNom()
    {
        return $this->nom;
    }
}

//--------------------------------------------------------------------------------------------------
$homme = new Homme;
$homme->setPrenom("Assa"); //controler
echo $homme->getPrenom() . '<hr>'; //affiche

$homme->setNom('TRAORE');
echo $homme->getNom() . '<hr>';

//---------------------------------------------------------------------------------------------------
$homme2 = new Homme;
echo $homme2->getPrenom(). '<hr>'; // cette ligne ne donne aucun prenom car j'ai réinstancié l'objet dans la variable $homme2. preve qu'au dessu on modifie bien l'objet mais pas la classe

$homme1->setNom('TRAORE');
echo $homme2->getNom() . '<hr>';
    // $this représente l'objet à l'intérieur de la classe




