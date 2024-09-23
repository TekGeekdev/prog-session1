<?php

$temp = readline("Entrez une température: ");
$neutrons = readline("Entrez une quantité de neutrons: ");

$produit_criticite = $temp * $neutrons;

// Verifie si le reácteur est critique ou non
$iscritical = ($temp < 700) && ($neutrons > 500) && ($produit_criticite < 50_000) ;

if ($iscritical) {
    echo "votre reacteur est critique.";
}
else {
    echo "Homer a encore fait péter le réacteur !";
}
    

