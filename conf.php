<?php
$serveriNimi="localhost";
$kasutajaNimi="root";
$parool="";
$andmebaas="test";
$yhendus = new mysqli($serveriNimi, $kasutajaNimi, $parool, $andmebaas);
$yhendus->set_charset("utf8");
?>