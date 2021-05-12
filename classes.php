
<?php
class Configuration{
    public $host='localhost'; 
    public $dbname='studentskidom'; 
    public $username='root'; 
    public $password=''; 
}

class Studom{
    public $poljeStudenata=array();
    public $poljeSoba=array();

    public function __construct($studenti=array(),$sobe=array()){
    $this->poljeStudenata=$studenti;
    $this->poljeSoba=$sobe;
    }
    public function ispisStudenata() {
        $br=1;
        foreach($this->poljeStudenata as $key=>$value){
       echo '<tr>
                 <td>'.$br++.' </td>
                 <td>'.$value->m_sIme .' </td>
                 <td>'.$value->m_sPrezime.' </td>
                 <td>'.$value->m_nPostanskiBroj.' </td>
                 <td>'.$value->m_sGrad.' </td>
                 <td>'.$value->m_nGodinaStudija.' </td>
                 <td>'.$value->m_nECTS.' </td>
                 <td>'.$value->m_fProsjekOcjena.' </td>
                 <td>'.$value->m_oSoba->m_sNazivSobe.' </td>
             </tr>';
    }
}
    public function ispisSoba(){
        $rbr=1;
        foreach($this->poljeSoba as $x=>$val){
            echo '<tr>
                    <td>'.$rbr++.'</td>
                    <td>'.$val->m_sNazivSobe.'</td>
                    <td>'.$val->m_sOpis.'</td>
                    <td>'.$val->m_nKat.'</td>
                    <td>'.$studenti_zajedno = implode(", ",$val->m_pStudenti).'</td>
                 </tr>';
        }
    }
}
class Student{
    public $m_sIme;
    public $m_sPrezime;
    public $m_nJmbag;
    public $m_sAdresa;
    public $m_nPostanskiBroj;
    public $m_sGrad;
    public $m_nGodinaStudija;
    public $m_nECTS;
    public $m_fProsjekOcjena;
    public $m_oSoba;

    public function __construct($ime,$prezime,$jmbag,$adresa,$postanskiBroj,$grad,$godinaStudija,$ects,$prosjekOcjena,Soba $oSoba){
        $this->m_sIme=$ime;
        $this->m_sPrezime=$prezime;
        $this->m_nJmbag=$jmbag;
        $this->m_sAdresa=$adresa;
        $this->m_nPostanskiBroj=$postanskiBroj;
        $this->m_sGrad=$grad;
        $this->m_nGodinaStudija=$godinaStudija;
        $this->m_nECTS=$ects;
        $this->m_fProsjekOcjena=$prosjekOcjena;
        $this->m_oSoba=$oSoba;
    }
}
class Soba{
    public $m_nId;
    public $m_sNazivSobe;
    public $m_sOpis;
    public $m_nKat;
    public $m_pStudenti=array();

    public function __construct($id,$nazivSobe,$opis,$kat,$pStudenti=array()){
        $this->m_nId=$id;
        $this->m_sNazivSobe=$nazivSobe;
        $this->m_sOpis=$opis;
        $this->m_nKat=$kat;
        $this->m_pStudenti=(array)$pStudenti;
    }
}
?>