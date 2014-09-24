<?php


// if(preg_match('#guitare#','j\'aime la guitare')) echo 'ok';
// else echo 'ko'; // on trouve bien la 'guitare' dans la phrase à tester

// if(preg_match('#GUITARE#i','j\'aime la guitare')) echo 'ok';
// else echo 'ko'; // l'option i permet d'enlever la recherche case-sensitive

// if(preg_match('#guitare|banjo#','j\'aime le banjo')) echo 'ok';
// else echo 'ko'; // guitare ou banjo

// if(preg_match('#PHP$#','vive PHP et msql')) echo 'ok';
// else echo 'ko'; // le dolar fait que le terme PHP doit etre à la fin
// // 

// if(preg_match('#^j#','j\'aime le banjo')) echo 'ok';
// else echo 'ko'; //^ indique qu'on veux 'j' au début


// if(preg_match('#gr[iao]s#','la nuit tout les chats sont gris')) echo 'ok';
// else echo 'ko'; // [] permet de sectioner quelques caractère, 
// [a-z] on accepte les minuscules 
// [a-zA-z] on accepte tout les lettres
// [0-9] on accepte que les lettres

// if(preg_match('#<h[1-6]>#','la nuit tout <h2>les chats sont gris</h2>')) echo 'ok';
// else echo 'ko';
// pour la négation: [^1-6] tout sauf 1 à 6 (ne pas confondre avec le début de la chaine)


// if(preg_match('#Ay(ay)?#','Ayay')) echo 'ok';
// else echo 'ko';
// ? veut dire 1 ou 0 fois
// + veut dire 1 ou plus
// * veut dire 0 fois 1 fois ou plusieurs fois


// Pour etre plus rigide

// if(preg_match('#Ay(ay){3}?#','Ayayayay')) echo 'ok';
// else echo 'ko';
// {3} test qu'il y ai au moins 3 ay dans la string de test
//{3,6} il y a entre 3 et 6 fois ay (ici ça ne marcherais pas)




// LES REMPLACEMENT
// validation la forme d'une date
// if(preg_match('#^[0-9]{2}/[0-9]{2}/[0-9]{4}$#','15/02/2014')) echo 'ok';
// else echo 'ko';
// 
// // amelioration:
// 
// if(preg_match('#^([0-9]{2}/){2}[0-9]{4}$#','15/02/2014')) echo 'ok';
// else echo 'ko';



$jour = preg_replace( '#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#',' Le $1 du mois $2 l\'an $3' ,'15/02/2014' );

echo $jour;
