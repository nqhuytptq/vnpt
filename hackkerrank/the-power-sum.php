<?php

/*
 * Complete the 'powerSum' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER X
 *  2. INTEGER N
 */

function powerSum($X, $N)
{
    // Write your code here

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$X = intval(trim(fgets(STDIN)));

$N = intval(trim(fgets(STDIN)));

$result = powerSum($X, $N);

fwrite($fptr, $result . "\n");

fclose($fptr);
