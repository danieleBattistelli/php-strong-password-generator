<?php

//funzione per generare la password
function generatePassword($length, $letters, $numbers, $symbols, $allow_repeats)
{
    //definisco i caratteri che possono essere utilizzati per la password
    $characters = '';
    //se l'utente ha selezionato le lettere, aggiungo le lettere
    if ($letters) {
        $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    }
    //se l'utente ha selezionato i numeri, aggiungo i numeri
    if ($numbers) {
        $characters .= '0123456789';
    }
    //se l'utente ha selezionato i simboli, aggiungo i simboli
    if ($symbols) {
        $characters .= '!@#$%^&*()';
    }
    //se non è stato selezionato nessun tipo di carattere, restituisco una stringa vuota
    if (empty($characters)) {
        return '';
    }

    //inizializzo la stringa della password
    $password = '';
    //calcolo la lunghezza della stringa $characters
    $charactersLength = strlen($characters);
    //inizializzo un array vuoto per tenere traccia dei caratteri già utilizzati
    $usedCharacters = [];

    //ciclo per generare la password
    for ($i = 0; $i < $length; $i++) {
        do {
            $index = rand(0, $charactersLength - 1);
            $char = $characters[$index];
        } while (!$allow_repeats && in_array($char, $usedCharacters));

        //aggiungo il carattere alla password
        $password .= $char;
        if (!$allow_repeats) {
            $usedCharacters[] = $char;
        }
    }

    return $password;
}
