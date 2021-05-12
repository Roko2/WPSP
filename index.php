<?php 
include 'connection.php';
//samo sobe..tablica sobe
ini_set('memory_limit', '2048M');
$sQuery2 = "SELECT * FROM sobe";
$oRecord2 = $oConnection->query($sQuery2);
$sobe=array();
while($oRow2 = $oRecord2->fetch(PDO::FETCH_BOTH))
{
$_soba=new Soba($oRow2['ID'],$oRow2['Naziv'],$oRow2['Opis'],$oRow2['Kat'],null);//novi while gdje hvatam sve i gledam id sobe>query sa jmbag id sobe sve o sobi..array_push($pSobe,$soba);
array_push($sobe,$_soba);
}
//Ucitavanje soba
        ini_set('memory_limit', '2048M');
        $sQuery = "SELECT student_soba.ID_sobe,Naziv, Opis, Kat,JMBAG FROM student_soba LEFT JOIN sobe ON student_soba.ID_sobe=sobe.ID";
        $oRecord = $oConnection->query($sQuery);
        $pSobe=array();
        while($oRow = $oRecord->fetch(PDO::FETCH_BOTH))
     {
        $soba=new Soba($oRow['ID_sobe'],$oRow['Naziv'],$oRow['Opis'],$oRow['Kat'],$oRow['JMBAG']);//novi while gdje hvatam sve i gledam id sobe>query sa jmbag id sobe sve o sobi..array_push($pSobe,$soba);
        array_push($pSobe,$soba);
        }
//var_dump($pSobe);
//Ucitavanje studenata
        ini_set('memory_limit', '2048M');
        $sQuery1 = "SELECT studenti.JMBAG,Ime, Prezime, Adresa, Postanski_broj,Grad,Godina_studija,Ostvareni_ECTS_bodovi,Prosjek_ocjena,ID_sobe FROM studenti LEFT JOIN studenti_dodatni_atributi ON studenti.JMBAG=studenti_dodatni_atributi.JMBAG LEFT JOIN studenti_podaci_studij ON studenti.JMBAG=studenti_podaci_studij.JMBAG LEFT JOIN student_soba ON studenti.JMBAG=student_soba.JMBAG";
        $oRecord1 = $oConnection->query($sQuery1);
        $pStudenti=array();
        while($oRow1 = $oRecord1->fetch(PDO::FETCH_BOTH))
     {
         foreach($pSobe as $x =>$val){
                 if($val->m_nId==$oRow1["ID_sobe"]){
                        $m_oSoba=new Soba($val->m_nId,$val->m_sNazivSobe,$val->m_sOpis,$val->m_nKat,null);
                        $student=new Student($oRow1['Ime'],$oRow1['Prezime'],$oRow1['JMBAG'],$oRow1['Adresa'],$oRow1['Postanski_broj'],$oRow1['Grad'],$oRow1['Godina_studija'],$oRow1['Ostvareni_ECTS_bodovi'],$oRow1['Prosjek_ocjena'],$m_oSoba);
                 }
         }
         array_push($pStudenti,$student);
        }
 
       // var_dump($sobe);
        $studenti1 = array();
        $studenti2 = array();
        foreach ($sobe as $key => $element) {

               foreach ($pStudenti as $key => $value) {

                      if($element->m_nId == $value->m_oSoba->m_nId and $element->m_nId==1)
                      {
                        array_push($studenti1,$value->m_sIme.' '.$value->m_sPrezime);
                      }
                        else if($element->m_nId == $value->m_oSoba->m_nId and $element->m_nId==2)
                        {
                        array_push($studenti2,$value->m_sIme.' '.$value->m_sPrezime);
                      }
               }     
        }

      
$sobe[0]->m_pStudenti=$studenti1;
$sobe[1]->m_pStudenti=$studenti2;
//        var_dump($result);   
$objekt=new Studom($pStudenti,$sobe);
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Vjezba 6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <center>
        <h2>Studenti</h2>
<table>
                <tr>
                <th>Rbr.</th>
                <th>JMBAG</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Poštanski broj</th>
                <th>Godina studija</th>
                <th>Ostvareni ECTS bodovi</th>
                <th>Projsek ocjena</th>
                <th>Naziv sobe</th>
                </tr>
                <?php
$objekt->ispisStudenata();
?>
</table>

<h2>Sobe</h2><br>
<table>
        <tr>
                <th>Rbr.</th>
                <th>Naziv sobe</th>
                <th>Opis sobe</th>
                <th>Kat</th>
                <th>Studenti</th>
        </tr>
        <?php
        $objekt->ispisSoba();
        ?>
</table>
</center>
</body>
</html>