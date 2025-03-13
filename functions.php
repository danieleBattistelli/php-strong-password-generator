<?php
function generatePassword($length, $letters, $numbers, $symbols, $allow_repeats)
{
    $characters = '';
    if ($letters) {
        $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    }
    if ($numbers) {
        $characters .= '0123456789';
    }
    if ($symbols) {
        $characters .= '!@#$%^&*()';
    }

    if (empty($characters)) {
        return '';
    }

    $password = '';
    $charactersLength = strlen($characters);
    $usedCharacters = [];

    for ($i = 0; $i < $length; $i++) {
        do {
            $index = rand(0, $charactersLength - 1);
            $char = $characters[$index];
        } while (!$allow_repeats && in_array($char, $usedCharacters));

        $password .= $char;
        if (!$allow_repeats) {
            $usedCharacters[] = $char;
        }
    }

    return $password;
}
