<pre>
<?php
ini_set('display_errors', '1');

spl_autoload_extensions(".php"); 
spl_autoload_register();


$triangle = new HellsTriangle\Triangle();

$arr = [[6],[3,5],[9,7,1],[4,6,8,4]];
//[[6],[3,5],[9,7,1],[4,6,8,4]]

if($triangle->setArray($arr)) {;

//var_dump($triangle);
//var_dump($triangle->isValid());
//$triangle->getHellsSum();
var_dump($triangle->getHellsSum());
}
