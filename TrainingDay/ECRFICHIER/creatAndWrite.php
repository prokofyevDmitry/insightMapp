<?php 

$handle = fopen('../fichiers/fichier.txt', 'x+');
echo "write\n";

fwrite($handle, 'something aghahahah');
echo "close";
fclose($handle);
?>