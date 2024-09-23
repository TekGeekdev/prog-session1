<?php

declare(strict_types=1);

require "check_expect.php";
require "words.php" ;


/* fonction qui compte le nom de voyelles */
function count_vowels(string $word): int
{
    $count = 0;
    $vowels = "aeiouy";
    for ($i = 0; $i < strlen($word); $i++) {
        $letter_is_not_a_vowel = !str_contains($vowels, $word[$i]);
        if ($letter_is_not_a_vowel) continue;
        $count++;
    }
    return $count;
}

check_expect(count_vowels("aba"), 2);
check_expect(count_vowels("canada"), 3);

/* fonction qui compte le nom de consonnes */
function count_consonants(string $word): int
{
    return strlen($word) - count_vowels($word);
}

check_expect(count_consonants("aba"), 1);
check_expect(count_consonants("canada"), 3);


/* fonction qui compte les voyelles sur chaque mot d'un tableau */
function all_word_vowels(array $tableaux):string
{
    $all_word="";
    foreach ($tableaux as $value) {
        $all_word .= count_vowels($value) . " ";
    }
    return $all_word;
}

check_expect(all_word_vowels(["canada", "aba"]), "3 2 ");


/* fonction qui compte les consonnes sur chaque mot d'un tableau */
function all_word_consonants(array $tableaux):string
{
    $all_word="";
    foreach ($tableaux as $value) {
        $all_word .= count_consonants($value) . " ";
    }
    return $all_word;
}

check_expect(all_word_consonants(["canada", "aba"]), "3 1 ");


/* fonction qui d'après un mot et un index retourne le caractère */
function send_letter(string $mot, int $position):string
{
    if ($position >= strlen($mot)) return "_" ;
    return  $mot[$position] ;
}

check_expect(send_letter("aba", 4), "_");
check_expect(send_letter("aba", 1), "b");

/* foncion qui renvoit dans chaque mot la lettre à la position donné */
function all_send_letter(array $tableaux, int $position):string
{
    $all_letters="";
    foreach ($tableaux as $value) {
        $all_letters .= send_letter($value, $position) . " ";
    }
    return $all_letters;
}

check_expect(all_send_letter(["canada", "aba","zky"], 1), "a b k ");
check_expect(all_send_letter(["canada", "aba","zky"], 10), "_ _ _ ");

/* vérifie si les tableaux sont identiques  */
function same_table($tab1, $tab2){
	$identique = true;
	$i = 0;

	while ($i < count($tab2) && $identique == true) {
		if($tab1[$i] != $tab2[$i]){
			$identique = false;
		}
		$i++;
	} 
	return $identique;
}


$words = get_words();
$user_word = array_slice($argv, 2);

// vérifie sur la liste de mots est correcte
if ($argv[1] == "guess") {
    if (same_table($words,$user_word)) {
        echo "Félicitation ! Vous avez deviné l'ensemble de mots correctement.\n";
        echo "Veuillez demander un nouvel indice pour jouer de nouveau.";
        next_set(); // fonction appelle next set au moment de win
    } else {
        echo "Ce ne sont pas les bons mots. Veuillez essayer de nouveau.\n";
    }
}

// si premier argement clue et second argement letter vas chercher la fonction all_send_letter
// avec la position donné en argument 4
if ($argv[1] == "clue" && $argv[2] == "letter") {
    echo all_send_letter($words, intval($argv[3])); // utilise intval pour transformer argv en nombre entier car fonction demande un intw
}

// si premier argement clue et le second argement soit vowels appelle la foncion  all_word_vowels
// et renvoi la nombre de voyelles dans chaque mot
if ($argv[1] == "clue" && $argv[2] == "vowels") {
    echo all_word_vowels($words);
}

// si premier argement clue et le second argement soit consonants appelle la foncion  all_word_consonants
// et renvoi la nombre de consonnes dans chaque mot
if ($argv[1] == "clue" && $argv[2] == "consonants") {
    echo all_word_consonants($words);
}
