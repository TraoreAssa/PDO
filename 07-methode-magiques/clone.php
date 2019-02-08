<?php
class Ecole
{
    public $nom = "WF3";
    public $cp = 78;
    public function __clone()
    {
        $this->cp = 92;
    }
}
//----------------------------------
$ecole1 = new Ecole;
$ecole1->cp=75;
echo '<pre>'; var_dump($ecole1) ; echo'</pre>'; 

$ecole2 = new Ecole;
echo '<pre>'; var_dump($ecole2) ; echo'</pre>'; 

$ecole3 = $ecole1;
echo '<pre>'; var_dump($ecole3) ; echo'</pre> <hr>'; 
//---------------------------------------------------
//Lorsque je modifie $ecole1 cela prend effet sur $ecole3 et vice-versa, $ecole1 et $ecole3 sont des référence qui pointe vers le meme objet #1. Ils represente le meme objet.
$ecole3->cp= 91;
echo "Ecole 1 > " . $ecole1->cp . "<br>";
echo "Ecole 3 > " . $ecole3->cp . "<hr>";

//-----------------------------------------------------
// A ce moment la; la methode magique clone() s'execute
$ecole4 = clone $ecole2; // clone créé un objet et récupere les informations $ecole2 et le code etre les accolades s'execute, on change donc de valeur pou $cp
echo '<pre>'; var_dump($ecole4) ; echo'</pre>';

