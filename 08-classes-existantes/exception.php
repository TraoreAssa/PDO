<?php
function recherche($tab,$elem)
{
    if (!is_array($tab)) 
        throw new Exception('Vous devez envoyer un ARRAY');
        // throw nous permet de nous envoyer dans le bloc catch et d'arreter l'execution du code
    
        if (sizeof($tab)<=0)
        throw new Exception('Vous devez envoyer un ARRAY avec du contenu');

        $position = array_search($elem,$tab);
        return $position;
}
//-------------------------------------------------------------------------------------
$liste = array('Mario', 'Luigi', 'Toad', 'Bowser');
$test=array();

try { // Bloc d'essai, on va essayer d'afficher les instructions suivante dasn le try
    echo "Le personnage se trouve a la position : <strong>" .recherche($liste, 'Mario'). "</strong><hr>";
    echo "Le personnage se trouve a la position : <strong>" .recherche($liste, 'Luigi'). "</strong> <hr>";
    echo "Le personnage se trouve a la position : <strong>" .recherche($test, 'Toad'). "</strong> <hr>";
    echo "traitements....";// ne s'affiche pas, il y a pas de raison de continuer des traitement si l'un d'entre eux dysfonction, car les prochains traitement peuvent être dépendant de celui qui a dysfonction
}
catch (Exception $e) // bloc de capture, on va attraper les exceptions 'Exception' s'il y en a une qui est levée, $e représente l'Exception car en mettant ke throw je n'ai pas pu mettre le nom de la variable puisque l'execution est stoppée pour arrivé ici. Try et catch fonction ensemble. Il est possible de mettre plusieurs bloc try/catch a la suite
{
    echo '<pre>'; print_r($e);echo '</pre>';
    echo "Message d'erreur : " . $e->getMessage(). " a  la ligne ". $e->getLine()." dans le fichier ".$e->getFile().'<br>';
}

//--------------------------------------------------------------------------------------
echo "<hr><hr>";

try 
{
    $bdd = new PDO('mysql:host=localhost;dbname=test22', 'root', '');
    echo "Connexion réussi";
} 
catch(PDOException $e) //PDOException est une classe prédefinie en PHP permettant d'attrapper les exceptions PDO, en cas d'erreur dans le bloc 'try', on tombe directement dans le bloc 'catch'.
{
    //$e represente un objet de la classe 'PDOException' qui contient des methodes permettant d'afficher les exception PDO
    echo "<pre>"; print_r($e); echo "</pre>";
    echo "<pre>"; print_r(get_class_methods($e)); echo "</pre>";
    echo "Message d'erreur : " . $e->getMessage(). " a  la ligne ". $e->getLine()." dans le fichier ".$e->getFile().'<br>';
}