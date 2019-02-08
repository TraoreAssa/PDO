<?php
class Electricien
{
    public function getSpecialiste()
    {
        return "pose de cable, disjoncteurs, tableaux ou armoires éléctriques... <br> ";
    }
    public function getHoraires()
    {
        return '10h/18h <hr>';
    }
}
//---------------------------------------------------------------------------------------------
class Plombier
{
    public function getSpecialiste()
    {
        return "tuyauw, robinets, chauffe-eau, compteurs... <br> ";
    }
    public function getHoraires()
    {
        return '8h/19h <hr>';
    }
}
//---------------------------------------------------------------------------------------------
class Entreprise
{                 // 1
    public $numero = 0;           //Plombier
    public function appelUnEmploye($employe)
    {
        $this->numero++;
                            // $this->monEmploye1 = new Plombier
        // $entreprise->monEmploye2 = new Electricien;
        $this->{"monEmploye" . $this->numero} = new $employe;
        // dynamique dans la quel on stocke une instance
        return $this->{"monEmploye" . $this->numero};
        //return 
    }
}
//---------------------------------------------------------------------------------------------
$entreprise = new Entreprise;


$entreprise->appelUnEmploye('Plombier'); //Plombier = $employe (nouveau employé) donc monEmploye1

echo'<pre>'; var_dump($entreprise); echo '</pre>';

echo $entreprise->monEmploye1->getSpecialiste() ; 
echo $entreprise->monEmploye1->getHoraires() .'<br>';


// Exo : Faire la meme chose pour avec la class Electricien

$entreprise->appelUnEmploye('Electricien');//création d'un nouvel employé(Eléctricien) donc devient monEmploye2
echo $entreprise->monEmploye2->getSpecialiste();
echo $entreprise->monEmploye2->getHoraires()."<br>";

