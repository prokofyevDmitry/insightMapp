<?php

if(preg_match('#^[0-3][0-9]/[0-1][0-9]/[0-2][0-9]{3}$#','15/02/1995')) // on cherche à faire verifier que la date est valide
echo 'ok';
else {
	echo "ko";
}
?>