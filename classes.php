<?php
abstract class Zaposlenik{
public $ime="N/A";
public $prezime="N/A";
public $oib="N/A";

public function __construct($ime=null,$prezime=null,$oib=null){
    if($ime) $this->ime=$ime;
    if($prezime) $this->prezime=$prezime;
    if($oib) $this->oib=$oib;

}
abstract public function Radi();
private function CheckOib(){
    $oOibValidator=new Oib();
    if($oOibValidator->ProvjeriOib($this->oib)){
        echo "Oib valja";
    }
    else if(!($oOibValidator->ProvjeriOib($this->oib))){
        throw new Exception('Oib nije ispravan');
    }
        } 
public function Hello(){
    return $this->CheckOib();
}
}
class Oib{
    public function ProvjeriOib($oib){
    if ( mb_strlen( $oib ) != 11 || ( ! is_numeric( $oib ) ) ) {
        return false;
    }
    $ostatak = 10;
    for ( $i = 0; $i < 10; $i++ ) {
        $trenutnaZnamenka = (int) $oib[$i];
        $zbroj = $trenutnaZnamenka + $ostatak;
        $meduOstatak = $zbroj % 10;
         if ( $meduOstatak == 0) {
            $meduOstatak = 10;
         }
         $umnozak = $meduOstatak * 2;
         $ostatak = $umnozak % 11;
        }
        if ( $ostatak == 1 ) {
            $kontrolnaZnamenka = 0;
         }
         else {
            $kontrolnaZnamenka = 11 - $ostatak;
         }
         if ( ( (int) $oib[10] ) == $kontrolnaZnamenka ) {
            return true;
         }
return false;  
}
}

class Nastavnik extends Zaposlenik{

    public function Radi(){
        echo $this->ime." ".$this->prezime." idi izvoditi nastavu";
    }
}

class StrucnSluzba extends Zaposlenik{

    public function Radi(){
    echo $this->ime." ".$this->prezime." idi izvoditi administrativne poslove";
    }
}
interface lNastavnik{
    public function DrziNastavu();
}
class Predavac extends Nastavnik implements lNastavnik{
    public function DrziNastavu(){
        echo $this->ime." ".$this->prezime." idi izvoditi predavanja";
    }
}
interface lAsistent{
    public function PripremiNastavu();
    public function CuvajIspit();
}
class Asistent extends Nastavnik implements lNastavnik,lAsistent{
    public function DrziNastavu(){
        echo $this->ime." ".$this->prezime." idi izvoditi vježbe"."<br>";
    }
    public function PripremiNastavu(){
       echo $this->ime." ".$this->prezime." pripremi predavanja"."<br>";
    }
    public function CuvajIspit(){
      echo  $this->ime." ".$this->prezime." idi cuvaj ispit"."<br>";
    }
}
?>