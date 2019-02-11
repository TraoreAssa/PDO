<?php
// require_once('A.class.php');
// require_once('B.class.php');
// require_once('C.class.php');
// require_once('D.class.php');

require_once("autoload.php");

$a = new A;
var_dump($a);

$b = new B;
var_dump($b);

$c = new C;
var_dump($a);

$d = new D;
var_dump($a);