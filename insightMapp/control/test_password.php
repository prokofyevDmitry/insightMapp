<?php

// la mot de passe est trop petit 0
// le mot de passe est pas le meme que la confiramtion 2
// le mot de passe est trop long (peu probable  mais bon) 3
// le mot de passe n'est pas assez fort 4
// tout est ok true

function test_password()
{
	/*
	 * TODO resoudre le probleme avec strcmp:
	 * 	le mot de passe n'est pas comparé avec la confiramation_mdp. 
	 * Voir d'ou vient le problem.
	 */

	// est ce que le mot de passe est trop petit? 
	if(strlen($_POST['mdp'])<8)
		return 0;
	else
	{
	
		// est ce que le mot de passe est trop long? 
		if(strlen($_POST['mdp'])>40)
			return 3;
		else
		{
				// le mot de passe ne correspond pas à sa confiramtion?  
			if(strcmp($_POST['mdp'], $_POST['confiramtion_mdp'])==0)
			{
				
				if( !preg_match('#[A-z]+#',$_POST['mdp']) || !preg_match('#[0-9]+#', $_POST['mdp']))
				{	return 4;
				
				}
				
				
				return true;
			}
			else
				
				return 2;
	
	
			
		}}
	
	
}