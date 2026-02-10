<?php

/*
 * Complete the 'designerPdfViewer' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY h
 *  2. STRING word
 */

function designerPdfViewer($h, $word)
{
    $maxHeight = 0;
    $length = strlen($word);
    for ($i = 0; $i < $length; $i++) {
        $viTriWord = ord($word[$i]) - ord('a');
        if ($h[$viTriWord] > $maxHeight) {
            $maxHeight = $h[$viTriWord];
        }
    }
    return $maxHeight * $length;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$h_temp = rtrim(fgets(STDIN));

$h = array_map('intval', preg_split('/ /', $h_temp, -1, PREG_SPLIT_NO_EMPTY));

$word = rtrim(fgets(STDIN), "\r\n");

$result = designerPdfViewer($h, $word);

fwrite($fptr, $result . "\n");

fclose($fptr);
