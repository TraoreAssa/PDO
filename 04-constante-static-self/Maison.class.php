<?php
class Maison
{
    private static $nbPiece = 7;
    public static $espaceTerrain = '500m';
    public $couleur = 'blanc';
    const HAUTEUR = '10m';
    private $nbPorte = 10;


    public static function getNbPiece()
    {
        return self::$nbPiece;
    }
    
    public static function getEspaceTerrain()
    {
        return self::$espaceTerrain;
    }

    public function getNbPorte() 
    {
        return $this->nbPorte;
    }

}
$maison = new Maison;

    // 1 - Afficher le nombre de piece de la maison
    echo "il y a <strong> " . Maison::getNbPiece(). "</strong> dans la maison <br>";

    // 2 - Afficher l'espace terrain de la maison
    echo "le terrain fait <strong> " . Maison::getEspaceTerrain(). "</strong> <br>";
    
    // 3 - Afficher la hauteur de la maison 
    echo "la maison est de  <strong> " . Maison::HAUTEUR . "</strong> de hauteur <br>";
    //ex fetch (PDO::FETCH_ASSOC) || Une constante se déclare toujours en majuscule et appartient a la classe

    // 4 - Afficher la couleur de la maison
    echo "la maison est de couleur  <strong> " . $maison->couleur. "</strong> <br>";

    // // 5 - Afficher le nombre de porte de la maison
    echo "la maison a  <strong> " . $maison->getNbPorte() . "</strong> portes <br><hr>";

// echo $maison::$espaceTerrain; || Fonctionne mais ne pa appeler une static par l'objet($espaceTerrain) (devrait donner une erreur, c'est du n'importe quoi!!!)
// echo $maison->espaceTerrain . '<br>'; || /!\ erreur !! je ne dois pas appeler une propriété static avec mon objet
// echo $maison->getNbPiece(); ||  static par l'objet (devrait donner une erreur, c'est du n'importe quoi!!!)
// echo $maison::$couleur; || couleur est public non pas static donc pas de :: !!!







