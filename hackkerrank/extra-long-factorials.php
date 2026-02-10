<?php

/*
 * Complete the 'extraLongFactorials' function below.
 *
 * The function accepts INTEGER n as parameter.
 */

function extraLongFactorials($n)
{
    $result = 1;
    while ($n > 0) {
        $result = bcmul($result, (string)$n);
        $n--;
    }
    echo $result;
}

$n = intval(trim(fgets(STDIN)));

$result = extraLongFactorials($n);
echo sprintf('%.0f', $result);
