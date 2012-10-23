<?php
	
	class M_Curl extends CI_Model
	{
		
		public function lister()
		{
			$this->db->select('titre as titre, url as site, description as description, img as image');
			$this->db->from('posts');
			$query = $this->db->get();
			return $query->result();
		}

		public function ajouterSite($data)
		{
			$donnes = array('titre' => $data['titre'], 
							'url' => $data['site'], 
							'description' => $data['description'], 
							'img' => $data['img']);

			$this->db->insert('posts', $donnes);
		}
	}