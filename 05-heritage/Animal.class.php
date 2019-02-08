<?php
class Animal
{
    protected function deplacement()
    {
        return "Je me déplace";
    }
    public function manger()
    {
        return "Je mange chaque jour";
    }
}
//---------------------------------------------------------------------
class Elephant extends Animal //extends = herite d'une classe
{
    public function quiSuisJe()
    {
        return 'Je suis un éléphant et ' . $this->deplacement(); 
        //j'utilise la méthode déplacement() qui est protected dont j'herite (executable uniquement dans ma class mère ou dans la class fille)
    }
}
//---------------------------------------------------------------------
class Chat extends Animal
{
    public function quiSuisJe()
    {
        return 'Je suis un chat';
    }
    public function manger()
    {
        return "Je me goinfre comme un gros chat";
    }
}// Il n'est pas possible d'heriter de plusieurs classes en meme temps

//---------------------------------------------------------------------
$elephant = new Elephant;
echo '<pre>'; var_dump(get_class_methods($elephant)); echo '</pre>';

echo $elephant->manger() . "<br>";
echo $elephant->quiSuisJe() . "<hr>";
//---------------------------------------------------------------------

$chat = new Chat;
echo '<pre>'; var_dump(get_class_methods($chat)); echo '</pre>';

echo $chat->quiSuisJe().'<br>';
echo $chat->manger().'<hr>'; /*affiche "Je me goinfre comme un gros chat" et non "Je mange chaque jour" car la méthode a été redefinie dans la classe "Chat".
L'interpréteur cherche d'abord dans la class Chat, et seulement si la méthode n'avait pas été trouvé, il aurait chercher dans la classe dont j'herite
