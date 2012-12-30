<?php
	class M_Member extends CI_Model{
		
		public function verifier($data){
			$query = $this->db->get_where('membres', array('email' => $data['email'], 'mdp' => sha1($data['mdp'])));
			return array('exist' => $query->num_rows(), 'data' => $query->row());
		}

		public function inscrire($data){
			$data = array(
			   'user_id' => '' ,
			   'email' => $data['email'],
			   'mdp' => sha1($data['mdp'])
			);

			$this->db->insert('membres', $data); 
		}
	}