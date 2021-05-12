<?php
function Pomnozi($matrica1,$matrica2){
    for($o = 0; $o < 3; $o++){
    for($p = 0; $p < 3; $p++)
    {   
        global $rezultat;
        $rezultat[$o][$p]=0;
    }
}
for($i=0;$i<3;$i++){
    for($j=0;$j<3;$j++){
        for($k=0;$k<3;$k++){
            $rezultat[$i][$j]+=$matrica1[$i][$k]*$matrica2[$k][$j];
        }
    }
}
var_dump($rezultat);
}
$mat1=array(
    array(1,2,3),
    array(3,5,1),
    array(2,8,1)
);
$mat2=array(
    array(6,2,1),
    array(9,5,3),
    array(1,5,2)
);
Pomnozi($mat1,$mat2);
?>