<?php
function Provjera($rijec){
    for($i=strlen($rijec);$i>=0;$i--){
        global $obrnutaRijec;
        $obrnutaRijec.=$rijec[$i];
    }
   if($rijec==$obrnutaRijec){
         echo "Rijec je palindrom";
     }
    else {  
    echo "Rijec nije palindrom";
     }
}
Provjera("oko");
?>