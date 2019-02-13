<?php
require_once 'autoload.php';

 /* 
    Etape 1 = autoload => require 'Controller.php'; dans controller -> new \model\EntityRepository;
    Etape 2 = donc autoload => require 'EntityRepository.php'; 
 */
//                namespace   class
$controller = new Controller\Controller; // l'autoload voit passer le mot 'new' et fait appel au fichier Controller.php. Et dans un 2ème temps, dans le controller il y a un instance 'new' de EntityRepository, donc l'autoload fait appel au fichier EntityRepository.php
// echo '<pre>'; var_dump($controller); echo '</pre>';

$controller->handlerRequest();

