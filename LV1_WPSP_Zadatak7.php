<?php
function Cirkular($list1,$list2){
   $list3= array_merge($list1,$list2);
        for($x=0;$x<count($list1);$x++){
        $z = 0 ;
        
        for($y=$x;$y<$x+count($list1);$y++)
        {
            if($list2[$z]== $list3[$y]){
                $z+= 1;
            }
            else{
                break;
            }
            
        if ($z == count($list1)){
            return True ;
        }
             return False;
        }
    }   
}
$list1 = array(1, 2, 3, 4, 5);
$list2 = array(3, 4, 5, 1, 2);
if(Cirkular($list1,$list2)){
    echo "True";
}
else{
    echo "False";
}
?>