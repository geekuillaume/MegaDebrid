<?php
class Stats extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->database();
    }
    function stat_lien($lien)
    {
		$data = array(
			'IP' => $this->input->ip_address(),
			'lien' => $lien,
			'date' => mdate("%Y-%m-%d %H:%i:%s", time())
		);
		$this->db->insert('liens', $data);
    }
    function stat_utilisateur()
    {
		$sql = 'SELECT * FROM utilisateurs WHERE IP=\'' . $this->input->ip_address() . '\'';
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			$info = $query->row();
			$data = array(
				'date' => mdate("%Y-%m-%d %H:%i:%s", time()),
				'nombre_liens' => $info->nombre_liens + 1
			);
			$where = "ID = '".$info->ID."'";
			$str = $this->db->update_string('utilisateurs', $data, $where);
			$this->db->query($str);
		}
		else 
		{
			$data = array(
				'IP' => $this->input->ip_address(),
				'date' => mdate("%Y-%m-%d %H:%i:%s", time()),
				'nombre_liens' => '1'
			);
			$this->db->insert('utilisateurs', $data);
		}
	}
	function nombre_liens()
	{
		$sql = 'SELECT ID FROM liens ORDER BY ID DESC LIMIT 0, 1';
		$query = $this->db->query($sql);
		$row = $query->row();
		return $row->ID;
	}
}