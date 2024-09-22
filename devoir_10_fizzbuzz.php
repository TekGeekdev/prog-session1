<?php

//entree utilisateur
$nombre = readline("Donnez un nommbre :");


// Vérifie si le chiffre est divisible par cinq et par trois
$is_fizzbuzz = (($nombre % 5) == 0) && (($nombre % 3) == 0);

// Vérifie si le chiffre est divisible par cinq
$is_buzz = (($nombre % 5) == 0);

// Vérifie si le chiffre est divisible par trois
$is_fizz = (($nombre % 3) == 0);

// conditionnelle qui retourne le mot en fonction de sa division
if ($is_fizzbuzz) {
    echo "FiizBuzz!!";
}
elseif ($is_buzz) {
    echo "Buzz!!";
}
elseif ($is_fizz) {
    echo "Fizz!!";
}
else {
echo "Nous avons un perdant !";
}