<?php
class Panier
{
    public $nbProduits;
    public function ajouterArticle()
    //utilisable dans la classe et a l'exterieur des classes
    {
        return "L'article a été ajouté";
    }
    protected function retirerArticle()
    // Utilisatble dans la classe et dans les classe qui rappel la classe
    {
        return "L'article a été retiré";
    }
    private function affichageArticle()
    // Utilisable que dans cette classe
    {
        return "Voici les articles";
    }
    // public function test ()
    // {
    //     return $this
    // }
}

$panier1 = new Panier;
echo '<pre>'; var_dump($panier1) ; echo'</pre>'; 
// On observe un objet issu de la classe 'Panier' a l'identifiant '1' (référence de l'objet)

echo '<pre>'; var_dump(get_class_methods($panier1)) ; echo'</pre>';
// get_class_methods() : Fonction prédéfinie permettant d'observer les méthodes issu d'une classe (affiche que la public !)


$panier1->nbProduits = 5;
echo '<pre>'; print_r($panier1) ; echo'</pre>'; 

echo "Nombre de produit dans le panier 1 : " . $panier1->nbProduits . '<br>';
// On pioche une propriété de la classe a travers l'objet --> pas de parenthèses = C'est une propriété / propriété public OK

echo "Panier1 > " . $panier1->ajouterArticle() . '<br>';
// On pioche une methode de la classe à travers l'objet --> des parenthèses = C'est une méthode

// echo "Panier1 > " . $panier1->retirerArticle() . '<br>'; 
// /!\ Erreur !! méthode protected !! l'élément est accesible uniquement dans la classe ou cela a été déclaré ainsi que les classes héritières

// echo "Panier1 > " . $panier1->affichageArticle() . '<br>';
// /!\ Erreur !! méthode private !! l'élément est accesible uniquement dans la classe ou cela a été déclaré


$panier2 = new Panier;
echo '<pre>'; var_dump($panier2) ; echo'</pre>'; 

$panier2->nbProduits = 3;
echo "Nombre de produit dans le panier 2 : " . $panier2->nbProduits . '<br>';
/* 
    Niveau de visibilité 
        - public : accessible de partout
        - protected : accessible dans la classe mère et heriotières
        - private : accessible dans la classe mère

    'new' est un mot clé permettant d'effectuer un instanciation une classe peut produire plusieurs objet. Nous pouvons effectuer plusieurs instanciation 'new' .
    $panier1 represente l'objet issu de la classe 'Panier'
    La classe est le plan de contruction / $panier1 represente un exemple de la classe 
*/







