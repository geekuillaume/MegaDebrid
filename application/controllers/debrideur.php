<?php

class Debrideur extends CI_Controller {
	
	function index()
	{
		$this->load->helper('url');
		$this->load->model('stats');
		$data['baseurl'] = base_url();
		$data = array(
			"baseurl" => base_url(),
			"nombre_liens" => $this->stats->nombre_liens()
		);
		$this->load->view('debrideur', $data);
	}
	function lien_v2() 
	{
		preg_match_all("#http://(www\.)?megaupload\.com/[a-zA-Z]*/?\?d=([A-Za-z0-9]{8}$)#i",$this->input->get('lien'), $lien_mu);
		if (isset($lien_mu[0][0])) 
		{
			$lien = $lien_mu[0][0];
			$ch = curl_init($lien);
			curl_setopt($ch, CURLOPT_COOKIE, "user=************"); //Ajouter la valeur du Cookie "user" de Megaupload
			curl_exec($ch);
			curl_close($ch);
			$this->load->model('stats');
			//Ecriture dans liens
			$this->stats->stat_lien($lien);
			//Ecriture dans utilisateurs
			$this->stats->stat_utilisateur();
		}
	}
	function megavideo() 
	{
		preg_match_all("#http://(www\.)?megavideo\.com/[a-zA-Z]*/?\?v=([A-Za-z0-9]{8}$)#i",$this->input->get('lien'), $lien_mv);
		if (isset($lien_mv[0][0])) 
		{
			$lien = $lien_mv[0][0];
			$id = substr($lien, -8, 8);
			$lien = 'http://www.megavideo.com/xml/player_login.php?u=*************&v='.$id.'&password=&timestamp='.time(); //Ajouter la valeur du Cookie "user" de Megaupload
			$ch = curl_init($lien);
			curl_setopt($ch, CURLOPT_COOKIE, "user=**********"); //Ajouter la valeur du Cookie "user" de Megaupload
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_exec($ch);
			$ch = curl_multi_getcontent($ch);
			$ch = explode('user="guillaumeb10" downloadurl="',$ch);
			$ch = explode('" />',$ch[1]);
			$lien = $ch[0];
			echo urldecode($lien);
			$this->load->model('stats');
			//Ecriture dans liens
			$this->stats->stat_lien($lien);
			//Ecriture dans utilisateurs
			$this->stats->stat_utilisateur();

		}
	}
	function lecteur() 
	{
		if($this->input->get('lien')){
			$this->load->helper('url');
			$data = array(
				'lien' => $_GET['lien'],
				'baseurl' => base_url()
			);
			$this->load->view('lecteur', $data);
		}
	}
}