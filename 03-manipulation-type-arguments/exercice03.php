<?php
/* 
    UML
    
------------------------
| Vehicule             |        1. Création d'un Vehicule 1
------------------------        2. Attribuer un nombre de litre d'essence au vehicule 1 : 5
| $litresEssence       |        3. Afficher le nombre de litres d'essence du vehicule 1
------------------------        4. Création d'une Pompe
| setLitresEssence()   |        5. Attribuer un nombre de litre d'essence à la pompe 1 : 800
| getLitresEssence()   |        6. Afficher le nombre de litres d'essence de la pompe
------------------------        7. La pompe donne de l'essance en faisant le plein (50l) au vehicule 1
                                8. Afficher le nombre de litres d'essence de la voiture aprés ravitaillement 
------------------------        9. Afficher le nombre de litre restant a la pompe
| Pompe                |        
------------------------
| $litresEssence       |        public function donnerEssence(Vehicule $v)
------------------------
| setLitresEssence()   |
| getLitresEssence()   |
| donnerEssence()      |
------------------------
*/

// 1:
class Vehicule
{
    private $litresEssence;
    public function setLitresEssence($litres)
    {
        $this->litresEssence = $litres;
    }
    public function getLitresEssence()
    {
        return $this->litresEssence;
    }
    
}
// 4:
class Pompe
{
    private $litresEssence;
    public function setLitresEssence($litres)
    {
        $this->litresEssence = $litres;
    }
    public function getLitresEssence()
    {
        return $this->litresEssence;
    }
    public function donnerEssence(vehicule $v)//$v représente un objet de type 'Vehicule', du coup nous avons accés au méthode de la class 'Vehicule' dans la class 'Pompe'
    {
        $this->setLitresEssence ($this->getLitresEssence()-(50 -$v->getLitresEssence())); //<- 7
                                                // 800       - 50 - 5
        $v->setLitresEssence($v->getLitresEssence() + (50 - $v->getLitresEssence()));
        //                                 5        +  50 - 5
    }
}


//------------------------------------------------------------------------------------------------------------
$vehicule1 = new Vehicule;
$vehicule1->setLitresEssence(5); //<- 2
echo "L'essence du vehicule 1 est de <strong>" .$vehicule1->getLitresEssence() . '</strong> litres <br> '; //<- 3

//-------------------------------------------------------------------------------------------------------------

$pompe = new Pompe;
$pompe->setLitresEssence(800); // <- 5
echo "L'essence de la pompe est de  <strong>" . $pompe->getLitresEssence() . '</strong> litres <br><br>'; // <- 6
//----------------------------------------------------------------------------------------------------------------

$pompe->donnerEssence($vehicule1);

//----------------------------------------------------------------------------------------------------------------

echo "Apres ravitaillement, le vehicule 1 possede <strong>" .$vehicule1->getLitresEssence() . "</strong> Litres d'essence <br>"; // <- 8

//----------------------------------------------------------------------------------------------------------------

echo "Apres ravitaillement, la pompe possede <strong>" . $pompe->getLitresEssence() . "</strong> Litres d'essence <br>"; // <- 9





