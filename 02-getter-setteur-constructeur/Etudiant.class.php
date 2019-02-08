<?php
class Etudiant
{
    private $prenom;           //Assa
    public function __construct($arg)  
    {                                                               //Assa
        echo "Instanciation, nous avons recu l'information suivante : $arg <br>";
                               //Assa
        return $this->setPrenom($arg);
        // |-> $etudiant->setPrenom($arg);
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
                            //Assa
    public function setPrenom($arg)
    {
        // Tous les controles sur les données sont ici
        $this->prenom = $arg;
        // |-> $etudiant->prenom = 'Assa'
    }
}
//--------------------------------------------------------------------------------------
$etudiant = new Etudiant('Assa'); // __construct est appelé automatiquement - nous mettons un argumment apres le nom de la classe qui attérit directement dans le constructeur
// $bdd = new PDo ('identifiants BDD...');
echo '<pre>'; var_dump($etudiant) ; echo'</pre>'; 

echo "Prénom : " . $etudiant->getPrenom(). '<hr>';

$etudiant->__construct('Yvette');//le constructeur peut tout de même être appelé comme une méthode "classique"
echo "Prénom : " . $etudiant->getPrenom(). '<hr>';

$etudiant->setPrenom('Julie');
echo "Prénom : " . $etudiant->getPrenom(). '<hr>';

/* 
    exemple : d'insertion: c'est le getteur qui permettrait d'exploiter la donnée finale er de l'inserer dans la BDD
    $bdd->exec(INSERT INTO employes (prenom) VALU ($etudiant->getPrenom()));

    __construct() est une méthode magique qui s'execute automatiquement, elle sers l'equivalent du init.php avec session_star(), connexion à la BDD, autoload ect ...

        - setteur : permet de controler les données 
        - getteur : permet de voir / exploiter les données finales
        - Private $prenom : la propriété est privé afin que l'on ne puisse pas la remplir a l'exterieur de la classe sans avoir fait des controles au préalables, c'est a dire sans etre passé par les getteur et setteur
    
        Dans notre cas, lorque l'on instancie la classe, les données vont directement au setteur, c'est une sécurité, on sait que les données ne vont pas m'importe ou

    Si nous avons un formulaire avec 2 champs, nous aurons autant de getteur et setteur qu'il y a de champs --> 20 setteurs et 20 getteurs 
*/

