<?php

function get_lines(): array
{
    $blob = file_get_contents("words.txt");
    $lines = explode("\n", $blob);
    return $lines;
}

function get_words(): array
{
    $lines = get_lines();
    $index = (int) $lines[0];
    $sets = array_slice($lines, 1);
    $words = explode(" ", $sets[$index]);
    return $words;
}

function next_set(): void
{
    $lines = get_lines();
    echo count($lines);
    if ((int) $lines[0] > count($lines) - 4) {
        $lines[0] = 0;
    } else {
        $lines[0] = $lines[0] + 1;
    }
    $blob = implode("\n", $lines);
    file_put_contents("words.txt", $blob);
}
