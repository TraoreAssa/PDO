<?php
/* 
    Au vue de cette classe vous allez renseiger les propriétés: pseudo et mdp (getteurs et setteurs) et faites les affichages nécessaires
*/
class Membre
{
    private $pseudo;
    private $mdp;

    //------------ Pseudo -------------
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }
    public function getPseudo(){
        return $this->pseudo;
    }
    //------------ MDP -------------
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }
    public function getMdp(){
        return $this->mdp;
    }
    
}
$membre = new Membre;
$membre->setPseudo("Biss ");
echo 'Votre pseudo est : ' . $membre->getPseudo() . '<br>'; 
$membre->setMdp("assatraore");
echo 'Et votre Mot de passe est : ' . $membre->getMdp(); 