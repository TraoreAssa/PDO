<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<?php
// $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root','');


echo '<pre>'; var_dump($pdo); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>';

echo '<h2> Exemple n°1 SELECT + QUERY + FETCH </h2>';

// $resultat = $pdo->query("SELECT * FROM employes");
$resultat = $pdo->query("dfgjhjfghd");

echo '<pre>'; var_dump($resultat); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($resultat)); echo '</pre>';

echo '<pre>'; print_r($pdo->errorInfo()); echo '</pre>'; // permet d'afficher les erreurs et la req si il y en a. 


//------------------------------------------------------------


echo '<h2> Exemple n°2 SELECT + QUERY + FETCH (1 seul résultat) </h2>';

$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes = 802");

    # Exo : Afficher les données de l'employé 802 sur la page web


$employe = $resultat->fetch(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($employe); echo '</pre>';
    echo '<div class="col-md-6 offset-md-3 alert alert-success">';
    foreach($employe as $key => $value)
    {
        echo "$key - $value <br>";
    }
echo "</div>";


//---------------------------------------------------------


echo '<h2> Exemple n°3 SELECT + QUERY + FETCH </h2>';

$resultat = $pdo->query("SELECT * FROM employes");
$donnes = $resultat->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($donnes); echo '</pre>';

    # Exo : Afficher successivement les données de chaque employés

    foreach($donnes as $table )
    {
        echo '<div class="col-md-4 offset-md-4 alert alert-info text-center text-dark">';
        foreach($table as $key => $value)
        {
        echo "$key - $value <br>";
        }
        echo "</div>";
    }


//---------------------------------------------------------


echo '<h2> Exemple n°4 SELECT + QUERY + FETCH_ASSOC </h2>';
//$resultat = objet
$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC); // on demande s'indexer avec le nom des champs quand on est toujours au stade d'objet
echo '<pre>'; print_r($resultat); echo '</pre>';

    # Exo : Afficher l'ensemble des employés sous forme de tableau HTML avec l'entête du tableau (nom des champs);

echo '<table class="table table-bordered text-center"><tr>';
for($i = 0; $i < $resultat-> columnCount(); $i++ )
{
    $colone = $resultat ->getColumnMeta($i);
    // echo '<pre>';print_r($colone);echo '</pre>';
    echo "<th>$colone[name]</th>";
}
echo '</tr>';

    foreach($resultat as $employe) // je n'ai pas besoin de la méthode fetch() pour réaliser cette boucle foreach, nous avons associé la methode directement avec la req SQL
    {
        // echo '<pre>'; print_r($employe); echo '</pre>';
        echo '<tr>'; 
        foreach($employe as $value)
        {
            echo "<td>$value</td>";               
        }
        echo '</tr>';   
    }
    echo '</table>';
    //La boucle foreach permet de passer en revue des tableaux de données ARRAY mais aussi des objets, ici dans notre cas,  on travail directement avce l'objet 

echo '<h2> Exemple n°5 INSERT, UPDATE, DELETE </h2>';
    # Exo : Insérerz vous la base de donnée a l'aide d'une requete INSERT
$resultat = $pdo->exec("INSERT INTO employes VALUE (DEFAULT,'Assa', 'TRAORE', 'f', 'Secretariat', '2001-01-01', 2000)");

echo "Nombre d'enregistrement affecté par l'INSERT : $resultat <br>";


echo "<h2> Exemple n°6 Passage d'args Array + prepare() + fetch  </h2>";
echo "<span> Marqueur du '?' </span><hr>";

$resultat = $pdo->prepare("SELECT * FROM employes WHERE prenom = ?");// on va dans un premier temps "preparer" la requete sans sa partie variable, que l'on representera avec un marqueur sous forme de ?

$resultat->execute(array("Brahima")); // Brahima vas remplacer le ?

var_dump($resultat);
echo '<hr>';
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);//on associe une méthode pour le résultat exploitable
echo implode($donnees, ' - ');// implode() permet d'extraire un tableau de donnée Array en une chaine de caractere

echo "<hr><span> Marqueur du ':' </span><br>";

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");
$resultat->execute(array('nom' => 'Traore')); // Cottet va venir se stocker directement dans le marqueur ':nom' de la req SQL
echo '<hr>';

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' - ');


echo "<h2> Exemple n°7 Recuperation PDO::FETCH_OBJ + prepare() + execute() </h2>";
    # Exo : Selectinner a l'aide d'une req preparee(marqueur nominatif) les information de l'employé 'Thoyer' et afficher ses données a l'aide de la méthode PDO::FETCH_OBJ

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");
$resultat->bindValue(':nom', 'Thoyer', PDO::PARAM_STR);
$resultat->execute();

$donnees = $resultat->fetch(PDO::FETCH_OBJ);
echo '<pre>'; print_r($donnees); echo '</pre>';

echo "Prénom : " . $donnees->prenom. '<hr>';
foreach ($donnees as $key => $value) 
{
    echo $key . ' - ' .$value . '<br>';
}

echo "<h2> Exemple n°8 Transaction + req et annulation de celle ci </h2>";

$pdo->beginTransaction();// demarrer une transaction 
$resultat = $pdo->exec("UPDATE employes SET salaire = 1000");// passer tout le monde a 1000€

echo "Nombre d'enregistrement affecté par l'UPDATE $resultat <hr>"; 
$result = $pdo->query("SELECT * FROM employes", PDO::FETCH_NUM); // PDO::FETCH_NUM permet d'indexer numeriquement

    # Exo : Afficher la table employes sous forme de tableau HTML


echo '<table class="table table-bordered text-center"><tr>';
for($i = 0; $i < $result-> columnCount(); $i++ )
{
    $colone = $result ->getColumnMeta($i);
    // echo '<pre>';print_r($colone);echo '</pre>';
    echo "<th>$colone[name]</th>";
}
echo '</tr>';

    foreach($result as $employe) // je n'ai pas besoin de la méthode fetch() pour réaliser cette boucle foreach, nous avons associé la methode directement avec la req SQL
    {
        echo '<tr>'; 
        foreach($employe as $value)
        {
            echo "<td>$value</td>";               
        }
        echo '</tr>';   
    }
    echo '</table>';

    //-------------------------------------------------------

    $pdo->rollBack(); // Permet d'annuler la transaction et de revenir a l'etat initial
    echo '<span> On annule le changement</span>';

    # Exo : Afficher de nouveau toute la table employes sous formes de tableau HTML
    $result = $pdo->query("SELECT * FROM employes", PDO::FETCH_NUM);

    echo '<table class="table table-bordered text-center"><tr>';
    for($i = 0; $i < $result-> columnCount(); $i++ )
    {
        $colone = $result ->getColumnMeta($i);
        echo "<th>$colone[name]</th>";
    }
    echo '</tr>';

    foreach($result as $employe)
    {
        echo '<tr>'; 
        foreach($employe as $value)
        {
            echo "<td>$value</td>";               
        }
        echo '</tr>';   
    }
    echo '</table>';

    // Pour valider la transaction, il faut executer un commit -- $pdo->commit() --> permet de valider la transaction

    


    