<?php

declare(strict_types=1);

require "check_expect.php";

////////////////////////////////////////////////////////
function message_compose(string $name, string $message):string
{
    return "Bonjour $name , $message. Cordialement, Manal." ;
}

check_expect(message_compose("Benoit", "Je serai absente aujourd'hui"), "Bonjour Benoit , Je serai absente aujourd'hui. Cordialement, Manal.");
check_expect(message_compose("Gérome", "Je vous souhaite de belles vacances"), "Bonjour Gérome , Je vous souhaite de belles vacances. Cordialement, Manal.");


////////////////////////////////////////////////////////
// recupere le premier caractere d'une chaine
function first_caractere(string $sentence):string
{
   return $caractere = substr($sentence, 0, 1);
}

check_expect(first_caractere("yo"), "y");

// recupere le premier caractere d'une chaine
function last_caractere(string $sentence):string
{
   return $caractere = substr($sentence, -1);
} 

check_expect(last_caractere("Nous vaincrons."), ".");

// Vérifie si le premier caractères est une majuscule et le dernier caractère est un point
function verif_sentence(string $sentence)
{
    return $is_sentence = (ctype_upper(first_caractere($sentence))) && ("." == (last_caractere($sentence)));
}

check_expect(verif_sentence("Nous sommes des codeurs."), true);
check_expect(verif_sentence("il est impossible de prédire l'avenir"), false);