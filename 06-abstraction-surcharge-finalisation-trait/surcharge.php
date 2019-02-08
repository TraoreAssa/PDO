<?php
class A
{
    public function calcul()
    {
        return 10;
    }
}
//--------------------------------------
class B extends A
{
    public function calcul()
    {
        $nb = parent::calcul();
        // parent fonctionne pour appeler une méthode d'une class parent lors d'une  SURCHARGE (afin d'eviter qu'elle ne s'appel elle même  $this->calcul car elle est redefinie)

        if($nb<=100) return "$nb est inferieur ou égal a 100 <br>";
        else        return "$nb est superieur a 100 <br>";
    }
    public function autreCalcul()
    {
        $nb = parent::calcul(); // il est possible d'atteindre une methode de mon parent, même s'il n'y a pas de refefinition
        return $nb;
        
    }
}

//------------------------------------------------------
/* 
    - Surcharge - Override : Une redefinition + surcharge me permet de prendre en compte le comportement de ma fonction d'origine et d'y ajouter un traitement complémentaire
    - Contexte => pour la surcharge, si on faisait pas ca dans wordpress, on ne pourrais pas mettre à jour le CMS, on modifirais directement les fonctions du coeur ! 
*/
$calcul = new B ;
echo $calcul->calcul();
echo $calcul->autreCalcul();
