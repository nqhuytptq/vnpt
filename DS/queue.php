<?php
// Hang doi
class ReadingList extends SplQueue {}

$myBooks = new ReadingList();

// Them phan tu vao hang doi
$myBooks->enqueue('So 1');
$myBooks->enqueue('So 2');
$myBooks->enqueue('So 3');
$myBooks->enqueue('So 4');
$myBooks->enqueue('So 5');
$myBooks->enqueue('So 6');
$myBooks->enqueue('So 7');

// Xoa phan tu duoc them dau tien vao hang doi
echo "Remove " . $myBooks->dequeue();
echo "<br>";
echo "Remove " . $myBooks->dequeue();
echo "<br>";

echo "Hang doi sau khi remove 2 so vao truoc la: ";
echo "<pre>";
print_r($myBooks);
echo "</pre>";
// dd
