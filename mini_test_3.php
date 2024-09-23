<?php

// entrée utilisateur
$revenu_annuel = readline("Entrez votre revenu annuel :");

$is_first_level_taxe = $revenu_annuel <= 51_780 ;
$is_second_level_taxe = $revenu_annuel <= 103_545 ;
$is_third_level_taxe = $revenu_annuel <= 126_000 ;


If ($is_first_level_taxe) echo "14 %";
elseif ($is_second_level_taxe) echo "19 %";
elseif ($is_third_level_taxe) echo "24 %";
else echo "25.75 %";
