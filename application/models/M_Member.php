<?php
	class M_Member extends CI_Model{
		
		public function verifier($data){
			$query = $this->db->get_where('membres', array('email' => $data['email'], 'mdp' => $data['mdp']));
			return $query->num_rows();
		}
	}