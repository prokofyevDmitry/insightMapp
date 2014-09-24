$var = 'dmitry6'


if( preg_match('#\d|\W|\s#', $string))  return 0;// \d : un chiffre, \W un caractère non alphanumérique \s
echo 'nogood';
else 
echo 'good';