<?php

declare(strict_types=1);

require "check_expect.php";

// Calcule la puissance d'un nombre
function puissance_nombre(int $n, int $p, int $compteur = 0, int $total = 1):int
{
    if ($p == 0) return 1;
    if ($compteur == $p) return $total;
    return puissance_nombre($n, $p, $compteur + 1, $n * $total);
}

check_expect(puissance_nombre(5,5), 3125);
check_expect(puissance_nombre(5,0), 1);


// Vérifie si tu as un nombre est pair ou impair
function nombre_pair_impaire(int $n):string
{
    if ($n == 0) return "ce nombre est pair";
    if ($n == 1) return "ce nombre est impair" ;
    return nombre_pair_impaire($n - 2);
}

check_expect(nombre_pair_impaire(4), "ce nombre est pair");
check_expect(nombre_pair_impaire(15), "ce nombre est impair");


// Détermine si un mot contient ou non une lettre spécifique
function as_letter(string $word, string $letter): bool
{
    if (strlen($word) == 0) return false;
    if (substr($word, -1) == $letter) return true;
    return as_letter(substr($word, 0, -1), $letter);
}


check_expect(as_letter("licorne","r"), true);
check_expect(as_letter("licorne","z"), false);

// Détermine si un mot contient ou non une lettre spécifique et combien de fois
function nomber_letter_in_word(string $mot, string $lettre, int $total = 0):int
{
    if (strlen($mot) == 0) return $total;
    if (substr($mot, -1) == $lettre) $total ++;
    return nomber_letter_in_word(substr($mot, 0, -1), $lettre, $total);
}

check_expect(nomber_letter_in_word("canada", "a"), 3);

// Répète une phrase donné suivant un nombre de fois
function repeat_sentence(int $time_to_repeat, string $sentence = "Pour comprendre la récursion, il faut d'abord comprendre la récursion.\n"):string
{
    if ($time_to_repeat == 0) return "";
    return $sentence . repeat_sentence($time_to_repeat -1, $sentence);
}



check_expect(repeat_sentence(2), "Pour comprendre la récursion, il faut d'abord comprendre la récursion.\nPour comprendre la récursion, il faut d'abord comprendre la récursion.\n");