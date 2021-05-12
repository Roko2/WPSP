<?php 
include 'functions.php';
$oUsers=LoadUsers();
session_start();
    function build_table($array){
    $html = '<table>';
    $html .= '<tr>';
    foreach($array[0] as $key=> $value){
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
        }
    $html .= '</tr>';
    foreach( $array as $value){
    if($_SESSION["name"]==$value["name"] && $_SESSION["password"]==$value["password"]){
        $html .= '<tr style="background-color:lightgreen;">';
      }
         else{
             $html.='<tr>';
       }
        foreach($value as $value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</table>';
    return $html;
}

echo build_table($oUsers);
?>