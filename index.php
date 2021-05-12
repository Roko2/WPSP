<?php
include 'classes.php';
// $oZaposlenik=new StrucnSluzba("Pero","Perić","64560121550");
// $oZaposlenik->Radi();

$oNastavnik=new Asistent("Marko","Perić","64560121550");
$oNastavnik->DrziNastavu();
$oNastavnik->PripremiNastavu();
$oNastavnik->CuvajIspit();
?>