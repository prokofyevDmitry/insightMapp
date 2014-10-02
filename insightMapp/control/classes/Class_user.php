<?php

class user
{
	private $_login;
	private $_pays;
	private $_nom;
	private $_prenom;
	private $_id;
	
	public function user_init($array)
	{
		this.$login = $array['mail']; 
		this.$nom = $array['nom'];
		this.$prenom = $array['prenom'];
		this.$id = 	$array['id'];
		// id quering.
		
	}
	
	public function set_nom($nom)
	{
		$this->nom = $nom;
	}
	
	
	public function nom()
	{
		return $this->_nom;
	}
	
	public function prenom()
	{
		return $this->_prenom;
	}
	
}