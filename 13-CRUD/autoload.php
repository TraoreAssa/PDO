<?php
class Autoload
{
    public static function className($className)
    {
        require __DIR__ . '/' . str_replace('\\', '/', $className. '.php'); 
        //str_replace permet de remplacer \ par un / il y en a 2 car le 1er est pour échapper (pour ')
        // echo __DIR__ . '/' . str_replace('\\', '/', $className. '.php');
    }
}
spl_autoload_register(array('Autoload', 'className')); // spl_autoload_register() quand l'interpreteur voit passer le mot clé new, il va dans la classe 'Autoload' et execute la fonction 'classeName', il prends ce qui se trouve à coté du new 'Controller\Controller' et il l'envoi en argument de la fonction

# echo __DIR__ . '<br>'; // chemin complet du dossier!

// $a = new Controller\Controller;
$a = new Model\EntityRepository;
// var_dump($a);

// <!-- 2 -->
