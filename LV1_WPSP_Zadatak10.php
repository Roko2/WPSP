<?php
global $fib;
$fib=array(
    "1"=>1,
    "2"=>2
);
function Fibonacci($n){
    $ulazak=false;
    foreach($GLOBALS['fib'] as $x => $broj) {
        if($x==$n){
            $ulazak=true;
           echo $broj;
        }
      }
      if($ulazak==false){
        $n1 = 0;
        $n2 = 1;
        $fibBroj = 0;
        for($i = 0; $i < $n-1;$i++){
            $fibBroj = $n1 + $n2;
            $n1 = $n2;
            $n2 = $fibBroj;
            array_push($GLOBALS['fib'], array((string)$n => $fibBroj));
            echo $fibBroj." ";
  }
    //var_dump($GLOBALS['fib']);
}

}
Fibonacci(10);

?>