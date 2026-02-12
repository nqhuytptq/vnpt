<?php

/*
 * Complete the 'utopianTree' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER n as parameter.
 */

function utopianTree($n)
{
    $height = 1;
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 2 != 0) {
            $height = $height * 2;
        } else {
            $height = $height + 1;
        }
    }
    return $height;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $result = utopianTree($n);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
