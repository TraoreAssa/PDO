<?php
class A
{
    public function test1()
    {
        return 'test1';
    }
}
// -----------------------------
class B extends A
{
    public function test2()
    {
        return 'test2';
    }
}
// -----------------------------
class C extends B
{
    public function test3()
    {
        return 'test3';
    }
}
// -----------------------------

// Exo : Créer un objet issu de la classe C et afficher les méthodes issu de la classe

$test = new C;
echo 'Je suis le : ' .$test->test1() .'<br> Moi le : ' .$test->test2() . '<br> Et moi le : ' . $test->test3() ;
/* 
    si C herite de B 
        ... alors C hérite de A...
*/

