<?php

Class user
{
	private $_login;
	private $_pays;
	private $_nom;
	private $_prenom;
	private $_id;
	
	public function user_init($nom,$prenom,$mail,$id)
	{
		this.$login = $mail; 
		this.$nom = $nom;
		this.$prenom = $prenom;
		this.$id = 	$id;
		
		// id quering.
		
	}
	
	
}