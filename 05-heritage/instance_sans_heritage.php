<?php
class A
{
    public function direBonjour()
    {
        return "Bonjour";
    }
}
// ----------------------------------------
class B // la classe B n'herite pas de la classe A
{
    public $mavariable;
    public function __construct()
    {
        $this->mavariable = new A; // je crée un objet A que je place dasn la propriété $mavariable de mon objet B
        echo '<pre>'; var_dump($this->mavariable); echo '<pre>';
    }
    public function uneMethode()
    {
        return $this->mavariable->direBonjour(); // dans mon objet B ($this); je peux appeler des methodes sur mon objet A
        // Habituellemen nous mettons q'une seul fleche, mais la, $mavariable contient un objet, une autre fleche est donc possible
    }
}
//------------------------------------------------
$b = new B;
echo $b->uneMethode(). '<br>';
echo $b->mavariable->direBonjour(). '<hr>';
