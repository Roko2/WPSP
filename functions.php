<?php
function CheckUser($sUsername, $sPassword){
$oUsers=LoadUsers();
$bUserExists = false;
$oKorisnik=array("ime"=>NULL,"lozinka"=>NULL);
if(isset($_POST['username']) && isset($_POST['password']))
{
 $sPassword = "";
 foreach($oUsers as $oUser)
{
    if($oUser['name'] == $_POST['username'])
    {
     $bUserExists = true;
     $sPassword = $oUser['password'];
     $oKorisnik["ime"]=$oUser['name'];
     break;
    }
}
if($bUserExists && $sPassword == $_POST['password'])
{
    header("Location: users.php");
    $oKorisnik["lozinka"]=$sPassword;
     return $oKorisnik;
}
else
{
    echo 'Korisnicko ime ili lozinka ne valjaju. Pokusajte ponovno.';
}
}
else
{
    echo "Upozorenje! Korisnicko ime ili lozinka nedostaju!";
}
}
function LoadUsers(){
    $string2 = file_get_contents("users1.json");
    $oUsers = json_decode($string2, true);
    
    return $oUsers;
}
function SetSessions($oUser){
    session_start();
    $_SESSION["name"]=$oUser["ime"];
    $_SESSION["password"]=$oUser["lozinka"];
    echo $_SESSION["name"]." ".$_SESSION["password"];
}
?>