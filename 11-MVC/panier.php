<?php
session_start();


if (isset($_GET['action']) && $_GET['action'] == 'vider')
{
    unset($_SESSION['panier']);
}

if(isset($_GET['action']) && $_GET['action']=='create'|| isset($_SESSION['panier']))
{
    $_SESSION['panier'] = array(26,27,28);
    echo "Produit présente dans le panier : " .implode($_SESSION['panier'], '-').'<hr>';
    echo '<a href ="?action=vider">Vider le panier</a>';
}
else {
    echo '<a href ="?action=create">Créer le panier</a>';
}

/* 
    Jusqu'a présent vous avez parfois du mal a organiser le code, ce n'est toujours évident de mélanger HTML et PHP

    ARCHITECTURE MVC 
    1. Modele (échange avec la BDD - REQ SQL)
    2. View (affichage et présentation des données - HTML/CSS)
    3. Controller (traitement - PHP)

    exemple:
        - Dans le model je fais une req qui va chercher tous les produits de la BDD
        - Dans le controller je fais des traitements et decide d'afficher uniquement les jeans 10 par 10
        - Dans la view je presente les données qui sorte du traitement (controller) issu de la req SQL (model).

    Avantage :
        - Clarté de l'architecture
        Si le design doit changer, vous pouvez demander a l'intégrateur de proceder aux mise a jour, il ne resquera pas de decapiter une accolade dans le code 
        - Favorise le travail d'equipe et les mise a jours

    Inconvenients:
        - Nombre de fichiers (trop complexe pour de petite applications)

    Le but d'une architecture MVC est la separation des couches (separation des langages), c'est comme cela que fonctionne les CMS (drupal, wordpress ect ...)
*/