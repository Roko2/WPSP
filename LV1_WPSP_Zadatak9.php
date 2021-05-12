<?php
function Ispis($redak,$stupac,$polje){
global $matrica;

for($i=0;$i<$redak;$i++){
    for($j=0;$j<$stupac;$j++){
        $matrica[$i][$j]=0;
    }
}
for($a=0;$a<4;$a++){  
        $rdk=$polje[$a][0];
        $stpc=$polje[$a][1];
        $broj=$polje[$a][2];
        $matrica[$rdk][$stpc]=$broj;
}

for($i=0;$i<$redak;$i++){
    for($j=0;$j<$stupac;$j++){
        echo $matrica[$i][$j]." ";
        if($j==2){
            echo "</br>";
        }
    }
}
}
$_Polje=array(
    array(0,0,1),
    array(1,1,2),
    array(1,2,3),
    array(2,2,5)
);
Ispis(3,3,$_Polje);
?>