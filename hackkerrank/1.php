<?php
function gradingStudents($grades)
{
    $next_multiple_5 = $grades + (5 - $grades % 5);
    if (($next_multiple_5 - $grades) == 3 || ($next_multiple_5 - $grades) > 3 || $grades < 38) {
        return $grades;
    } else return $next_multiple_5;
}
$arr = 73;
echo gradingStudents($arr);
