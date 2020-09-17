<?php
session_start();
require_once '../PDOconnection/PDOConnection.php';
$showPics='';
$counter=0;
echo '<table><tr>';
foreach ($all as $k=>$pic){
    $counter++;
$adress='./'.$pic[1];

$showPics.= "<td ><a href='.$adress.'><img src='.$adress.' width=250  height=120 ></a></td>";
        
        if($counter%2==0){
        echo $showPics;
        echo '</tr>';
        $showPics='';
        }

}
echo "</table>";

